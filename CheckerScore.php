<?php

function reader()
{
  $file = fopen("highScores.txt", "r");
  $scoresFromFile = [];
  if ($file) {
    while (!feof($file)) {
      $buffer = fgets($file);
      if ($buffer !== "\n") {
        $scoresFromFile[] = $buffer;
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
    fwrite($file, "\n");
    fwrite($file, "$scoresFromFile[$i]");
    fwrite($file, "\n");
  }
  fclose($file);
}

function checker($scoreForCheck, $scoresFromFile)
{if (count($scoresFromFile) < 10) {
    $scoresFromFile[] = $scoreForCheck;
    sort($scoresFromFile);
    writer($scoresFromFile);
  }
  else if (count($scoresFromFile) == 10){
    sort($scoresFromFile);
    if ($scoreForCheck > $scoresFromFile[count($scoresFromFile)-1]) {
      $scoresFromFile[count($scoresFromFile)-1] = $scoreForCheck;
    }
    writer($scoresFromFile);
  }
}

$scoresFromFile = reader();

$scoreForCheck = $_GET["score"];

checker($scoreForCheck, $scoresFromFile);

header("Location: index.php");
exit;