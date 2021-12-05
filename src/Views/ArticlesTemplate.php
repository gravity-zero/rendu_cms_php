
<?php if($articles): ?>
    <?php foreach ($articles as $article): ?>
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
    <?php endforeach; ?>
<?php endif ?>


