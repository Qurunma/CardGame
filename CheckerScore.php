<?php

function reader()
{
  $file = fopen("highScores.txt", "r");
  $scoresFromFile = [];
  if ($file) {
    while (!feof($file)) {
      $buffer = fgets($file);
      if ($buffer !== "\n" && $buffer != " ") {
        $buffer = explode(" ", $buffer);
        if ($buffer[0] != ""){
          $scoresFromFile[] = ["name"=>$buffer[0], "score"=>$buffer[1]];
        }
      }
    }
  }
  fclose($file);
  return $scoresFromFile;
}

function writer($scoresFromFile)
{
  $file = fopen("highScores.txt", "w");
  for ($i = 0; $i < count($scoresFromFile); $i++) {
    $buffer = $scoresFromFile[$i];
    var_dump($buffer);
    fwrite($file, "\n");
    fwrite($file, "$buffer[name] ");
    fwrite($file, "$buffer[score]");
    fwrite($file, "\n");
  }
  fclose($file);
}

function checker($scoreForCheck, $scoresFromFile)
{
  $scoreForCheck = (int)$scoreForCheck;
  var_dump($scoreForCheck);
  echo "<br>";
  if (count($scoresFromFile) == 10)
  {
    for ($i = 0; $i < count($scoresFromFile); $i++) {
      if ($scoreForCheck < (int)$scoresFromFile[$i]["score"]) {
        continue;
      }
      else {
        if ($_COOKIE["login"] != ""){
          // echo "fff";
          $scoresFromFile = array_merge(array_slice($scoresFromFile, 0, $i) || [], [["name"=>"$_COOKIE[login]:", "score"=>$scoreForCheck]], array_slice($scoresFromFile, 0, count($scoresFromFile)-$i) || []);
        }
        else {
          echo "fff";

          $randNum = rand(0, 1000000);
          $scoresFromFile = array_merge(array_slice($scoresFromFile, 0, $i), [["name"=>"Guest$randNum:", "score"=>"$scoreForCheck"]], array_slice($scoresFromFile, $i+1, count($scoresFromFile)-$i));
        }
        if (count($scoresFromFile) > 10){
          array_pop($scoresFromFile);
        }
        break;
      }
    }
  }
  else if (count($scoresFromFile) != 0) {
    $inp = false; 
    for ($i = 0; $i < count($scoresFromFile); $i++) {
      if ($scoreForCheck < (int)$scoresFromFile[$i]["score"]) {
        continue;
      }
      else {
        if ($_COOKIE["login"] != ""){
          global $inp;
          $inp = true;
          $scoresFromFile = array_merge(array_slice($scoresFromFile, 0, $i), [["name"=>"$_COOKIE[login]:", "score"=>$scoreForCheck]], array_slice($scoresFromFile, 0, count($scoresFromFile)-$i));
        }
        else {
          global $inp;
          $inp = true;
          echo "aaa";
          $randNum = rand(0, 1000000);
          $scoresFromFile = array_merge(array_slice($scoresFromFile, 0, $i), [["name"=>"Guest$randNum:", "score"=>"$scoreForCheck"]], array_slice($scoresFromFile, $i));
        }
      }
      break;
    }
    if (!$inp){
      if ($_COOKIE["login"] != ""){
          $scoresFromFile[] = ["name"=>"$_COOKIE[login]:", "score"=>$scoreForCheck];
        }
        else {
          echo "eee";
          $randNum = rand(0, 1000000);
          $scoresFromFile[] =["name"=>"Guest$randNum:", "score"=>"$scoreForCheck"];
        }
    }
  }
  else {
    if ($_COOKIE["login"] != ""){
        $scoresFromFile[] = ["name"=>"$_COOKIE[login]:", "score"=>$scoreForCheck];
    }
    else {
      echo "xxd";
      $randNum = rand(0, 1000000);
      $scoresFromFile[] = ["name"=>"Guest$randNum:", "score"=>$scoreForCheck];
    }
  }

  writer($scoresFromFile);
}

$scoresFromFile = reader();

$scoreForCheck = $_GET["score"];

checker($scoreForCheck, $scoresFromFile);

header("Location: index.php");
exit;