<?php

    session_start();
   
    if((!isset($_SESSION['CodigoADM']) == true) && (!isset($_SESSION[ 'SenhaADM']) == true))
    {
        
        unset($_SESSION['CodigoADM']);
        unset($_SESSION['SenhaADM']);
        header('Location:login.php');
    }

    $logado = $_SESSION['CodigoADM'];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integra Etec</title>
    
    <!-- LINKS -->
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
                
    <!-- Bootstrap e CSS -->
    <link rel="stylesheet" href="./Pages_CSS/AV.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
    
<body>
        <!--V Libras-->
        <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <!-- Start NavBar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!-- Navbar icon left -->
            <a class="navbar-brand" href="V_ADM.php">
                <img src="../Images/logo3.png" width="45" height="45" alt="Logo">
            </a>
            <a class="navbar-brand text-light" href="V_ADM.php">Etec Bebedouro</a>
            
            <!-- Navbar for mobile view -->
            <button class="text-light navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-light navbar-toggler-icon"></span>
            </button>
            
            <!-- Navbar dropdown -->
            <div class="text-light collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="text-light nav-link active me-2" aria-current="page" href="V_ADM.php #im">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="V_ADM.php #eq">Equipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="V_ADM.php #sb">Sobre</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="text-light nav-link dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CURSOS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="2_ADM.php">Administração - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="1_INFO.php">Informática p/ Internet - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="4_RH.php">Recursos Humanos - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="3_MKT.php">Marketing - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="5_SJ.php">Serviços Jurídicos - Novotec integrado</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="text-light nav-link dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            AVALIAÇÕES
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="2.1_ADM.php">ADM</a></li>
                            <li><a class="dropdown-item" href="1.1_INFO.php">INFO</a></li>
                            <li><a class="dropdown-item" href="4.1_RH.php">RH</a></li>
                            <li><a class="dropdown-item" href="3.1_MKT.php">MKT</a></li>
                            <li><a class="dropdown-item" href="5.1_SJ.php">SJ</a></li>
                            <li><a class="dropdown-item" href="ADM_CMT.php">REENCAMINHADAS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="ADM_VET.php">VETERANOS</a>
                    </li>
                    
                </ul>
                <a href="sair.php" class="ms-auto">
                    <img src="../Images/sair.png" width="40" height="40" alt="Logo">
                </a>
                
                <!-- Login navbar right -->

            </div>
        </div>
    </nav>
    <!-- End NavBar-->


    <!-- Start Containers -->
<div class="container mt-5 container-custom text-right">
    <!-- Header de Avaliações -->
    <section class="avaliacoes-header">
    <form method="GET" class="mb-4">
            <div class="input-group mb-2">
                <select name="curso" class="form-select">
                    <option value="TODOS" selected>Todos os cursos</option>
                    <option value="INFO">Informática</option>
                    <option value="ADM">Administração</option>
                    <option value="RH">Recursos Humanos</option>
                    <option value="SJ">Serviços Jurídicos</option>
                    <option value="MKT">Marketing</option>
                </select>
                <input type="text" name="nomeFiltro" class="form-control" placeholder="Filtrar por nome">
                <button class="btn btn-primary" type="submit">Filtrar</button>
            </div>
        </form>
        <span>Avaliações Aprovadas</span>

    </section>

    <!-- Cards de Avaliações -->
    <section class="row">
            <?php
            require "conexao.php";

            $cursoFiltro = isset($_GET['curso']) ? $_GET['curso'] : 'TODOS';
            $nomeFiltro = isset($_GET['nomeFiltro']) ? $_GET['nomeFiltro'] : '';

            // Definir a consulta com base nos filtros aplicados
            if ($cursoFiltro === 'TODOS') {
                // Apenas o nome será filtrado
                $sql = "SELECT * FROM tbcomentarios WHERE nomeVeterano LIKE ? AND (condicao = 'E' OR condicao = 'X') ORDER BY nomeVeterano ASC";
                $stmt = mysqli_prepare($conexao, $sql);
                $nomeFiltro = "%$nomeFiltro%";
                mysqli_stmt_bind_param($stmt, "s", $nomeFiltro);
            } else {
                // Filtrar tanto pelo curso quanto pelo nome
                $sql = "SELECT * FROM tbcomentarios WHERE curso = ? AND nomeVeterano LIKE ? AND (condicao = 'E' OR condicao = 'X') ORDER BY nomeVeterano ASC";
                $stmt = mysqli_prepare($conexao, $sql);
                $nomeFiltro = "%$nomeFiltro%";
                mysqli_stmt_bind_param($stmt, "ss", $cursoFiltro, $nomeFiltro);
            }

            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            while ($linha = mysqli_fetch_array($resultado)) {
                $nomeVeterano = $linha["nomeVeterano"];
                $rmVeterano = $linha["rmVeterano"];
                $curso = $linha["curso"];
                $texto = $linha["texto"];
                $condicao = $linha["condicao"];

                // Exibe o card com estrutura fixa e personalização conforme necessidade
                echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card text-center p-3'>";
                        echo "<div class='stars'>Nome: $nomeVeterano - $curso</div>";
                        echo "<div class='stars'>RM: $rmVeterano Condição: $condicao </div><hr>";
                        echo "<div class='texto'>$texto</div>";
                        echo "<div class='d-flex justify-content-around mt-3'>";

                        // Formulário para devolver
                        echo "<form action='' method='post' onsubmit='submitForm(event, this)'>";
                            echo "<input type='hidden' name='rmVeterano' value='$rmVeterano'>";
                            echo "<input type='submit' name='devolver' value='Devolver' class='btn btn-danger'>";
                        echo "</form>";

                    echo "</div>";
                echo "</div>";
            echo "</div>";
            }

            // Se o botão de devolução foi clicado
            if (isset($_POST["devolver"])) {
                $rmVeterano = $_POST["rmVeterano"];
                $sql = "UPDATE tbcomentarios SET condicao='I' WHERE rmVeterano=?";
                $stmt = mysqli_prepare($conexao, $sql);
                mysqli_stmt_bind_param($stmt, "s", $rmVeterano);
                mysqli_stmt_execute($stmt);
                echo '<script>window.location.href = window.location.href;</script>';
            }
            ?>
        </section>

</div>
</body>
</html>
