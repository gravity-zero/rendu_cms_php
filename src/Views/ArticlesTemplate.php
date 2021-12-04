<section class="album py-5 bg-light">
<?php foreach ($articles as $article): ?>

    <div class="card shadow-sm d-flex justify-content-between align-items-center">
        <h2 class="card-text"><?php echo $article->title; ?></h2>
        <img src="<?php echo $article->img_url; ?>" class="d-flex justify-content-between align-items-center">
        <p><?php echo $article->content; ?></p>
        <p class="text-muted"><?php echo $article->author; ?></p>
        <p class="text-muted"><?php echo $article->creation_date ?></p>
        <p class="text-muted"><?php echo $article->nb_comments ?></p>
    </div>

<?php endforeach; ?>
</section>

