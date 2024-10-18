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
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                
    <!-- Bootstrap e CSS -->
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <title>Integra Etec</title>
    <link rel="icon" type="image/x-icon" href="..\Images\logo1.png">

    <style>
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
                <img src="../Images/logo3.png" width="45" height="45" alt="Logo">
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
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="ADM_CMTAP.php">APROVADAS</a>
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
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="ADM_CURSOS.php">TEXTOS DOS CURSOS</a>
                    </li>
                </ul>
                <a href="sair.php" class="ms-auto">
                    <img src="../Images/sair.png" width="40" height="40" alt="Logo">
                </a>
            </div>
        </div>
    </nav>
    <!-- End NavBar-->

    <!-- Start Table for tbRM -->
    <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4">Gerenciar RMs</h2>

        <!-- Filtro por curso e nome -->
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

        <!-- Tabela de registros -->
        <table class="table table-striped">
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
                // Verifica se foi feito um filtro de curso e/ou nome
                $cursoFiltro = isset($_GET['curso']) ? $_GET['curso'] : 'TODOS';
                $nomeFiltro = isset($_GET['nomeFiltro']) ? $_GET['nomeFiltro'] : '';

                // Filtro por nome, independente do curso
                if ($nomeFiltro && $cursoFiltro === 'TODOS') {
                    $sqlSelect = "SELECT * FROM tbRM WHERE nome LIKE ? ORDER BY nome ASC";
                    $stmtSelect = mysqli_prepare($conexao, $sqlSelect);
                    $nomeFiltro = "%$nomeFiltro%";
                    mysqli_stmt_bind_param($stmtSelect, "s", $nomeFiltro);
                } elseif ($cursoFiltro !== 'TODOS' && $nomeFiltro) {
                    // Filtro por curso e nome
                    $sqlSelect = "SELECT * FROM tbRM WHERE curso = ? AND nome LIKE ? ORDER BY nome ASC";
                    $stmtSelect = mysqli_prepare($conexao, $sqlSelect);
                    $nomeFiltro = "%$nomeFiltro%";
                    mysqli_stmt_bind_param($stmtSelect, "ss", $cursoFiltro, $nomeFiltro);
                } elseif ($cursoFiltro !== 'TODOS') {
                    // Filtro somente por curso
                    $sqlSelect = "SELECT * FROM tbRM WHERE curso = ? ORDER BY nome ASC";
                    $stmtSelect = mysqli_prepare($conexao, $sqlSelect);
                    mysqli_stmt_bind_param($stmtSelect, "s", $cursoFiltro);
                } else {
                    // Sem filtros, exibe todos os registros
                    $sqlSelect = "SELECT * FROM tbRM ORDER BY nome ASC";
                    $stmtSelect = mysqli_prepare($conexao, $sqlSelect);
                }

                mysqli_stmt_execute($stmtSelect);
                $resultSelect = mysqli_stmt_get_result($stmtSelect);

                while ($row = mysqli_fetch_assoc($resultSelect)) {
                    echo "<tr>";
                    echo "<td>{$row['nome']}</td>";
                    echo "<td>{$row['rm']}</td>";
                    echo "<td>{$row['curso']}</td>";
                    echo "<td>";
                    echo "<a href='?delete={$row['rm']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Tem certeza que deseja excluir este registro?')\">Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }

                mysqli_stmt_close($stmtSelect);
                ?>
            </tbody>
        </table>

        <!-- Formulário para adicionar novo RM -->
        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" required>
            </div>
            <div class="mb-3">
                <label for="rm" class="form-label">RM</label>
                <input type="text" name="rm" class="form-control" id="rm" required>
            </div>
            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select name="curso" class="form-select" required>
                    <option value="INFO">Informática</option>
                    <option value="ADM">Administração</option>
                    <option value="RH">Recursos Humanos</option>
                    <option value="SJ">Serviços Jurídicos</option>
                    <option value="MKT">Marketing</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Adicionar RM</button>
        </form>
    </div>
    <!-- End Table for tbRM -->

    <!-- Footer -->
    <footer class="bg-dark text-light text-center  fixed-bottom">
        <p>&copy; 2024 Etec Bebedouro - Todos os direitos reservados.</p>
    </footer>
</body>
</html>
