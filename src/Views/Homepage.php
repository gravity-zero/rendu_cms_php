<?php require_once "Header.php"?>
    <body>
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="./Homepage" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="./article" class="nav-link px-2 text-white">Article</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Posts API</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Comments API</a></li>
                        <li><a href="./UsersList" class="nav-link px-2 text-white">Users List</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="text-end">
                        <a href="./Login" class="btn btn-outline-light me-2">Login</a>
                        <a href="./register" class="btn btn-warning">Sign-up</a>
                        <?php if($_SESSION["id"]): ?>
                            <a class="btn btn-warning" href="./login">Logout</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
