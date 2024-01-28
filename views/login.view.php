<?php Core\View::render('partials/header', ['title' => $title]);?>

<body>
    <head class="header">
    </head>

    <main class="container--center">
        <form action="/Projekty/TodoApp/login" class="form" method="post">
            <h1 class="form__headline">Přihlásit se</h1>
            <input type="text" name="email" placeholder="Email" autofocus>
            <?php 
            if(isset($error))
            {
                echo'
                <p class="form__error-message">'.$error.'</p>
                ';
            }
            ?>
            <input type="text" name="password" placeholder="Heslo">
            <button class="button--primary" type="submit">Přihlášení</button>
            <div class="form__footer">
                <p>Nemáte účet? <a href="/Projekty/TodoApp/register">Vytvořte si ho</a></p>
            </div>
        </form>
    </main>
</body>
</html>