<?php if($comments): ?>
    <?php foreach ($comments as $comment): ?>
        <section class="album py-5 bg-light">
            <?php if($_SESSION["admin"]): ?><a href="/delete_comment/<?= $comment['id'] ?>"><button class="w-30 btn btn-lg btn-primary mb-3">Supprimer</button></a> <?php endif ?>
                <div class="card shadow-sm d-flex justify-content-between align-items-center">
                    <p><?php echo $comment["comment"]; ?></p>
                    <p class="text-muted"><?php echo $comment["user_id"]; ?></p>
                    <p class="text-muted"><?php echo $comment["creation_date"] ?></p>
                </div>
        </section>
    <?php endforeach; ?>
<?php endif ?>

