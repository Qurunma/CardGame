<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="main.css"> -->
    <link rel="stylesheet" href="top.css">
</head>
<body>
    <header>
    <?php
        require "header.php"
    ?>
    </header>
    <div class="container">
        <?php
        $file = fopen("highScores.txt", "r");
        if ($file) {
            $i = 1;
            while (!feof($file)) {
            $buffer = fgets($file);
            if ($buffer !== "\n" && $buffer != "") {
                echo "<p>$i. $buffer</p>";
                $i++;
            }
            }
        }
        fclose($file);
        ?>
    </div>
</body>
</html>