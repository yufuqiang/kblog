<?php 
$redis = new Redis();
//$redis->connect('47.90.66.61', 6379);
//$redis->connect('127.0.0.1', 6379);
$redis->connect('127.0.0.1', 6379);
echo $redis->get("yfq"); //设置密码
?>