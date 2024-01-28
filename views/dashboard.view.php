<?php Core\View::render('partials/header', ['title' => $title]) ?>

<body>
    <?php echo $user_id ?>
    <a class="button--error" href="/Projekty/TodoApp/logout">Odhlásit se</a>
    <main class="container">
        <nav class="tabs">
            <div>
                <a id="demo" class="tabs__tab<?php echo $todo_tab ?>" href="/Projekty/TodoApp/">To-do</a>
                <a class="tabs__tab<?php echo $done_tab ?>" href="/Projekty/TodoApp/done">Done</a>
            </div>
            <button autofocus id="new_todo" class="button--primary">Přidat nový úkol +</button>
        </nav>

        <?php
        foreach ($todos as $todo) {

            echo '
            <article class="todo';
            if ($todo['done']) echo "--done";
            echo '">
                <div>
                    <img src="" class="todo__img" alt="">
                    <h1 class="todo__headline">' . $todo['title'] . '</h1>
                    <p class="todo__description">' . $todo['description'] . '</p>
                </div>
                <div>';

            if ($todo['done']) {
                echo '
                <form action="/Projekty/TodoApp/delete">
                        <input name="todo_id" type="hidden" value="' . $todo['id'] . '">
                        <button type="submit" class="button--error">Smazat</button>
                    </form>
                ';
            } else {
                echo '
                    <form action="/Projekty/TodoApp/update">
                        <input name="todo_id" type="hidden" value="' . $todo['id'] . '">
                        <button type="submit" class="button--success">Hotovo</button>
                    </form>
                    ';
            }

            echo ' </div>
                  </article>';
        }
        ?>
    </main>

    <div class="modal-overlay">
        <form action="/Projekty/TodoApp/" class="form" method="post">
            <h1 class="form__headline">Nový úkol</h1>
            <input name="todo" id="todo_input" type="text" placeholder="Úkol" required autofocus>
            <input name="description" type="text" placeholder="Popis úkolu" required>
            <input name="done" type="hidden" value="0" required>
            <input name="user_id" type="hidden" value="<?php echo $_SESSION['user_id']?? "" ?>" required>
            <button class="button--primary" type="submit">Přidat úkol</button>
        </form>
    </div>

    <script src="/Projekty/TodoApp/script.js"></script>
    <script src="/Projekty/TodoApp/modal.js"></script>
</body>

</html>