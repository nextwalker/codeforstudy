<?php

header("Content-type:text/html; charset=UTF-8");
require "config.inc.php";

ini_set("max_execution_time", 0);
ini_set("memory_limit", "256M");

?>
<!doctype html>
<html lang="zh">
<head></head>
<body>
<script type="text/javascript">
function select_click(obj) {   
    if (obj.name && obj.value) {
        var reg = new RegExp(obj.name + '=([^&]*)', "i");
        var str = obj.name + '=' + obj.value; 
        if (document.location.href.match(reg)) {
            document.location.href = document.location.href.replace(reg, str);
        }else{
            document.location.href = document.location.href + '&' + str;
        }
    }
}
</script>
<?php

echo "<div style=\"text-align:center\"><a href=\"{$_SERVER['PHP_SELF']}?act=update\">代码更新beta2</a></div>";
echo "\n<br />";

$action = isset($_REQUEST['act']) ? filter_var($_REQUEST['act'], FILTER_SANITIZE_STRING) : "";

if (empty($action)) {
    header("location:update.php?act=update");
}

$auth = isset($_REQUEST['auth']) ? filter_var($_REQUEST['auth'], FILTER_SANITIZE_STRING) : ""; 
session_start();
if (empty($_SESSION['auth'])) {
    if ( $auth == "zi_youngjia" ) {
        $_SESSION['auth'] = 1;
    }else{
        echo "Sorry，更新代码权限已收回，如若更新代码，请联系杨嘉";
        die;
    }
}

// 更新代码到网站目录
if ($action == "update") {
    $server = isset($_REQUEST['server']) ? filter_var($_REQUEST['server'], FILTER_SANITIZE_STRING) : ""; 
    $project = isset($_REQUEST['project']) ? filter_var($_REQUEST['project'], FILTER_SANITIZE_STRING) : "";
    $branch = isset($_REQUEST['branch']) ? filter_var($_REQUEST['branch'], FILTER_SANITIZE_STRING) : "";
    $version = isset($_REQUEST['version']) ? filter_var($_REQUEST['version'], FILTER_VALIDATE_INT) : ""; 
    
    $str = "<br>\n<br>\n";

    // 处理服务器
    $str .= get_select_html('server', $config['server']['list'], $server);
    if (empty($server)) { 
        die("请选择一个服务器:".$str);
    }
    if (!array_key_exists($server, $config['server']['list'])) {
         die("server error".$str);    
    }
    if ($server == "GD6G6S18") {
        if (!isset($_REQUEST['admin']) || $_REQUEST['admin'] != 'x') {
            echo "GD6G6S18 只对管理员开放"; die;       
        }
    }
    
    // 处理项目
    $str .= get_select_html('project', $config['web']['list'], $project);
    if (empty($project)) {
        die("请首先选择一个项目: ".$str);
    }
    if (!array_key_exists($project, $config['web']['list'])) {
        die("project error:".$str);      
    }
    
    // 处理分支
    $all_branches = get_all_branches($project);
    $str .= get_select_html('branch', $all_branches, $branch);
    if (empty($branch)) {
        die("请选择一个分支".$str);
    }
    if (!array_key_exists($branch, $all_branches)) {
        die("branch error".$str);
    }
    
    // 处理版本
    $all_versions = get_versions($project, $branch);
    $str .= get_select_html('version', $all_versions, $version);
    if (empty($version)) { 
        die("请选择一个版本".$str);
    }
    if (!array_key_exists($version, $all_versions)) {
         die("version error".$str);    
    }

    $str .= get_button_html('do_action','update');

    if (!$_POST) {
        die("点击更新即可更新代码".$str);
    }else{
        $rs = update_code($project, $branch, $server, $version);
        echo "update $project $branch $version to $server.";
        echo "<br>\n<br>\n更新的详细信息:\n" . str_replace("\n", "<br>\n", $rs);
    }
}

///apps/sh/php-fpm.sh stop && /apps/sh/php-fpm.sh start && sudo /apps/sh/nginx.sh restart

