<?php
//date()函数
echo time(),"\n";
echo date("Y-m-d H:i:s") ,"\n";
echo date("Y-m-d H:i:s",time()+100*24*60*60) ,"\n";
echo date("d-j-l-w"),"\n";
echo date("Y-m-d H:i:s",time()+5*24*60*60) ,"\n";
echo ( strtotime("2011-12-10 00:00:00") - strtotime("2011-12-05 00:00:00") ) / (60*60*24),"\n";
echo ( strtotime("2011-12-05 10:00:00") - strtotime("2010-07-19 00:00:00")) / (60*60*24),"\n";
echo strtotime("2011"),"\n",strtotime("201101010000"),"\n";
echo date("Y-m-d H:i:s",strtotime("2011")),"\n";
echo strtotime("20111205"),"\n",strtotime("201112050000"),"\n"; 
echo date('W-l',strtotime("20111231000000")),"\n";
echo date('W-l',strtotime("20120101000000")),"\n";
echo date('W-l',strtotime("20120102000000")),"\n";
echo date('W-l',strtotime("20120103000000")),"\n";
echo date('W-l',strtotime("20070101000000")),"\n";
echo date('W-l',strtotime("20071231000000")),"\n";
echo date('W-l',strtotime("20080101000000")),"\n";
echo date('W-l',strtotime("20080102000000")),"\n";
echo date('W-l',strtotime("20080103000000")),"\n";
date( "YW" )
?>