<?php require_once "Header.php" ?>
<?php if($article): ?>
    <?php if($_SESSION["admin"] || $_SESSION["id"] == $article["user_id"]):?> <a href="/delete_article/<?= $article["id"] ?>"><button class="btn btn-primary text-align-center">Supprimer l'article</button></a> <?php endif ?>
    <?php if($_SESSION["admin"] || $_SESSION["id"] == $article["user_id"]):?> <button class="btn btn-primary text-align-center"><a href="/edit_article/<?= $article["id"] ?>"></a>Editer l'article</button> <?php endif ?>
        <section class="album py-5 bg-light">
            <a href="/article/<?= $article['id'] ?>">
                <div class="card shadow-sm d-flex justify-content-between align-items-center">
                    <h2 class="card-text"><?php echo $article["title"]; ?></h2>
                    <img src="<?php echo $article["img_url"]; ?>" class="d-flex justify-content-between align-items-center">
                    <p><?php echo $article["content"]; ?></p>
                    <p class="text-muted"><?php echo $article["author"]; ?></p>
                    <p class="text-muted"><?php echo $article["creation_date"] ?></p>
                    <p class="text-muted"><?php echo $article["nb_comments"] ?></p>
                </div>
            </a>
        </section>
<?php endif ?>