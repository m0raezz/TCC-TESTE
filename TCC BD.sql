
-- Criação do banco de dados
CREATE DATABASE TESTE1;

USE TESTE1;

-- Tabela tbADM
CREATE TABLE tbADM (
    CodigoADM VARCHAR(40) NOT NULL,
    SenhaADM VARCHAR(40) NOT NULL
);

-- Inserção de dados na tabela tbADM
INSERT INTO tbADM (CodigoADM, SenhaADM)
VALUES ('151', 'Etec2023ADM');

-- Tabela tbcomentarios
CREATE TABLE tbcomentarios (
    nomeVeterano VARCHAR(90) NOT NULL,
    rmVeterano INT(5) NOT NULL PRIMARY KEY,
    texto TEXT NOT NULL,
    curso VARCHAR(4) NOT NULL,
    condicao CHAR(1) DEFAULT 'I',
    ano YEAR DEFAULT YEAR(CURDATE()),

    CONSTRAINT curso_check CHECK (curso IN ('INFO', 'ADM', 'RH', 'SJ', 'MKT'))
);

-- Inserção de dados na tabela tbcomentarios
INSERT INTO tbcomentarios (nomeVeterano, rmVeterano, texto, curso, ano)
VALUES ('Renan', 31767, 'muito bom', 'INFO', '2024');

-- Tabela tbcurso
CREATE TABLE tbcurso (
    texto TEXT NOT NULL,
    curso VARCHAR(4) NOT NULL,

    CONSTRAINT curso_check3 CHECK (curso IN ('INFO', 'ADM', 'RH', 'SJ', 'MKT'))
);

-- Inserção de dados na tabela tbcurso
INSERT INTO tbcurso (texto, curso)
VALUES 

