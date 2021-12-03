<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.pop-up.gravity-zero.fr/js/pop-up.js"></script> <!-- https://github.com/gravity-zero/pop-alert -->
    <title>CMS PHP</title>
</head>
    <body class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <main class="m-3">
            <form method="post" action="/submit_register_form">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="george">
                    <label for="firstname">Firstname</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="macgregor">
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
</html>

