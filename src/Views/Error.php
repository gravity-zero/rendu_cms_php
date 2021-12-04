<?php require_once "Header.php"?>

    </body>
    <script>
        const errors = <?php echo json_encode($errors) ?>;

        if(errors.length > 0)
        {
            const pop_up = new PopUp();

            pop_up.params({
                icon: 'Error',
                title: "Une erreur a été rencontrée",
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
                        window.location.href = "http://localhost:5000/register";
                    }else if(result.denied){
                        //Do some stuff
                    }
                });
            setTimeout(() => {window.location.href = "http://localhost:5000/register";} , 5000);
        }
    </script>
</html>
