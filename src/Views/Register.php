<?php require_once "Header.php"?>
        <main class="d-flex justify-content-center align-items-center m-3">
            <form method="post" action="/submit_register_form">
                <h1 class="h3 mb-3 fw-normal">Enregistrement utilisateur</h1>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="george">
                    <label for="firstname">Prénom</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="macgregor">
                    <label for="lastname">Nom</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Mot de passe</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="verify_password" placeholder="verify">
                    <label for="verify_password">Confirmation mot de passe</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mb-3" onclick="form_control()" id="sub_button" type="button">S'enregistrer</button>
                <a href="./login">Déjà enregistré? Connectez vous</a>
            </form>
        </main>
        <script>
            function form_control()
            {
                const button = document.getElementById("sub_button");
                const password = document.getElementById("password");
                const password_verify = document.getElementById("verify_password");
                if (password.value === password_verify.value){
                    button.type = "submit";
                    button.click();
                } else {
                    //On affiche une erreur
                    const pop_up = new PopUp();

                    pop_up.params({
                        icon: 'Error',
                        title: "Erreur",
                        text: "Les mots de passes ne sont pas identiques",
                        showConfirmButton: true,
                        showDenyButton: false,
                        width: 350,
                        height: 350,
                        img_link: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Antu_dialog-error.svg/1200px-Antu_dialog-error.svg.png",
                        img_weight: 90,
                        img_height: 110,
                        img_alt: 'Error logo',
                    })
                }
            }
        </script>
    </body>
</html>

