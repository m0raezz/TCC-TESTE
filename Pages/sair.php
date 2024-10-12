<?php

session_start();
unset($_SESSION['CodigoADM']);
unset($_SESSION['SenhaADM']);
header('Location: ../index.php');

?>