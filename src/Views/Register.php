<?php require_once "Header.php"?>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh">
    <main class="m-3">
        <form method="post" action="/submit_register_form">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="george">
                <label for="firstname">Firstname</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="lastname" name="lastname" placeholder="macgregor">
                <label for="lastname">Lastname</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="verify_password" placeholder="verify">
                <label for="verify_password">Verify password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign in</button>
            <a href="./login">if you're already register click here</a>
        </form>
    </main>
</body>

