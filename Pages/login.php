<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- LINKS -->
   <!-- Fontes -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

   <!-- Bootstrap e CSS -->
   <link rel="stylesheet" href="./Pages_CSS/login.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

   <title>Document</title>
</head>

<body>
   <!------ Include the above in your HEAD tag ---------->

   <div class="sidenav">
      <div class="login-main-text">
         <h2>Área apenas para Administração<br> Página de Login</h2>
         <p>Entre para ter acesso</p>
      </div>
   </div>
   <div class="main">
      <div class="col-md-6 col-sm-12">
         <div class="login-form">
            <form method="post" name="login" action="">
               <div class="form-group">
                  <label>Código Etec</label>
                  <input type="text" class="form-control" placeholder="Etec" name="CodigoADM">
               </div>
               <div class="form-group">
                  <label>Código de acesso</label>
                  <input type="password" class="form-control" placeholder="Código" name="SenhaADM">
               </div>
               <button type="submit" class="btn text-white" color="white" name="login">Login</button>
               <a href="V_ADM.php" class="btn text-white">Voltar</a>
            </form>
         </div>
      </div>
   </div>

   <?php
   if (isset($_POST["login"])) {
      // Verifica se os campos estão preenchidos
      if (!empty($_POST["CodigoADM"]) && !empty($_POST["SenhaADM"])) {
         $CodigoADM = $_POST["CodigoADM"];
         $SenhaADM = $_POST["SenhaADM"];
         require "conexao.php";

         $query = "SELECT * FROM tbADM WHERE CodigoADM='$CodigoADM' AND SenhaADM='$SenhaADM'";
         $sql = mysqli_query($conexao, $query) or die(mysqli_error($conexao));
         $resultado = mysqli_num_rows($sql);

         if ($resultado == 0) {
            echo "<script>alert('Usuário ou Senha Inválida');</script>";
         } else {
            session_start();
            $_SESSION["CodigoADM"] = $CodigoADM;
            header("location:V_ADM.php"); // Redireciona para a página principal
            exit();
         }
      }
   }
   ?>





</body>

</html>