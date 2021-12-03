<?php require_once "Header.php"?>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh">
<main class="m-3">
    <form method="post" action="/submit_login_form">
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="email">Firstname</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Login</button>
        <a href="./login">if you're not register yet click here</a>
    </form>
</main>
</body>
