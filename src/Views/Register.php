<?php
?>

<form method="post" action="/submit_register_form">
    <label for="firstname">Firstname:</label>
    <input type="text" name="firstname" id="firstname">
    <label for="lastname">Lastname:</label>
    <input type="text" name="lastname" id="lastname">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    </br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <label for="verify_password">Verify Password</label>
    <input type="password" id="verify_password">
    <button type="submit">Register</button>
    <a href="Login.php">if you're already register click here</a>
</form>
