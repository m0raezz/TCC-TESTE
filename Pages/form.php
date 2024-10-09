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
            <a class="navbar-brand" href="#">
                <img src="../images/logo3.png" width="45" height="48" alt="Logo">
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
                        <a class="text-light nav-link active me-2" aria-current="page" href="../index.php #im">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="../index.php #eq">Equipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="../index.php #sb">Sobre</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="text-light nav-link dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CURSOS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="2.1_ADM.php">Administração - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="1.1_INFO.php">Informática p/ Internet - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="4.1_RH.php">Recursos Humanos - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="3.1_MKT.php">Marketing - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="5.1_SJ.php">Serviços Jurídicos - Novotec integrado</a></li>
                        </ul>
                    </li>
                </ul>
                
                <!-- Login navbar right -->
                <a href="login.php" class="ms-auto">
                    <img src="../images/login.png" width="45" height="48" alt="Logo">
                </a>
            </div>
        </div>
    </nav>
    <!-- End NavBar-->

    <!-- Start Form -->
    <?php
    require "conexao.php";

    $mensagem = ""; // Variável para armazenar a mensagem de feedback

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Captura os dados do formulário
        $nome = $_POST['nome'];
        $rm = $_POST['rm'];
        $curso = $_POST['curso'];
        $observacoes = $_POST['observacoes'];

        // Prepara a consulta SQL para buscar os RMs válidos para o curso selecionado
        $sql = "SELECT rm FROM tbRM WHERE curso = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $curso);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Verifica se o RM fornecido está na lista de RMs válidos
        $rms_validos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rms_validos[] = $row['rm'];
        }

        // Verifica se há resultados retornados
        if (empty($rms_validos)) {
            $mensagem = "Nenhum RM válido encontrado para o curso selecionado!";
        } else {
            // Verifica se o RM já existe na tabela tbcomentarios
            $sql_comentario = "SELECT rmVeterano FROM tbcomentarios WHERE rmVeterano = ?";
            $stmt_comentario = mysqli_prepare($conexao, $sql_comentario);
            mysqli_stmt_bind_param($stmt_comentario, "s", $rm);
            mysqli_stmt_execute($stmt_comentario);
            $result_comentario = mysqli_stmt_get_result($stmt_comentario);

            if (mysqli_num_rows($result_comentario) > 0) {
                $mensagem = "Erro: O RM informado já possui uma avaliação! Caso não tenha sido você, nôs contacte: <bold>suporte.integra@gmail.com";
            } else {
                // Se o RM não existe na tabela de comentários, verifica se é válido
                if (in_array($rm, $rms_validos)) {
                    // Processar o formulário se o RM for válido
                    $mensagem = "Formulário enviado com sucesso!";
                    // Aqui você pode prosseguir com o processamento dos dados, como inserção no banco
                } else {
                    // Retorna uma mensagem de erro caso o RM seja inválido
                    $mensagem = "Erro: O RM informado não é válido para o curso selecionado!";
                }
            }

            // Fechar a consulta de comentários
            mysqli_stmt_close($stmt_comentario);
        }

        // Fechar a consulta de RMs válidos
        mysqli_stmt_close($stmt);
    }
    ?>

    <section name="forms" class="mt-5 pt-5 flex-grow-1">
        <div class="container">
            <h2 class="text-center mb-4">Formulário de Avaliação</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" placeholder="Seu Nome" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="rm" class="form-label">RM</label>
                    <input type="number" placeholder="12345" class="form-control" id="rm" name="rm" required>
                </div>
                <div class="mb-3">
                    <label for="curso" class="form-label">Curso</label>
                    <select class="form-select" id="curso" name="curso" required>
                        <option value="" disabled selected>Selecione um curso</option>
                        <option value="INFO">INFO</option>
                        <option value="ADM">ADM</option>
                        <option value="RH">RH</option>
                        <option value="SJ">SJ</option>
                        <option value="MKT">MKT</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="observacoes" class="form-label">Avaliação</label>
                    <textarea class="form-control" id="observacoes" name="observacoes" rows="5" maxlength="2000" placeholder="Escreva sua Avaliação aqui..." required></textarea>
                    <div class="form-text">Máximo de 2000 caracteres.</div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Modal para exibir mensagem -->
    <div class="modal fade" id="mensagemModal" tabindex="-1" aria-labelledby="mensagemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mensagemModalLabel">Mensagem</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (!empty($mensagem)) echo $mensagem; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mostra o modal se houver uma mensagem
        <?php if (!empty($mensagem)) { ?>
            var myModal = new bootstrap.Modal(document.getElementById('mensagemModal'));
            myModal.show();
        <?php } ?>
    </script>

    <!-- End Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Integra Etec:
            <a class="text-body" href="https://etecbebedouro.com.br">etecbebedouro.com.br</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- End Footer -->

</body>
</html>