function get_versions($project, $branch) {
    $cmd = SVNTOOL . " get_versions $project $branch";    
    $rs = array();
    if (@exec($cmd, $res)) {
        $data = implode("\n", $res);
        $xml = simplexml_load_string('<logs>' . $data . '</logs>');
        $svns = object2array($xml);
        if (!$svns) {
            $rs[0] = "无版本"; 
            return $rs;
        }
        //兼容只有一个版本的情况，只有一个版本的时候会少一层结构。
        if (!isset($svns['logentry'][0])) {
             $log = $svns['logentry'];
             unset($svns['logentry']);
             $svns['logentry'][] = $log;
        }
        foreach ($svns['logentry'] as $key => $value) {
            $version_value = 'ver:'. $value['@attributes']['revision'] . "  ";
            $version_value .= $value['msg'] ? $value['msg'] : '(无日志)';
            $version_value .= date('Y-m-d H:i:s', strtotime($value['date']));
            $rs [ $value['@attributes']['revision'] ] = new_substr($version_value, $start=0, $length=40);
        }
    }
    return $rs;
}


function get_all_branches($project) {
    $cmd = SVNTOOL . " get_branches $project";
    exec($cmd, $branch);
    foreach($branch as $val) {    
        $val = substr($val, 0, -1);
        $rs [ $val ] = $val;
    };
    return $rs;
}

function update_code($project, $branch, $server, $version = "HEAD") {
    #svntool.sh update_code zite trunk 400 **** .zi.com
    global $config;
    $cmd = SVNTOOL . " update_code $project $branch $version " . $config['server']['list'][ $server ] . " " . $config['web']['list'][ $project ];
    $rs = exec_cmd($cmd);
    return $rs;
}

function exec_cmd($cmd){
    if (empty($cmd)) return false;
    @exec($cmd, $res);
    //var_dump($res);
    $rs = implode("\n", $res);
    return $rs;
}

function get_select_html($select_name, $options, $select_value="") {
    if (empty($options)) return false;
    $rs = '<select name="' . $select_name . '" onchange="javascript:select_click(this)"><option value="" selected>--请选择--</option>';
    foreach ($options as $key => $value) {
         $rs .= "<option value=\"{$key}\" ";
         if ($key == $select_value) {
            $rs .= "selected=selected";
        }
         $rs .= ">$value</option>";    
    } 
    return $rs . '</select>';
}

function get_button_html($button_name, $value) {
    if (empty($value)) return false;
    $rs  = '<form method="post" style="display:inline">';
    $rs .= "<input type=\"submit\" name=\"$button_name\" value=\"$value\" />";
    $rs .= "</form>";
    return $rs;
}

//双引号转义，单引号不转义，js的正则不能加引号，new RegExp支持引号正则 数组函数 in_array, array_key_exists

//  object2Array 有问题 
function object2Array1($obj) {
    echo "\nobj:\n";
    var_dump($obj);
    if (is_object($obj) || is_array($obj)){
        foreach ($obj as $key => $val) {
            echo $key,"\n",var_dump($val);            
            $rs[$key] = object2Array($val);
            var_dump($rs);         
        }
    }else{
        echo $rs . "no obj";
        $rs = strval($obj);
    }
    return $rs;
}

function object2Array($obj) {
    return @json_decode(@json_encode($obj), 1);
}

function new_substr($str, $start=0, $length=0, $append=true) { 
	$str = trim($str);
	$reval = '';

	if (0 == $length) {
	    $length = strlen($str);
	} elseif (0 > $length) {
	    $length = strlen($str) + $length;
	} 

	if (strlen($str) <= $length) return $str;

	for($i = 0; $i < $length; $i++) {
		if (!isset($str[$i])) break;
		if (196 <= ord($str[$i])) {
			$i  += 2 ;
			$start += 2;
		}
	}
	if ($i >= $start) $reval = substr($str, 0, $i);
	if ($i < strlen($str) && $append) $reval .= "...";
    return $reval;

}

?>
</body>
</html>

