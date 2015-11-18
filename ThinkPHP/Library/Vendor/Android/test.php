<?php
mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_query("SET NAMES utf8");
mysql_select_db("app_astoneman1");
//$uid=$_POST[UID];
$sql=mysql_query("insert into event_user (UID,PASSWORD,LOGINIP,ISREGISTER,STATUS,REGISTERTIME,ISBUREAU,ISADMIN) values('root','root','192.168.0.1','1','1','2015-09-06','0','0')");
while($row=mysql_fetch_assoc($sql))
$output[]=$row;
print(json_encode($output));
mysql_close();
?>