-- ADM
('O curso é estruturado em três séries anuais, com até oito aulas diárias em período integral. A matriz curricular inclui projetos de aprofundamento voltados para as principais áreas do conhecimento, alinhados às ocupações demandadas pelo mercado de trabalho. Ao final do programa, o aluno recebe um diploma de técnico, que habilita tanto ao exercício da profissão quanto à continuidade dos estudos no nível superior.

O currículo abrange o funcionamento de diversas organizações, incluindo empresas privadas, ONGs, órgãos públicos e setores de comércio e indústria. Para entender os conteúdos abordados, como história da administração, evolução organizacional, contabilidade e legislação empresarial, o estudante precisa de fundamentos em língua portuguesa, matemática, história e geografia. Além disso, aprenderá a analisar a viabilidade de negócios e o comportamento do consumidor, técnicas de atendimento ao cliente, empreendedorismo e estratégias de planejamento organizacional.

O técnico em Administração tem diversas oportunidades de atuação em diferentes departamentos. No setor de compras, pode elaborar pedidos, cadastrar fornecedores e conferir a entrega de mercadorias. Na produção, é responsável pela elaboração de planilhas de controle de processos e produtos, registrando a quantidade produzida. No departamento de vendas, pode desenvolver planilhas para monitorar o desempenho das vendas, cadastrar clientes e gerenciar a documentação fiscal. No setor de Recursos Humanos, atuará no cálculo de salários e benefícios, além de apoiar processos de contratação e demissão. Em todas as áreas, o técnico também estará apto a atender clientes e fornecedores, redigindo documentos como e-mails, memorandos e atas.', 'ADM'),

-- INFO
('O currículo é estruturado em três séries anuais interligadas, com a carga horária de até oito aulas diárias em período integral. A matriz curricular inclui projetos de aprofundamento focados nas diversas áreas do conhecimento, correspondendo às ocupações identificadas no mercado de trabalho. Ao concluir as três séries, o aluno receberá o diploma de técnico, o que lhe conferirá o direito de exercer a habilitação profissional e prosseguir com os estudos em nível superior.

O curso abrange o processo de criação de sites e o desenvolvimento de programas que podem ser integrados a páginas na internet. Para isso, o aluno estudará raciocínio lógico e linguagens de programação, que permitem a implementação de comandos para desenvolver funcionalidades e estruturar um site. Além disso, os estudantes terão a oportunidade de aprender fundamentos de design, visando à criação de páginas mais atraentes e de fácil navegação. O curso também contempla a criação e a modificação de bancos de dados que alimentarão os sites. Noções de marketing digital e empreendedorismo serão abordadas ao longo da formação.

O profissional formado será capaz de criar websites que atendam às necessidades dos clientes, identificando e sugerindo as melhores soluções; realizar a manutenção de portais, sites e intranets; gerenciar a identidade visual das páginas de uma empresa; customizar plataformas de conteúdo para a web, como blogs e e-commerces; desenvolver e manter bancos de dados para websites; adaptar páginas para incorporar vídeos, áudios e funções que favoreçam a acessibilidade, como comandos de voz; otimizar imagens para uso na internet; e preparar layouts para newsletters ou e-mails marketing, entre outras atividades.', 'INFO'),

-- RH
('O curso é estruturado em três séries anuais, com uma carga horária de seis aulas diárias em meio período (manhã ou noite). A matriz curricular integra disciplinas da Base Nacional Comum do Ensino Médio com componentes do Ensino Técnico. Ao concluir as três séries, o aluno terá finalizado o Ensino Médio e receberá o diploma de Técnico, o que lhe permitirá exercer a habilitação profissional e prosseguir com os estudos em nível superior.

O estudante necessitará de conhecimentos em língua portuguesa, matemática e história para compreender o curso e desempenhar as funções do setor de Recursos Humanos de uma empresa. Essas funções incluem a contratação, demissão e aposentadoria de funcionários, bem como a oferta de benefícios (vale-transporte, plano de saúde, vale-refeição etc.). Para tal, será fundamental o estudo das leis que regulam os direitos e deveres do empregador e dos empregados (legislação trabalhista). O aluno também aprenderá noções de psicologia, essenciais para entender as dinâmicas de relacionamento no ambiente de trabalho, realizar processos de recrutamento e seleção de novos funcionários e promover ações de motivação.

Entre as atribuições do técnico em Recursos Humanos, destacam-se: anunciar vagas de emprego, descrevendo as atribuições dos cargos a serem preenchidos; aplicar testes em processos seletivos; realizar cálculos para determinar os valores a serem descontados do salário dos funcionários, como o Imposto de Renda e a contribuição ao INSS, além de porcentagens referentes a benefícios; inserir informações no sistema para a geração de demonstrativos de pagamentos (holerites ou contracheques); cuidar da documentação necessária para aposentadoria, contratação e demissão de profissionais, incluindo o preenchimento de informações na carteira de trabalho; organizar e arquivar documentos do setor; registrar e controlar períodos de férias e afastamentos; e auxiliar no treinamento e capacitação dos empregados.', 'RH'),

-- MKT
('O curso é estruturado em três séries anuais, com uma carga horária de seis aulas diárias em meio período (manhã). A matriz curricular integra disciplinas da Base Nacional Comum do Ensino Médio com componentes do Ensino Técnico. Ao concluir as três séries, o aluno terá completado o Ensino Médio e receberá o diploma de Técnico, o que lhe permitirá exercer a habilitação profissional e prosseguir com os estudos em nível superior.

O estudante aprenderá que marketing transcende a mera publicidade; trata-se de um processo que inicia com a compreensão das necessidades do consumidor, visando o desenvolvimento de produtos, serviços e ideias a serem comercializados. Para aprofundar-se nesse campo, o aluno necessitará de conhecimentos em língua portuguesa, geografia e matemática. Aprenderá a definir o público-alvo de cada produto ou serviço e a analisar o processo de interação entre vendedores e compradores. Além disso, estudará as diversas ferramentas de comunicação, como publicidade, telemarketing e promoções de vendas. O curso também contemplará a criação de logotipos, rótulos e embalagens. A formação técnica em Marketing será complementada por disciplinas como Administração de Empresas, Legislação (incluindo o Código de Defesa do Consumidor) e aulas de Inglês e Espanhol voltadas à leitura de textos.

O técnico em Marketing estará apto a realizar pesquisas de mercado para identificar o comportamento do consumidor. No ponto de venda (como supermercados, shoppings e lojas), poderá demonstrar produtos, montar materiais promocionais e negociar espaços para a exposição adequada dos itens a serem comercializados. Também será responsável pela elaboração de orçamentos para a execução de ações, como promoções e campanhas publicitárias, calculando os custos envolvidos. Ademais, poderá acompanhar as ações implementadas para avaliar se os resultados foram satisfatórios. Em pequenas empresas, o profissional poderá desenvolver logotipos, rótulos e criar conteúdo para redes sociais.', 'MKT'),

-- SJ
('O curso é estruturado em três séries anuais, com uma carga horária de seis aulas diárias em meio período (manhã). A matriz curricular combina disciplinas da Base Nacional Comum do Ensino Médio com componentes do Ensino Técnico. Ao concluir as três séries, o aluno terá finalizado o Ensino Médio e receberá o diploma de Técnico, o que lhe permitirá exercer a habilitação profissional e continuar os estudos em nível superior.

Com foco nas leis e normas, o curso abrange diversas áreas do Direito. O aluno estudará a Constituição Federal (Direito Constitucional), os mecanismos de punição a crimes (Direito Penal), as regras que regem as relações e disputas entre indivíduos (Direito Civil), o funcionamento dos órgãos públicos (Direito Administrativo), as normas que regulam as relações comerciais (Direito Empresarial), os direitos e deveres entre empregadores e empregados (Direito do Trabalho), a legislação tributária (Direito Tributário) e a proteção ao consumidor (Direito do Consumidor), entre outros temas. O estudante também aprenderá a elaborar e redigir processos, contratos e documentos jurídicos. Além do estudo das leis, o aluno terá formação em conceitos de administração de empresas, matemática financeira, técnicas de atendimento ao cliente e inglês instrumental, sendo a língua portuguesa fundamental.

O técnico em Direito atuará como auxiliar do advogado, oferecendo suporte técnico e administrativo a empresas. Suas responsabilidades incluem prestar atendimento ao público, verificar os prazos de cada etapa de processos judiciais, calcular os honorários dos advogados e os custos dos processos, receber e enviar documentos, registrando a movimentação em sistemas ou livros de protocolo, redigir contratos, ofícios, processos e cartas comerciais, além de arquivar processos e realizar outras atividades pertinentes.', 'SJ');

-- Tabela tbRM
CREATE TABLE tbRM (
    nome VARCHAR(255) NOT NULL,
    rm INT(5) PRIMARY KEY,
    curso VARCHAR(4) NOT NULL,

    CONSTRAINT curso_check2 CHECK (curso IN ('INFO', 'ADM', 'RH', 'SJ', 'MKT'))
);

-- Inserção de dados na tabela tbRM
INSERT INTO tbRM (nome, rm, curso)
VALUES 
('ADRYELLY DE OLIVEIRA', 31767, 'INFO'),
('ANA CLARA MAXIMINO', 31957, 'INFO'),
('ARTHUR BARBEIRO AGUIAR', 31782, 'INFO'),
('BRUNO MENDES DA SILVA', 31777, 'INFO'),
('BRYAN BELARMINO MOREIRA', 31766, 'INFO'),
('CARLOS ALEXANDRE DA SILVA GOMES', 31765, 'INFO'),
('CAUÃ ALTRON PULIANI', 31790, 'INFO'),
('CAUÊ RODRIGUES NUNES EVANGELISTA', 31958, 'INFO'),
('CÉSAR AUGUSTO FREITAS SAVOLDI', 31789, 'INFO'),
('ESTEVÃO DA SILVA LUCRECIO', 31888, 'INFO'),
('FELIPE NETTO DA COSTA', 31275, 'INFO'),
('FELIPE SILVA DE SOUZA', 31786, 'INFO'),
('GABRIEL CESAR RODRIGUES', 31783, 'INFO'),
('GABRIEL PARIJANI CUSTODIO', 31788, 'INFO'),
('GABRIEL PINHEIRO CHAGAS FERNANDES', 31774, 'INFO'),
('HENRIQUE RODRIGUES BARBOSA', 31769, 'INFO'),
('INGRID CAVALLI DA SILVA', 31781, 'INFO'),
('ISABELA DE OLIVERA GUESSI', 31762, 'INFO'),
('JHONATAN GOBETI NUNES', 31768, 'INFO'),
('JOÃO GILBERTO CANAL FAVARO', 31883, 'INFO'),
('JOÃO PEDRO DE LIMA SANTOS', 31885, 'INFO'),
('JOÃO PEDRO DE OLIVEIRA SPERA', 31772, 'INFO'),
('JOÃO PEDRO PAULINO SPINDA', 31884, 'INFO'),
('JULIA BELLINI SORRENTE', 31784, 'SJ'),
('KAIQUE ALVES DE CONTI', 31776, 'INFO'),
('LETÍCIA DA SILVA FRANCISCO', 31780, 'INFO'),
('LETÍCIA PEREIRA DA SILVA', 31770, 'INFO'),
('LETYCIA CONDE DA CRUZ', 31979, 'RH'),
('LUCAS ALESSANDRO MENDONÇA BENTO', 31889, 'INFO'),
('LUCAS DANIEL TAVARES MAXIMO', 31773, 'INFO'),
('LUIGI AUGUSTO VAZ CASSIANO DA SILVA', 31787, 'INFO'),
('MARCOS ALEXANDRE ALVES ARAUJO', 31778, 'MKT'),
('PABLO HENRIQUE NOGUEIRA', 31887, 'INFO'),
('PEDRO HENRIQUE ALVES DIAS', 31886, 'INFO'),
('PEDRO HENRIQUE DEZEM', 31763, 'INFO'),
('RAFAEL DO NASCIMENTO', 31761, 'INFO'),
('RENAN BRITO DE MORAES', 31775, 'ADM'),
('RIAD ABBES BERNARDE', 31764, 'INFO'),
('VINICIUS SILVA GUEDES', 32001, 'INFO');
