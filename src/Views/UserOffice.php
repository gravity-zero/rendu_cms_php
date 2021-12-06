<?php require_once "Header.php";?>
        <div style="text-align: center">
            <h1>Bienvenue sur votre profil <?= ucfirst($user['firstname']) ?></h1>
            <label for="jwt_token">Votre clé API</label><br>
            <input type="text" id="jwt_token" value="<?= $user['token'] ?>" disabled>
            <input type="hidden" id="copy_link">
            <button type="button" class="btn btn-success" onclick="copy_link()"?>Copier</button>
        </div>

<main class="d-flex justify-content-center align-items-center m-3">
        <form method="post" action="/update_user_office">
            <input type="hidden" name="user_id" value="<?= $user['id'] ?>" />
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user['firstname'] ?>" />
                <label for="firstname">Prénom</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user['lastname'] ?>" />
                <label for="lastname">Nom</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" />
                <label for="email">Email</label>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="admin_mode" name="admin_mode" value="1" <?= $user['admin']?"checked=checked":"" ?>/>
                <label for="admin_mode" class="form-check-label">Admin</label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Faire la mise à jour</button>
            </div>
        </form>
</main>
    </body>
<script>
    function copy_link(){
        let linkToCopy = document.getElementById('copy_link');
        linkToCopy.value = document.getElementById('jwt_token').value;
        linkToCopy.setAttribute('type', 'text');
        linkToCopy.select();

        let success = document.execCommand('copy');

        if(success){
            const pop_up = new PopUp();

            pop_up.params({
                icon: 'success',
                html: "<b>Lien copié avec succès<b>",
                showConfirmButton: true,
                showDenyButton: false,
                width: 300,
                height: 230,
                img_link: "https://cdn.startupsavant.com/wp-content/uploads/2014/01/Validate-your-business-idea.png",
                img_weight: 80,
                img_height: 90,
                img_alt: 'Validation logo',
            })
            linkToCopy.value = '';
            linkToCopy.setAttribute('type', 'hidden');
        }
    }
</script>
</html>
