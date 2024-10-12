<?php
    session_start();

    if(isset($_POST['login']) && !empty($_POST['CodigoADM']) && $_POST['SenhaADM'])
    {
        //acessa
        require 'conexao.php';
        $CodigoADM = $_POST["CodigoADM"];
        $SenhaADM = $_POST["SenhaADM"];

        $query = "SELECT * FROM tbADM WHERE CodigoADM='$CodigoADM' AND SenhaADM='$SenhaADM'";
        $sql = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

        $resultado = $sql; // Assign the result of the query to the $resultado variable

        if(mysqli_num_rows($resultado) < 1)
        {
            //redireciona para a tela de login caso o login seja invalido
            unset($_SESSION['CodigoADM']);
            unset($_SESSION['SenhaADM']);
            header('Location: login.php');

        }else{
            $_SESSION['CodigoADM'] = $CodigoADM;
            $_SESSION['SenhaADM'] = $SenhaADM;
            header('Location:V_ADM.php');
        }


    }
    else{

        //não acessa
        header('Location: login.php');
    }
?>