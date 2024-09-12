<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Avaliações</title>
    <!-- LINKS -->
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
                
    <!-- Bootstrap e CSS -->
    <link rel="stylesheet" href="./Pages_CSS/AV.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body>
    <!-- Start NavBar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!-- Navbar icon left -->
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo3.png" width="45" height="48" alt="Logo">
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
                        <a class="text-light nav-link active me-2" aria-current="page" href="../index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="../index.php">Equipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link me-2" href="../index.php">Sobre</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="text-light nav-link dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CURSOS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./Pages/INFO.php">Administração - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="#">Informática p/ Internet - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="#">Recursos Humanos - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="#">Marketing - Novotec integrado</a></li>
                            <li><a class="dropdown-item" href="#">Serviços Jurídicos - Novotec integrado</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="text-light nav-link dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            AVALIAÇÕES
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="ADM.php">ADM</a></li>
                            <li><a class="dropdown-item" href="INFO.php">INFO</a></li>
                            <li><a class="dropdown-item" href="RH.php">RH</a></li>
                            <li><a class="dropdown-item" href="MKT.php">MKT</a></li>
                            <li><a class="dropdown-item" href="SJ.php">SJ</a></li>
                        </ul>
                    </li>
                </ul>
                
                <!-- Login navbar right -->

            </div>
        </div>
    </nav>
    <!-- End NavBar-->

    <!-- Tabela Lateral Esquerda -->
    <div class="tabela-lateral">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Segmento</th>
                </tr>
            </thead>
            <tbody>
                <!-- Gerando 40 segmentos -->
                <tr><th scope="row">1</th><td>Segmento 1</td></tr>
                <tr><th scope="row">2</th><td>Segmento 2</td></tr>
                <tr><th scope="row">3</th><td>Segmento 3</td></tr>
                <!-- Repita até 40 -->
                <tr><th scope="row">40</th><td>Segmento 40</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Start Containers -->
    <div class="container mt-5 container-custom">
        <!-- Header de Avaliações -->
        <section class="avaliacoes-header">
            <span>Avaliações Pendentes - SJ</span>
            <span class="badge badge-success">✔ Aprovar</span>
            <span class="badge badge-danger">✖ Reprovado</span>
            <span class="badge badge-primary">➤ Reencaminhar</span>
        </section>

        <!-- Cards de Avaliações -->
        <section class="row">
            <!-- Primeira Coluna -->
            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>

            <!-- Segunda Coluna -->
            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>

            <!-- Terceira Coluna -->
            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center p-3">
                    <div class="stars">★ = </div>
                    <div class="">Textp teste - NO ano de 2021 quando entrei na etec pensei que mudaria minha vida. Está contente com a mudança e ansiosa para entra na etec</div>
                    <div class="d-flex justify-content-around mt-3">
                        <span class="text-success btn-animated">✔</span>
                        <span class="text-danger btn-animated">✖</span>
                        <span class="text-primary btn-animated">➤</span>
                    </div>
                </div>
            </div>

            


    
        </section>
    </div>

</body>
</html>
