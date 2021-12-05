<?php require_once "Header.php";?>
        <div style="text-align: center">
            <h1>Bienvenue sur votre profil <?= ucfirst($user['firstname']) ?></h1>
            <label for="jwt_token">Votre clé API</label>
            <textarea id="jwt_token"><?= $user['token'] ?></textarea>
        </div>
    </body>
</html>
