<?php
$serv = new swoole_server("127.0.0.1", 9501);
$serv->set(array(
    'worker_num' => 8,   //工作进程数量
    'daemonize' => true, //是否作为守护进程
));
$serv->on('connect', function ($serv, $fd){
    echo "Client:Connect.\n";
});
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $task = json_decode($data, true);
    $result = array();
    $result['task'] = $task;
    $result['add_time'] = date("Y-m-d H:i:s");
    $result['bodc_check'] = bodc_check($task);
    $result['lice_check'] = lice_check($task);	
    $result['end_time'] = date("Y-m-d H:i:s");
    $serv->send($fd, 'result: ' . json_encode($result));
    $serv->close($fd);
});
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});
$serv->start();

function bodc_check($task) {
    return "bodc check:" . $task['main'];
}

function lice_check($task) {
    return "lice check:" . $task['opt'];
}
