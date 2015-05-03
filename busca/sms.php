<?php
$ch = curl_init("http://torpedus.com.br/sms/index.php?app=push&rest=private&u=9433&p=808745&to=5598981544593&msg=teste+open+locked"); 
curl_exec($ch);

?>