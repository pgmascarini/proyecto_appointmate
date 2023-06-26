<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <link rel="stylesheet" href="styles.css" type="text/css"> -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap"
      rel="stylesheet"
    />
    <title>FomrLogin</title>
    <style>
      * {
        font-family: "Roboto", sans-serif;
      }
      body {
        display: flex;
        justify-content: space-around;
        flex-direction: row;
      }
      form {
        display: flex;
        justify-content: space-around;
        flex-direction: column;
        margin-top: 400px;
      }
      input {
        width: 300px;
        height: 20px;
        border-radius: 15px;
        margin-top: 10px;
        padding: 10px;
        border: 2px solid gray;
      }
      .boton {
        background-color: #2f2c79;
        color: white;
        font-size: 16px;
        font-weight: bold;
        padding: 10px;
        height: 50px;
        width: 325px;
        border: none;
        box-shadow: 0px 3px 5px 2px gray;
      }
      .btnRegistro{
    background-color: white;
    border: 4px solid #2F2C79;
    color: #2F2C79;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
    height: 50px;
    width: 325px;
    box-shadow: 0px 3px 5px 2px gray;
}
      .rojo {
        color: red;
      }
      img {
        width: 300px;
        margin-top: 100px;
        align-self: center;
      }
      a {
        text-decoration: none;
      }
      .forgot {
        margin-top: 10px;
        text-align: right;
        color: #2f2c79;
        font-size: 15px;
      }
      span {
        margin-top: 50px;
        text-align: center;
        font-weight: bold;
      }
      @media (min-width: 800px) {
        body {
          display: flex;
          justify-content: space-around;
          flex-direction: row;
        }
        .container {
          display: flex;
          justify-content: space-around;
          flex-direction: column;
          max-height: 20%;
        }
        form {
          display: flex;
          justify-content: space-around;
          flex-direction: column;
          margin-top: 200px;
        }
        input {
          width: 400px;
          height: 20px;
          border-radius: 15px;
          margin-top: 10px;
          padding: 10px;
          border: 2px solid gray;
          align-self: center;
        }
        .boton {
          background-color: #2f2c79;
          color: white;
          font-size: 16px;
          font-weight: bold;
          padding: 10px;
          height: 50px;
          width: 425px;

          border: none;
        }
        img {
          width: 810px;
          align-self: center;
          margin-top: 20px;
        }
        a {
          text-decoration: none;
        }
        .forgot {
          margin-top: 10px;
          text-align: center;
          margin-left: 25%;
          color: #2f2c79;
          font-size: 15px;
        }
        .rojo {
          color: red;
        }
        span {
          margin-top: 50px;
          text-align: center;
          font-weight: bold;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img src="./medios/LOGO-ANGULARAPP.png" alt="logoAppointMate" />

      <form method="post" action="index.php">
        <input placeholder="Nombre" type="text" name="nombre" required />
        <input placeholder="Email" type="text" name="email" required/>
        <input
          placeholder="Contraseña"
          type="password"
          name="password"
          required
        />
        <!-- <a class="forgot" href="forgotP">¿Has olvidado la contraseña?</a> -->
        <input
          style="margin-top: 50px"
          class="btnRegistro"
          type="submit"
          value="Registro"
        />
        <span>¿Ya tienes cuenta? <a class="rojo" href="/index.html">Login</a></span>
      </form>   
      
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Obtener los valores enviados por el formulario
          $nombre = $_POST["nombre"];
          $email = $_POST["email"];
          $password = $_POST["password"];

      // Validar el nombre
          if (empty($nombre) || strlen($nombre) > 10) {
              echo "El nombre debe tener máximo 10 caracteres.";
              exit;
          }
          // Validar el email
          if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
              echo "El email no es válido.";
              exit;
          }

          // Validar la contraseña
          if (empty($password) || strlen($password) < 10) {
              echo "La contraseña debe tener al menos 10 caracteres.";
              exit;
          }

          if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W]).{10,}$/', $password)) {
              echo "La contraseña debe tener al menos 10 caracteres, la primera letra en mayúscula, letras minúsculas, números y caracteres especiales.";
              exit;
          }

          // Si todos los campos son válidos, puedes realizar el registro en la base de datos o tomar las acciones necesarias.
          // Por ejemplo, insertar los datos en la tabla de usuarios.

          // Mostrar mensaje de registro exitoso
          echo "Registro exitoso. ¡Bienvenido(a), $nombre!";
      }
      ?>
    </div>

 
  </body>
</html>
