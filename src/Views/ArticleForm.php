<?php require_once "Header.php"?>
<?php if($_SESSION["id"]): ?>
    <main class="d-flex justify-content-center align-items-center m-3">
        <form method="post" action="/submit_article">
            <h1 class="h3 mb-3 fw-normal">Création d'un article</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" name="title" placeholder="Mon titre">
                <label for="title">Titre</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="img_url" name="img_url" placeholder="Ma belle image">
                <label for="img_url">Lien Image</label>
            </div>

            <div class="form-floating mb-3">
                <label for="content">Corps de l'article</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div><br>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="author" name="author" placeholder="Je s'appel Groot">
                <label for="author">Auteur</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mb-3" id="sub_button" type="submit">Enregistrer</button>
        </form>
    </main>
<?php endif ?>
</body>
</html>
