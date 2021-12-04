<?php require_once "Header.php"?>
        <main class="d-flex justify-content-center align-items-center m-3">
            <form method="post" action="/login_check">
                <h1 class="h3 mb-3 fw-normal">Login</h1>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Login</button>
                <a href="./login">Si vous n'avez pas de compte, cliquez ici</a>
            </form>
        </main>
    </body>
</html>

