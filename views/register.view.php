<?php Core\View::render('partials/header', ['title' => $title ?? "Registrace"]); ?>

<body>

    <head class="header">
    </head>

    <main class="container--center">
        <form action="/Projekty/TodoApp/register" class="form" method="post">
            <h1 class="form__headline">Registrace</h1>
            <input type="text" name="email" placeholder="Email">
            <?php 
            if(isset($error))
            {
                echo'
                <p class="form__error-message">'.$error.'</p>
                ';
            }
            ?>
            <input type="text" name="password" placeholder="Heslo">
            <input type="text" name="password" placeholder="Potvrdit heslo">
            <button class="button--primary" type="submit">Vytvořit účet</button>
            <div class="form__footer">
                <p>Již máte účet? <a href="/Projekty/TodoApp/login">Přihlaste se</a></p>
            </div>
        </form>
    </main>

</body>

</html>