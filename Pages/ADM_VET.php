<?php

session_start();
if((!isset($_SESSION['CodigoADM']) == true) && (!isset($_SESSION[ 'SenhaADM']) == true))
{
    
    unset($_SESSION['CodigoADM']);
    unset($_SESSION['SenhaADM']);
    header('Location:login.php');
}

$logado = $_SESSION['CodigoADM'];

require "conexao.php";

// Excluir um registro
if (isset($_GET['delete'])) {
    $idExcluir = $_GET['delete'];
    $sqlDelete = "DELETE FROM tbRM WHERE rm = ?";
    $stmtDelete = mysqli_prepare($conexao, $sqlDelete);
    mysqli_stmt_bind_param($stmtDelete, "s", $idExcluir);
    mysqli_stmt_execute($stmtDelete);
    mysqli_stmt_close($stmtDelete);
    header("Location: " . $_SERVER['PHP_SELF']); // Redireciona para evitar reenvio
    exit;
}

// Excluir todos os registros de um curso
if (isset($_GET['deleteAll'])) {
    $cursoExcluir = $_GET['deleteAll'];
    $sqlDeleteAll = "DELETE FROM tbRM WHERE curso = ?";
    $stmtDeleteAll = mysqli_prepare($conexao, $sqlDeleteAll);
    mysqli_stmt_bind_param($stmtDeleteAll, "s", $cursoExcluir);
    mysqli_stmt_execute($stmtDeleteAll);
    mysqli_stmt_close($stmtDeleteAll);
    header("Location: " . $_SERVER['PHP_SELF']); // Redireciona para evitar reenvio
    exit;
}

// Inserir um novo registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $rm = $_POST['rm'];
    $curso = $_POST['curso'];

    // Verifica se o RM já existe
    $sqlCheck = "SELECT * FROM tbRM WHERE rm = ?";
    $stmtCheck = mysqli_prepare($conexao, $sqlCheck);
    mysqli_stmt_bind_param($stmtCheck, "s", $rm);
    mysqli_stmt_execute($stmtCheck);
    $resultCheck = mysqli_stmt_get_result($stmtCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        echo "<script>alert('O RM já existe!');</script>";
    } else {
        $sqlInsert = "INSERT INTO tbRM (nome, rm, curso) VALUES (?, ?, ?)";
        $stmtInsert = mysqli_prepare($conexao, $sqlInsert);
        mysqli_stmt_bind_param($stmtInsert, "sss", $nome, $rm, $curso);
        mysqli_stmt_execute($stmtInsert);
        mysqli_stmt_close($stmtInsert);
        header("Location: " . $_SERVER['PHP_SELF']); // Redireciona para evitar reenvio
        exit;
    }

    mysqli_stmt_close($stmtCheck);
}
?>


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
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Teste</title>

    <style>
        /* Estilos para o rodapé fixo */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        footer {
            margin-top: auto;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
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
                <img src="../images/logo3.png" width="45" height="45" alt="Logo">
            </a>
            <a class="navbar-brand text-light" href="#">Etec Bebedouro</a>
            
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
                    <img src="../images/sair.png" width="40" height="40" alt="Logo">
                </a>
                
            </div>
        </div>
    </nav>
    <!-- End NavBar-->


    <!-- Start Table for tbRM -->
    <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4">Gerenciar RMs</h2>

        <form method="GET" class="mb-4">
            <div class="input-group">
                <select name="curso" class="form-select" required>
                    <option value="" disabled selected>Filtrar por curso</option>
                    <option value="INFO">Informática</option>
                    <option value="ADM">Administração</option>
                    <option value="RH">Recursos Humanos</option>
                    <option value="SJ">Serviços Jurídicos</option>
                    <option value="MKT">Marketing</option>
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>

        <div style="max-height: 850px; overflow-y: auto;">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>RM</th>
                        <th>Curso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verifica se foi feito um filtro de curso
                    $cursoFiltro = isset($_GET['curso']) ? $_GET['curso'] : '';

                    // Se houver filtro, busca apenas os registros do curso selecionado
                    if ($cursoFiltro) {
                        $sqlSelect = "SELECT * FROM tbRM WHERE curso = ? ORDER BY nome ASC";
                        $stmtSelect = mysqli_prepare($conexao, $sqlSelect);
                        mysqli_stmt_bind_param($stmtSelect, "s", $cursoFiltro);
                    } else {
                        // Se não houver filtro, busca todos os registros
                        $sqlSelect = "SELECT * FROM tbRM ORDER BY nome ASC";
                        $stmtSelect = mysqli_prepare($conexao, $sqlSelect);
                    }

                    mysqli_stmt_execute($stmtSelect);
                    $resultSelect = mysqli_stmt_get_result($stmtSelect);
                    while ($row = mysqli_fetch_assoc($resultSelect)) {
                        echo "<tr>
                                <td>{$row['nome']}</td>
                                <td>{$row['rm']}</td>
                                <td>{$row['curso']}</td>
                                <td>
                                    <a href='?delete={$row['rm']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este registro?\")'>Excluir</a>
                                </td>
                              </tr>";
                    }
                    mysqli_stmt_close($stmtSelect);
                    ?>
                </tbody>
            </table>
        </div>


        <form method="GET" class="mb-4">
            <div class="input-group">
                <select name="deleteAll" class="form-select" required>
                    <option value="" disabled selected>Excluir todos os registros do curso</option>
                    <option value="INFO">Informática</option>
                    <option value="ADM">Administração</option>
                    <option value="RH">Recursos Humanos</option>
                    <option value="SJ">Serviços Jurídicos</option>
                    <option value="MKT">Marketing</option>
                </select>
                <button type="submit" class="btn btn-danger" onclick='return confirm("Tem certeza que deseja excluir todos os registros deste curso?")'>Excluir Todos</button>
            </div>
        </form>

        <h3 class="text-center mb-3">Adicionar Novo Registro</h3>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="rm" class="form-label">RM:</label>
                <input type="text" class="form-control" id="rm" name="rm" required>
            </div>
            <div class="mb-3">
                <label for="curso" class="form-label">Curso:</label>
                <select name="curso" class="form-select" required>
                    <option value="" disabled selected>Selecione um curso</option>
                    <option value="INFO">Informática</option>
                    <option value="ADM">Administração</option>
                    <option value="RH">Recursos Humanos</option>
                    <option value="SJ">Serviços Jurídicos</option>
                    <option value="MKT">Marketing</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Adicionar Registro</button>
        </form>
    </div>
    <!-- End Table for tbRM -->

    <footer class="text-center py-3">
        <p>© 2024 Etec Bebedouro. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
