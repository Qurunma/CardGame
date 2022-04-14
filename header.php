<header>
<div class="buttons">
          <a href="index.php" class="head-button">Играть</a>
          <p class="timer"></p>
          <p class="high-score"></p>
          <a href="bestScore.php" class="head-button">Топ игроков</a>
          </div>
          <?php
            if ($_COOKIE["login"] == null){
              echo '<a href="autorizeOrRegPage.php?page=Войти" class="log-button">Вход</a>
          <a href="autorizeOrRegPage.php?page=Зарегистрироваться" class="log-button">Регистрация</a>';
            }
            else{
              echo "<a href='unautorize.php' class='user-name'>$_COOKIE[login]</a>";
            }
          ?>
          
        
        </header>