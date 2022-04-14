<div class="container">
        <?php
        if ($_GET['page'] == "Войти"){
            echo "
            <form action='checkAutorize.php' method='post'>
            <input type='text' name='login' placeholder='Введите логин' class='login'>
            <input type='password' name='password' placeholder='Введите пароль' class='pass'>
            <button type='submit' class='sign-in'>";
            echo $_GET["page"];
            echo "
            </button>
            </form>
            ";
        }
        else{
            echo "
            <form action='registration.php' method='post'>
            <input type='text' name='login' placeholder='Введите логин' class='login'>
            <input type='password' name='password' placeholder='Введите пароль' class='pass'>
            <button type='submit' class='sign-in'>";
            echo $_GET["page"];
            echo "
            </button>
            </form>
            ";
        }
        ?>
    </div>