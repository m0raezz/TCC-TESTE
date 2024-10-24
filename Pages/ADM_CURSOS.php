<?php
    session_start();

    if ((!isset($_SESSION['CodigoADM']) == true) && (!isset($_SESSION['SenhaADM']) == true)) {
        unset($_SESSION['CodigoADM']);
        unset($_SESSION['SenhaADM']);
        header('Location: login.php');
        exit;
    }

    $logado = $_SESSION['CodigoADM'];

    require "conexao.php";

    // Processa a edição do texto do curso
    if (isset($_POST['Salvar'])) {
        $curso = $_POST['curso'];
        $novo_texto = $_POST['texto'];

        $sql_atualizar = "UPDATE tbcurso SET texto = '$novo_texto' WHERE curso = '$curso'";
        mysqli_query($conexao, $sql_atualizar) or die(mysqli_error($conexao));

        // Redireciona para evitar reenvio do formulário
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integra Etec</title>
    <link rel="icon" type="image/x-icon" href="..\Images\logo1.png">
    
    <!-- LINKS -->
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
                
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

    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!-- Navbar icon left -->
            <a class="navbar-brand" href="V_ADM.php">
                <img src="../images/logo3.png" width="45" height="45" alt="Logo">
            </a>
            <a class="navbar-brand text-light" href="V_ADM.php">Etec Bebedouro</a>
            
            <!-- Navbar for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <!-- Usar o ícone padrão do Bootstrap -->
            </button>

            
            <!-- Navbar dropdown -->
            <div class="text-light collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="text-light nav-link active me-2" aria-current="page" href="V_ADM.php #im">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="V_ADM.php #eq">EQUIPE</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="V_ADM.php #sb">SOBRE</a>
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
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="ADM_CMTAP.php">| AV. APROVADAS</a>
                    </li>

                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="ADM_CMT.php">| AV. REENCAMINHADAS</a>
                    </li>
 
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="ADM_VET.php">| VETERANOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="ADM_CURSOS.php">| TEXTOS DOS CURSOS</a>
                    </li>
                    
                </ul>
                <a href="sair.php" class="ms-auto">
                    <img src="../images/sair.png" width="40" height="40" alt="Logo">
                </a>
            

            </div>
        </div>
    </nav>
    <!-- End NavBar -->

    <!-- Start Containers -->
    <div class="container mt-5 container-custom text-right">
        <!-- Header de Avaliações -->
        <section class="avaliacoes-header">
            <span>Textos dos cursos</span>
        </section>

        <!-- Cards de Avaliações -->
<!-- Cards de Avaliações -->
<section class="row g-4">
    <?php
    $sql_curso = "SELECT * FROM tbcurso";
    $resultado_curso = mysqli_query($conexao, $sql_curso) or die(mysqli_error($conexao));

    while ($linha_curso = mysqli_fetch_assoc($resultado_curso)) {
        $texto = $linha_curso["texto"];
        $curso = $linha_curso["curso"];

        echo "<div class='col-md-4'>"; // Remova o d-flex e align-items-stretch
            echo "<div class='card text-center p-3'>"; // Não defina uma altura fixa
                echo "<div class='stars'> $curso </div><hr>";
                echo "<div class='texto'>$texto</div>";
                echo "<div class='d-flex justify-content-around mt-3'>";
                    // Botão Editar
                    echo "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarModal$curso'>Editar</button>";
                echo "</div>";
            echo "</div>";
        echo "</div>";

        // Modal para Edição
        echo "<div class='modal fade' id='editarModal$curso' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
                echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                        echo "<h5 class='modal-title'>Editar $curso</h5>";
                        echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                    echo "</div>";
                    echo "<form method='POST' action=''>";
                        echo "<div class='modal-body'>";
                            echo "<input type='hidden' name='curso' value='$curso'>";
                            echo "<div class='mb-3'>";
                                echo "<label for='textoCurso' class='form-label'>Texto do curso</label>";
                                echo "<textarea style='min-height: 500px; max-height: 100%;' class='form-control' id='textoCurso' name='texto' rows='3'>$texto</textarea>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                            echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>";
                            echo "<button type='submit' name='Salvar' class='btn btn-primary'>Salvar</button>";
                        echo "</div>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }
    ?>
</section>

    </div>
    <footer class="bg-dark text-light text-center  fixed-bottom">
        <p>&copy; 2024 Etec Bebedouro - Todos os direitos reservados.</p>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
