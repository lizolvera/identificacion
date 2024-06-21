<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulario de Identificación</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .error {color: #FF0000;}
       
        *{
        background-color: aqua;
        box-sizing: border-box;
        text-align: center;
    }
         
       
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Formulario de Identificación</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">
                Por favor, ingrese un correo electrónico válido.
            </div>
            <br>

        </div>
        <div class="mb-3">
            <label for="password1" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password1" name="password1" required>
            <div class="invalid-feedback">
                Por favor, ingrese una contraseña.
            </div>
            <br>

        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="password2" name="password2" required>
            <div class="invalid-feedback">
                Por favor, confirme su contraseña.
            </div>
            <br>
            
        </div>
        <button type="submit" class="btn btn-primary">Identificarse</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $error= [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Correo electrónico inválido.";
        }

        if ($password1 !== $password2) {
            $error[] = "Las contraseñas no coinciden.";
        }

        if (empty($error)) {
            echo "<h3>Correcto</h3>";
            echo "<p>El formulario se ha enviado correctamente.</p>";
        } else {
            echo "<h3>Errores de Validación</h3>";
            foreach ($error as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
    }
    ?>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
  
    (function () {
        'use strict'

    
        var forms = document.querySelectorAll('.needs-validation')

     
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>
</html>
