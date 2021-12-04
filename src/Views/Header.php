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
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="./Homepage" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="/submit_article" class="nav-link px-2 text-white">Write article</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Posts API</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Comments API</a></li>
                <li><a href="/users" class="nav-link px-2 text-white">Users List</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <?php if(count($_SESSION) == 0 || !$_SESSION["id"]): ?>
                    <a href="/login" class="btn btn-outline-light me-2">Login</a>
                    <a href="/register" class="btn btn-warning">Sign-up</a>
                <?php endif ?>
                <?php if($_SESSION["id"]): ?>
                    <a class="btn btn-outline-light me-2" href="#">Admin</a>
                    <a class="btn btn-warning" href="/logout">Logout</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</header>

