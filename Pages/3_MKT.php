<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- LINKS -->
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
                
    <!-- Bootstrap e CSS -->
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Teste</title>

    <style>
        /* Estilo para garantir que as seções ocupem a altura total da viewport */
        .full-height {
            height: 100vh;
        }
        .scrollable-cards {
            height: 95%; /* Define a altura da área de rolagem */
            overflow-y: auto; /* Ativa a rolagem vertical */
            width: 100%; /* Largura total */
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
            <a class="navbar-brand" href="#">
                <img src="../images/logo3.png" width="45" height="48" alt="Logo">
            </a>
            <a class="navbar-brand text-light" href="../index.php">Etec Bebedouro</a>
            <button class="text-light navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-light navbar-toggler-icon"></span>
            </button>
            <div class="text-light collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="text-light nav-link active me-2" aria-current="page" href="../index.php #im">Inicio</a></li>
                    <li class="nav-item"><a class="text-light nav-link me-2" href="../index.php #eq">Equipe</a></li>
                    <li class="nav-item"><a class="text-light nav-link me-2" href="../index.php #sb">Sobre</a></li>

                    <li class="nav-item dropdown">
                        <a class="text-light nav-link dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">CURSOS</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="2_ADM.php">Administração - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="1_INFO.php">Informática p/ Internet - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="4_RH.php">Recursos Humanos - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="3_MKT.php">Marketing - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="5_SJ.php">Serviços Jurídicos - Novotec integrado</a></li>
                        </ul>
                    </li>
                </ul>
                <a href="login.php" class="ms-auto">
                    <img src="../images/login.png" width="45" height="48" alt="Logo">
                </a>
            </div>
        </div>
    </nav>
    <!-- End NavBar-->

    <!-- Start AV -->
    <div class="container-fluid" style="margin-top: 80px;">

        <div class="row full-height">
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center" style="background-color: #f8f9fa;" name="texto">
                <h2 class="text-center">Curso MKT</h2>
                <p>Texto sobre o curso.</p>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center" style="background-color: #e9ecef;" name="Direita">
                <h2 class="text-center">Avaliações</h2>
                <p>Avaliações.</p>

                <!-- Nova div dentro da div Direita -->
                <div class="d-flex flex-column  " style="background-color: #d3d3d3; width: 100%; height: 100%;">
                 
                    <!-- Div para cards com rolagem -->
                    <div class="scrollable-cards">
                        <!-- Exemplo de cards -->
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">Avaliação 1</h5>
                                <p class="card-text">Texto insano insanudo falando sobre como é a escola apenas escrito para testar como a div reage quando o texto é bem maior que o esperado, tomara que o site n colapse e derreta AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">Avaliação 2</h5>
                                <p class="card-text">Descrição da avaliação 2.</p>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">Renan Brito de Moraes - INFO 2024</h5> 
                                <p class="card-text">Gostei do curso tmj 👌</p>
                            </div>    
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">Júlia Beline Sorrente - INFO 2024</h5>  
                                <p class="card-text">Gostei do curso tmj ✅</p>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">Marcos Alexandre Araujo - INFO 2024</h5> 
                                <p class="card-text">Gostei do curso tmj 🙅‍♀️</p>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">Letycia Conde da Cruz - INFO 2024</h5> 
                                <p class="card-text">Gostei do curso tmj 🐒</p>
                            </div>
                        </div>

                        
                        <!-- Adicione mais cards conforme necessário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End AV -->

    <!-- End Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Integra Etec:
            <a class="text-body" href="https://etecbebedouro.com.br">etecbebedouro.com.br</a>
        </div>
    </footer>
    <!-- End Footer -->

</body>
</html>
