<?php
function reader($path)
{
  $file = fopen($path, "r");
  $array = [];
  if ($file) {
    while (!feof($file)) {
      $buffer = fgets($file);
      $array[] = $buffer;
    }
  }
  fclose($file);
  return $array;
}
$logins = reader("logins.txt");
$passwords = reader("passwords.txt");

$userLogin = $_POST["login"];
$userPass = $_POST["password"];

for ($i = 0; $i < count($logins); $i++){
    global $userLogin;
    if ($userLogin == $logins[$i] && $userPass == $passwords[$i]){
    setcookie("login",$userLogin, time() + 50000, '/');
    }
}
header("Location: index.php");
exit;
