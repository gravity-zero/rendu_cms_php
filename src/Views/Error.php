<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.pop-up.gravity-zero.fr/js/pop-up.js"></script> <!-- https://github.com/gravity-zero/pop-alert -->
        <title>Erreur</title>
    </head>
    <body>
        <h1>Ceci est une page d'erreur</h1>
        <p>Vous allez être redirigez dans environ 5 secondes</p>
        
    </body>
    <script>
            const errors = <?php echo json_encode($errors) ?>;

            if(errors.length > 0)
            {
                const pop_up = new PopUp();

                pop_up.params({
                    icon: 'Error',
                    title: "This is my PopUp Title!",
                    html: "<p>"+ errors.map(error => {return '<b>'+ error + '</b>'}).join('<br>') +"</p>",
                    showConfirmButton: true,
                    showDenyButton: false,
                    width: 500,
                    height: 500,
                    img_link: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Antu_dialog-error.svg/1200px-Antu_dialog-error.svg.png",
                    img_weight: 90,
                    img_height: 110,
                    img_alt: 'My logo',
                })
                    .then((result) => {
                        if(result.confirm){
                            window.location.href = "http://localhost:5000/";
                        }else if(result.denied){
                            //Do some stuff
                        }
                    });
                setTimeout(() => {window.location.href = "http://localhost:5000/";} , 5000);
            }
    </script>
</html>