<?php
session_start();
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
$domain = filter_input(INPUT_POST, "domainName");
$ssh = filter_input(INPUT_POST, "ssh");

$_SESSION['username'] = $username;

$file = fopen("temp_authkey_$username", "w");
fwrite($file, $ssh);
fclose($file);

shell_exec("../script/createuser.sh $username $password $domain $ssh");

shell_exec("../script/rightown.sh $username");

shell_exec("../script/createbdd.sh $username $password");

$mysqli = new mysqli("localhost","groupe16","","groupe16");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
$sql = "INSERT INTO users (username, pwd, ssh, domain_name) VALUES ('$username','$password','$ssh','$domain')";

if ($mysqli->query($sql)) {
    echo("Record inserted successfully.<br />");
    header('Location: /');
}
if ($mysqli->errno) {
    echo("Could not insert <br />".$mysqli->error);
}
$mysqli->close();

fastcgi_finish_request();
shell_exec("../script/restartNginx.sh");
header('Location: /');
