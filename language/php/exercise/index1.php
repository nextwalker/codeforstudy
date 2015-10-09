<?php
echo getcwd();
function get_alink( $str ) {
	$path = substr( getcwd(), 9);
	// /data1/www/htdocs/777/12dev	
	return "<a href=\"./index.php?action=".$path."\\".$str."\">$str</a><br />";
}
function print_all_file () {
	
	$handle = dir( getcwd() );
	while( $filename = mb_convert_encoding($handle->read(), 'UTF-8', 'GBK') ) {
		if( is_dir($filename ) ) {
			if( ".." == $str ) {
				//getcwd()
			}
			echo get_alink( $filename );
		}else{
			echo "<a href=\"./".$filename."\">".$filename."</a><br />";
		}
	}
}

if( $_GET['action']) {
	chdir("E:\yangzz".$_GET['action']);
}
print_all_file();
?>