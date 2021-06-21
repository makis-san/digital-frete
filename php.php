<?php
include('db-connect.php');
session_start();
if (isset($_SESSION["s_mail"])) {
    $logged = $_SESSION["s_mail"];
    $select = $con->query("SELECT * FROM users WHERE email='$logged' ");
    $row = $select->fetch_assoc();
    $id_user = $row['id'];
    $nome = $row['nome'];
    $cidade = $row['cid'];
    $estado = $row['est'];
    $telefone = $row['tel'];
    $tipo = $row['tipo'];
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">



    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K6MTZZ5');
    </script>
    <!-- End Google Tag Manager -->


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>DSBC Treinamentos
    </title>
    <!--     Fontes e Icones     -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js">
    </script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1fd08d9910.js" crossorigin="anonymous">
    </script>
    <script src="assets/js/core/jquery.min.js" type="text/javascript">
    </script>
    <link href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/reorder-rows/bootstrap-table-reorder-rows.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/1.0.3/jquery.tablednd.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/reorder-rows/bootstrap-table-reorder-rows.min.js"></script>

    <script>
        var request;

        function SendData() {
            event.preventDefault();

            console.log(event);
            const {
                0: msg_titulo,
                1: msg_content
            } = event.path[0];
            console.log(event.target);
            var serializedData = $.param({
                msg_title: msg_titulo.value,
                msg_conteudo: msg_content.value,
            });
            console.log(serializedData);

            if (request) {
                request.abort();
            }

            request = $.ajax({
                url: "/mail_bulk.php",
                type: "post",
                data: serializedData
            });

            request.done(function(response, textStatus, jqXHR) {
                alert("Email enviado para todos cadastrados na MailList");
            });

            // Callback handler that will be called on failure
            request.fail(function(jqXHR, textStatus, errorThrown) {
                alert("Erro" + textStatus)
            });

            request.always(function() {
                //Fechar Popup
            });

        }
    </script>


    <!-- CSS -->
    <link href="./assets/css/style.css?v=1.2.0" rel="stylesheet" />

<body class="profile-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6MTZZ5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="./index.php">
                <img src="assets/img/logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.php">
                                <img src="assets/img/logo-bk.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">Início</span>
                        </a>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Cursos</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="agenda.php" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-red rounded-circle text-white">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Agenda de Cursos</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Confira nossa agenda de cursos.</p>
                                    </div>
                                </a>
                                <a href="/curso.php" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-red rounded-circle text-white">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Catálogo de Cursos</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Lista completa de todos os cursos oferecidos.</p>
                                    </div>
                                </a>
                                <a href="/sobre.php" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-red rounded-circle text-white">
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Sobre os Cursos</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Conheça mais sobre nossa forma de ensino e os cursos.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="contato.php" class="nav-link" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">Entre em Contato</span>
                        </a>
                    </li>

                </ul>
                <?php if (isset($_SESSION["s_mail"])) : ?>
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon">
                                    <i class="far fa-user"></i>
                                </span>
                                <span class="nav-link-inner--text"><?php echo $nome; ?></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="nav-inner-primary_dropdown_1">
                                <a class="dropdown-item" href="perfil.php">Ver Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Sair</a>
                            </div>

                        </li>
                    </ul>
                <?php endif; ?>
                <?php if (!isset($_SESSION["s_mail"])) : ?>
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <a href="login.php" target="_blank" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                                <i class="far fa-user"></i>
                            </span>
                            <span class="nav-link-inner--text">Acessar conta</span>
                        </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Fim Navbar -->
    <div class="wrapper">
        <section class="section-profile-cover section-shaped my-0">
            <div class="shape shape-style-1 shape-primary" style="width: 100%;">
            </div>
        </section>
        <section class="section bg-secondary">
            <div class="container">
                <div class="card card-profile shadow mt--300">
                    <div class="px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="javascript:;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <small>Bem vindo,
                            </small>
                            <h3>
                                <?php echo $nome; ?>
                            </h3>
                            <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                                <!--    <div class="card-profile-actions py-4 mt-lg-0">
<a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
<a href="#" class="btn btn-sm btn-default float-right">Message</a>
</div> -->
                            </div>
                            <div class="col-md-center">
                                <?php if (!empty($tipo)) : ?>
                                    <div class="card-profile-stats d-flex justify-content-center">
                                        <div>
                                            <span class="heading">
                                                <?php $queryusers =  mysqli_query($con, ("SELECT id FROM users"));
                                                $resultusers = mysqli_num_rows($queryusers);
                                                echo $resultusers; ?>
                                            </span>
                                            <span class="description">Usuários Cadastrados
                                            </span>
                                        </div>
                                        <div>
                                            <span class="heading">
                                                <?php $querycursos =  mysqli_query($con, ("SELECT id FROM cursos"));
                                                $resultcursos = mysqli_num_rows($querycursos);
                                                echo $resultcursos; ?>
                                            </span>
                                            <span class="description">Cursos
                                            </span>
                                        </div>
                                        <div>
                                            <span class="heading">
                                                <?php $querynews =  mysqli_query($con, ("SELECT id FROM mailist"));
                                                $resultnews = mysqli_num_rows($querynews);
                                                echo $resultnews; ?>
                                            </span>
                                            <span class="description">Usuários Newsletter
                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mt-5 py-5 border-top ">
                            <div class="row justify-content-md-center">
                                <?php if (empty($tipo)) : ?>
                                    <div class="col-lg-6 col-sm-6" style="  border-right: solid #333 1px;">
                                        <div class="info-title text-center mb-6">
                                            <h4 class="info-title" style="color: red;">Meus Cursos <i class="fas fa-book"></i></h4>
                                        </div>
                                        <table id="tabela_turmas" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Curso
                                                    </th>
                                                    <th>Cidade
                                                    </th>
                                                    <th>Início
                                                    </th>
                                                    <th>Fim
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($con, "SELECT * FROM agenda");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $array = $row['id_usr'];
                                                    echo "<tr>";

                                                    if ($array != "{}") {
                                                        if (strpos($array, $id_user)) {
                                                            $idcc = $row['id'];
                                                            $qq = $con->query("SELECT * FROM cursos WHERE id='$idcc'");
                                                            $nome = mysqli_fetch_assoc($qq);
                                                            echo "<td><a href='curso.php?curso=" . $nome['token'] . "'>" . $nome['nome'] . "</a></td>";
                                                            echo "<td>" . $row['cid'] . "</td>";
                                                            echo "<td>" . $row['ini'] . "</td>";
                                                            echo "<td>" . $row['fim'] . "</td>";
                                                        }
                                                    }
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                            </thead>
                                        </table>

                                    </div>
                                    <div class="col-lg-6 col-sm-6 text-left ">
                                        <h4 class="info-title text-center mb-6" style="color: red;"> Suas informações<i class="fas fa-info-circle"></i>
                                        </h4>
                                        <div class="h6">
                                            </i> Cidade:
                                            <?php echo $cidade; ?>
                                            <i class="fas fa-city">
                                            </i>
                                        </div>
                                        <div class="h6"> Estado:
                                            <?php echo $estado; ?>
                                            <i class="fas fa-map">
                                            </i>
                                        </div>
                                        <div class="h6"> Telefone:
                                            <?php echo $telefone; ?>
                                            <i class="fas fa-phone">
                                            </i>
                                        </div>
                                        <div class="h6">Email:
                                            <?php echo $logged; ?>
                                            <i class="fas fa-envelope">
                                            </i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($tipo)) : ?>

                                    <div class="bs-example">
                                        <ul id="myTab" class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a href="#cursos" class="nav-link active" data-toggle="tab">Cursos
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#inscrições" class="nav-link" data-toggle="tab">
                                                    Propostas e Inscrições
                                                </a>
                                            </li>
                                            <!-- <li class="nav-item">
                        <a href="#matriculas" class="nav-link" data-toggle="tab">
                          Matriculas
                        </a>
                      </li> -->
                                            <li class="nav-item">
                                                <a href="#blog" class="nav-link" data-toggle="tab">Notícias
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#newsl" class="nav-link" data-toggle="tab">Newsletter
                                                </a>
                                            </li>
                                            <a href="#config" class="nav-link" data-toggle="tab">Configurações
                                            </a>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show" id="d">
                                                <div class="wrapper">
                                                    <a data-toggle="modal" data-target="#modal-sub-add" class="btn btn-primary" style="float: right; color: white;">Adicionar Matrícula</a>
                                                    <a href="db_prospect_download.php" target="_BLANK" class="btn btn-primary">Baixar Planilha Completa</a>
                                                    <table class="table table-hover table-responsive" data-reorderable-rows="true">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Contato
                                                                </th>
                                                                <th>Empresa
                                                                </th>
                                                                <th>Email
                                                                </th>
                                                                <th>Telefone
                                                                </th>
                                                                <th>Proposta
                                                                </th>
                                                                <th>Valor
                                                                </th>
                                                                <th>
                                                                </th>
                                                                <th>Ações
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $result = mysqli_query($con, "SELECT * FROM enrollments ORDER BY id DESC");
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo "<tr>";
                                                                echo '<td>' . $row['name'] . '</td>';
                                                                echo "<td>" . $row['company'] . "</td>";
                                                                echo "<td>" . $row['mail'] . "</td>";
                                                                echo "<td>" . $row['phone'] . "</td>";
                                                                echo "<td>" . $row['proposal'] . "</td>";
                                                                echo "<td>R$ " . $row['parcel_value'] . ' x ' . $row['parcels'] . ' (R$ ' . $row['value'] . ")</td>";
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="inscrições">
                                                <div class="container p-4">
                                                    <a data-toggle="modal" data-target="#modal-sub-add" class="btn btn-primary" style="float: right; color: white!important;">Importar</a>
                                                    <a data-toggle="modal" data-target="#modal-gerador" class="btn btn-primary" style="float: right; color: white!important;">Gerador de Proposta</a>

                                                    <a href="db_prospect_download.php" target="_BLANK" class="btn btn-primary">Baixar Planilha Completa</a>
                                                </div>
                                                <table class="table table-hover table-responsive" data-reorderable-rows="true">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Alunos
                                                            </th>
                                                            <th>Empresa
                                                            </th>
                                                            <th>Pagador
                                                            </th>
                                                            <th>Curso
                                                            </th>
                                                            <th>Agenda
                                                            </th>
                                                            <th>
                                                                Total (R$)
                                                            </th>
                                                            <th>Ações
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $result = mysqli_query($con, "SELECT * FROM subscriptions ORDER BY id DESC");
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            if ($row['isExternal'] == '0' && empty($row['isExternal'])) {
                                                                echo "<tr>";
                                                                echo '<td>
                              <a class="dropdown-toggle" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Alunos
                              </a>
                              <div class="dropdown-menu">
                              ';
                                                                $alunos = explode(',', $row['nome_aluno']);
                                                                $documentos = explode(',', $row['cpf_aluno']);
                                                                foreach ($alunos as $k => $v) {
                                                                    echo '<a class="dropdown-item bg-primary text-white">Nome / CPF</a>
                                      <a class="dropdown-item">' . $v . ' / ' . $documentos[$k] . '</a>';
                                                                }
                                                                echo '</div>
                              </div></td>';
                                                                '</td>';
                                                                echo "<td>" . $row['emp_aluno'] . "</td>";
                                                                echo "<td>" . $row['pagador'] . "</td>";
                                                                echo "<td>" . $row['curso'] . "</td>";
                                                                echo "<td>" . $row['agenda'] . "</td>";
                                                                echo "<td>" . $row['total'] . "</td>";
                                                                echo '<td isNumeric><a class="btn btn-primary text-white btn-sm" data-toggle="modal" data-target="#modal-sub-' . $row["id"] . '" style="float: right;">Ver mais</a></td>';
                                                                echo "</tr>";
                                                            } else {
                                                                echo "<tr>";
                                                                echo '<td>
                              <a class="dropdown-toggle" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Alunos
                              </a>
                              <div class="dropdown-menu">
                              ';
                                                                $alunos = explode(',', $row['nome_aluno']);
                                                                $documentos = explode(',', $row['cpf_aluno']);
                                                                foreach ($alunos as $k => $v) {
                                                                    echo '<a class="dropdown-item bg-primary text-white">Nome / CPF</a>
                                      <a class="dropdown-item">' . $v . ' / ' . $documentos[$k] . '</a>';
                                                                }
                                                                echo '</div>
                              </div></td>';
                                                                '</td>';
                                                                echo "<td>" . $row['emp_aluno'] . "</td>";
                                                                echo "<td>" . $row['pagador'] . "</td>";
                                                                echo "<td>" . $row['curso'] . "</td>";
                                                                echo "<td>" . $row['agenda'] . "</td>";
                                                                echo "<td>" . $row['total'] . "</td>";
                                                                echo '<td isNumeric>
                                <div class="row">
                                <a class="btn btn-primary text-white btn-sm btn-block" href="proposta/pdf/' . $row['pdf'] . '">Ver Documento</a>
                                <a class="btn btn-primary text-white btn-sm btn-block" data-toggle="modal" data-target="#modal-sub-' . $row["id"] . '">Ver mais</a></td>
                                </div>';
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show active" id="cursos">
                                                <div class="col-lg 6 text-center">
                                                    <div class="row justify-content-md-center">
                                                        <div class="wrapper">
                                                            <h4>Cursos
                                                            </h4>
                                                            <a class="btn btn-neutral mb-4" data-toggle="modal" data-target="#modal-curso" style="float: right;">Adicionar Curso</a>
                                                            <div class="table-responsive-sm">
                                                                <table id="tabela_curso" class="table table-hover" data-reorderable-rows="true">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Id
                                                                            </th>
                                                                            <th>Nome
                                                                            </th>
                                                                            <th>Preço
                                                                            </th>
                                                                            <th>Desconto
                                                                            </th>
                                                                            <th>Agendas
                                                                            </th>
                                                                            <th>
                                                                            </th>
                                                                            <th>Ações
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $result = mysqli_query($con, "SELECT * FROM cursos ORDER BY ord ASC");
                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                            $idc = $row['id'];
                                                                            echo "<tr data-field='" . $row['pos'] . "'>";
                                                                            echo "<td>" . $row['id'] . "</td>";
                                                                            echo "<td>" . $row['nome'] . "</td>";
                                                                            echo "<td>" . "R$ " . $row['preco'] . "</td>";
                                                                            if (!empty($row['promo'])) {
                                                                                echo "<td>" . $row['promo'] . "</td>";
                                                                            } else {
                                                                                echo "<td><a>Sem Desconto</a></td>";
                                                                            }
                                                                            echo '<td><div class="dropdown show">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ver agendas do curso
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                ';
                                                                            $query_agnda = mysqli_query($con, "SELECT * FROM agenda WHERE id='$idc'");
                                                                            while ($array_agnda = mysqli_fetch_array($query_agnda)) {
                                                                                echo '<a class="dropdown-item bg-primary text-white">' . $array_agnda['cid'] . ' [' . $array_agnda['alunos'] . '/' . $array_agnda['maxi'] . ']</a>';
                                                                                echo '<a class="dropdown-item">' . $array_agnda['ini'] . '</a>';
                                                                                echo '<a class="dropdown-item">' . $array_agnda['fim'] . '</a>';
                                                                            }
                                                                            echo '</div>
                                </div></td>';
                                                                            echo '<td><a class="btn btn-neutral btn-sm" data-toggle="modal" data-target="#modal-curso-' . $row["id"] . '" style="float: right;">Editar</a></td>';
                                                                            // echo '<td><a class="btn btn-neutral btn-sm" data-toggle="modal" data-target="#modal-turma-' . $row["id"] . '" style="float: right;">Turmas</a></td>';
                                                                            echo "</tr>";
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="blog">
                                                <div class="col-lg 6 text-center">
                                                    <div class="row justify-content-md-center">
                                                        <div class="wrapper">
                                                            <h4>Blog
                                                            </h4>
                                                            <div class="table-responsive-sm">
                                                                <table id="tabela_blog" class="table table-colors ">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Id
                                                                            </th>
                                                                            <th>Título
                                                                            </th>
                                                                            <th>Resumo
                                                                            </th>
                                                                            <th>Data
                                                                            </th>
                                                                            <th>Ações
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $result2 = mysqli_query($con, "SELECT * FROM noticias ORDER BY id ASC");
                                                                        while ($row = mysqli_fetch_array($result2)) {
                                                                            echo "<tr>";
                                                                            echo "<td>" . $row['id'] . "</td>";
                                                                            echo "<td>" . $row['nome'] . "</td>";
                                                                            echo "<td>" . $row['res'] . "</td>";
                                                                            echo "<td>" . $row['data'] . "</td>";
                                                                            echo "<td><button class='btn btn-sm btn btn-secondary' data-toggle='modal' data-target='#modal-blog-" . $row["id"] . "'>Editar</button></td>";
                                                                            echo "</tr>";
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <a class="btn btn-secondary" data-toggle="modal" data-target="#modal-blog">Adicionar Blog</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="newsl">
                                                <div class="col-lg 6 text-center">
                                                    <div class="row justify-content-md-center">
                                                        <div class="wrapper">
                                                            <h4>Newsletter
                                                            </h4>
                                                            <div class="table-responsive-sm">
                                                                <table id="tabela_newsl" class="table table-colors">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Id
                                                                            </th>
                                                                            <th>Nome
                                                                            </th>
                                                                            <th>Email
                                                                            </th>
                                                                            <th>Ações
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $result2 = mysqli_query($con, "SELECT * FROM mailist ORDER BY id ASC");
                                                                        while ($row = mysqli_fetch_array($result2)) {
                                                                            echo "<tr>";
                                                                            echo "<td>" . $row['id'] . "</td>";
                                                                            echo "<td>" . $row['nome'] . "</td>";
                                                                            echo "<td>" . $row['email'] . "</td>";
                                                                            echo "</tr>";
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <a class="btn btn-secondary" data-toggle="modal" data-target="#modal-news-bulk">Enviar para todos</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="config">
                                                <form id="cfg_form" method="POST" action="db_config.php" enctype="multipart/form-data">
                                                    <div class="row p-6 w-100">
                                                        <div class="col-lg-6">
                                                            <h4>Configurações Email</h4>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="smtp_mail" placeholder="Email SMTP" type="mail" value="<?php echo $smtp_mail ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="smpt_server" placeholder="Servidor SMTP" type="text" value="<?php echo $smtp_server ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="smpt_pass" placeholder="Senha SMTP" type="pass">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 border-left">
                                                            <h4>Configurações Contato</h4>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="end_cfg" placeholder="Endereço" type="text" value="<?php echo $endereco ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="num_cfg_1" placeholder="Número Contato 01" type="tel" value="<?php echo $tel_1 ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="num_cfg_2" placeholder="Número Contato 02" type="tel" value="<?php echo $tel_2 ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="num_wpp_cfg" placeholder="Número Contato Whatsapp" type="tel" value="<?php echo $wa ?>">
                                                                </div>
                                                                <small>* Adicionar o número no formato +55 XX XXXXX-XXXX</small>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="ctt_email_1" placeholder="Email para Contato 01" type="text" value="<?php echo $email_1 ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <div class="input-group input-group-alternative">
                                                                    <input style="width: 500px;" class="form-control input-sm" name="ctt_email_2" placeholder="Email para Contato 02" type="text" value="<?php echo $email_2 ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" placeholder="Enviar">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </section>
    <!-- Modais -->
    <!-- Curso -->
    <div class="modal fade" id="modal-curso" tabindex="-1" role="dialog" aria-labelledby="modal-curso" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Adicionar Curso
                    </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="db-add-curso.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg 6">
                                <div class="form-group mb-3">
                                    <label class="input-label">Nome do Curso</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control input-sm" name="c_name_add" placeholder="Nome do Curso" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="input-label">Carga Horária</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control input-sm" name="carga_horaria" placeholder="20hrs" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group form-row mb-3">
                                    <div class="col-lg-6">
                                        <label class="input-label">Modalidade</label>
                                        <div class="input-group input-group-alternative">
                                            <select name="c_cat_add" class="form-control" required>
                                                <option value="E.A.D">E.A.D</option>
                                                <option value="Presencial">Presencial</option>
                                                <option value="Teórico Online e Prática Presencial">Teórico Online e Prática Presencial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="input-label">Certificação</label>
                                        <div class="input-group input-group-alternative">
                                            <select name="c_cert_add" class="form-control" required>
                                                <option value="DSBC">DSBC</option>
                                                <option value="Furukawa">Furukawa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="input-label">Observação</label>
                                    <div class="input-group input-group-alternative">
                                        <textarea style="height: 100px;" class="form-control input-sm" name="c_ob_add" placeholder="Observação. Exemplo: Aulas teóricas para todas as turmas de Segunda a Sexta das 8:00 às 12:00" type="text" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="input-label">Descrição do Curso</label>
                                    <div class="input-group input-group-alternative">
                                        <textarea style="height: 300px;" class="form-control input-sm" name="c_desc_add" placeholder="Descrição do Curso" type="text" required></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg 6">
                                <div class="form-group">
                                    <label class="input-label">Preço</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$
                                            </span>
                                        </div>
                                        <input class="form-control input-sm preco" name="c_price_add" placeholder="X,XX" type="text" required>
                                    </div>
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheckLogin2" type="checkbox">
                                    <label class="custom-control-label" for="customCheckLogin2">
                                        <span>Inserir Desconto
                                        </span>
                                    </label>
                                </div>
                                <div class="form-group mt-3 desconto" id="divdesconto">
                                    <label class="input-label">Valor Promocional</label>
                                    <div class="input-group input-group-alternative ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$
                                            </span>
                                        </div>
                                        <input class="form-control input-sm descot" name="c_price_descont" placeholder="Desconto" type="text">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="btn btn-file btn-primary">
                                                <i class="fas fa-cloud-upload-alt" style="margin-right: 0;">
                                                </i>
                                                <input type="file" class="custom-control-input img" name="c_file_add" required>
                                            </span>
                                        </div>
                                        <label class="custom-control-label imglabel" style="padding: 10px;">Escolha uma Imagem
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="btn btn-file btn-primary">
                                                <i class="fas fa-cloud-upload-alt" style="margin-right: 0;">
                                                </i>
                                                <input type="file" class="custom-control-input pdf" name="c_pdf_add" required>
                                            </span>
                                        </div>
                                        <label class="custom-control-label pdflabel" style="padding: 10px;">Conteúdo do Curso em PDF
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                                    <input class="custom-control-input" name="ready" id="agendeSelectAdd" type="checkbox">
                                    <label class="custom-control-label" for="agendeSelectAdd">
                                        <span>Inserir Agendas
                                        </span>
                                    </label>
                                </div>
                                <small>* Caso desmarcado, o curso aparecerá como "Em Breve".</small>
                                <div class="input-group-prepend mt-3 d-flex row">
                                    <div id="agendaHAdd" class="form-group date mb-3">
                                        <script>
                                            $('#agendaHAdd').hide();
                                            $('#agendeSelectAdd').on('change', () => {
                                                $('#agendaHAdd').toggle();
                                            });
                                        </script>
                                        <div class="text-center">
                                            <h6>Agenda
                                            </h6>
                                        </div>
                                        <span class="btn btn-file btn-add">
                                            <a href="javascript:void(0);" class="">
                                                <i class="fas fa-plus">
                                                </i>
                                        </span>
                                        </a>
                                        <span class="btn btn-file">
                                            <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Início" class="flatpickr flatpickr-input form-control input-sm" name="agnd_ini[]" />
                                            <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Término" class="flatpickr flatpickr-input form-control input-sm mt-3" name="agnd_fim[]" />
                                            <textarea type="text" placeholder="Horários" class="form-control input-sm mt-3" name="agnd_cron[]"></textarea>
                                            <input type="text" placeholder="Cidade" class="form-control input-sm mt-3" name="agnd_cidade[]" value="" />
                                            <input type="text" placeholder="Tamanho da turma" class="form-control input-sm mt-3" name="agnd_turma[]" />
                                            <input type="text" placeholder="Promoção" class="form-control input-sm mt-3 descot" name="agnd_promo[]" />
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar
                            </button>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="modal fade" id="modal-blog" tabindex="-1" role="dialog" aria-labelledby="modal-blog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">Adicionar Blog
                            </h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="db-add-blog.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg 6">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <input class="form-control input-sm" name="c_name_add" placeholder="Titulo" type="text" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <textarea style="height: 300px;" class="form-control input-sm" name="c_desc_add" placeholder="Conteúdo" type="text" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg 6">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="btn btn-file btn-primary">
                                                        <i class="fas fa-cloud-upload-alt" style="margin-right: 0;">
                                                        </i>
                                                        <input type="file" class="custom-control-input img" name="c_file_add" required>
                                                    </span>
                                                </div>
                                                <label class="custom-control-label imglabel" style="padding: 10px;">Escolha uma Imagem
                                                </label>
                                            </div>
                                            <small>* Tamanho recomendado: 1200x1000px</small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <textarea style="height: 200px;" class="form-control input-sm" name="c_res_add" placeholder="Resumo do Conteúdo. (Máximo de 116 Caracteres)" maxlength="116" type="text" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar
                            </button>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="modal fade" id="modal-news-bulk" tabindex="-1" role="dialog" aria-labelledby="modal-news-bulk" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Enviar Menssagem Para Todos
                        </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" onsubmit='SendData()' enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg 6">
                                    <!--<div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <select id="selmsg" class="form-control input-sm" name="msg_type" placeholder="Tipo de Mensagem" type="text" required>
                      <option selected>Tipo de Mensagem</option>
                      <option value="promo">Promoção</option>
                      <option value="new">Novidade</option>
                    </select>
                  </div>
                </div>
                <script>
                $(document).ready(function(){
                      $("#selmsg").change(function(){
                          var selected = $(this).children("option:selected").val();
                          if (selected = "promo"){
                            document.getElementById("#cursos").style.display = "none";
                          } else if (selected = "new"){
                            document.getElementById("form_reg").disable = "false";
                            document.getElementById("form_reg").style.display = "false";
                          }
                      });
                  });
                </script>-->
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control input-sm" name="msg_title" placeholder="Título" id="msg_title " type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <textarea class="form-control input-sm" name="msg_conteudo" placeholder="Conteúdo" id="msg_content" type="text" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg 6">

                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" class="btn btn-primary">Enviar
                        </button>
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="modal-gerador" tabindex="-1" role="dialog" aria-labelledby="modal-curso" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Criar Proposta</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="proposta/index.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Alunos Input -->
                                <div class="container">
                                    <div class="form-group">
                                        <label class="text-uppercase font-weight-bold">Marque caso seja uma turma fechada. *</label>
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" name="fechado" id="customCheckRegister" type="checkbox">
                                            <label class="custom-control-label" for="customCheckRegister"><span>Turma fechada (Turma exclusiva apenas para os alunos abaixo)?</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-uppercase font-weight-bold">Marque caso o local de treinamento seja em propriedade do cliente. *</label>
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" name="sedeContrat" id="customCheckRegister2" type="checkbox">
                                            <label class="custom-control-label" for="customCheckRegister2"><span>Treinamento na sede do contratante?</span></label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <label class="input-label">Capital (UF) *</label>
                                            <div class="input-group input-group-alternative">
                                                <input class="form-control input-sm" name="uf" required placeholder="Capital (UF)" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="input-label">Data da Proposta</label>
                                            <div class="input-group input-group-alternative">
                                                <input class="form-control input-sm" name="date" type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="input-label">Vagas</label>
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control input-sm" name="vagas" placeholder="0..1..2..3" type="number">
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="input-label">Empresa</label>
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control input-sm" name="empresa" placeholder="Nome da Empresa ou Particular" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <div class="col-lg-6">
                                            <label class="input-label">Pagador</label>
                                            <div class="input-group input-group-alternative">
                                                <input class="form-control input-sm" name="pagador" placeholder="Pagador" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="input-label">Responsavel</label>
                                            <div class="input-group input-group-alternative">
                                                <input class="form-control input-sm" name="responsavel" placeholder="Nome da Empresa ou Particular" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <div class="col-lg-6">
                                            <label class="input-label">Curso</label>
                                            <select name="curso[]" required class="c-select form-control form-control-alternative">
                                                <option>Selecione um curso</option>
                                                <?php
                                                $data = $con->query('SELECT * FROM cursos');
                                                while ($r = $data->fetch_assoc()) {
                                                    echo '<option value="' . $r['id'] . '">' . $r['nome'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="input-label">Agenda</label>
                                            <select required name="agenda[]" class="a-select form-control form-control-alternative" placeholder="Selecione uma agenda">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Valor Total</label>
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control input-sm" name="total" placeholder="R$ --,--" type="number">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="input-label">Número de Parcelas</label>
                                                <div class="input-group input-group-alternative">
                                                    <input class="form-control input-sm" name="parcels" placeholder="0" type="number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="input-label">Valor da Parcela</label>
                                                <div class="input-group input-group-alternative">
                                                    <input class="form-control input-sm" name="parcel_value" placeholder="R$ --,--" type="number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Validade</label>
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control input-sm" name="validade" placeholder="0...1...2...3..." type="number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Forma de Pagamento</label>
                                        <div class="input-group input-group-alternative">
                                            <select class="form-control input-group-select" name="payment_method" required>
                                                <option>Boleto antecipado de uma única vez.</option>
                                                <option>Cartão de Débito (Através de Link do Pagseguro da UOL).</option>
                                                <option>Cartâo de Crédito de uma Única Vez (Através de Link do Pagseguro da UOL).</option>
                                                <option>Cartão de Crédito Parcelado (Através de Link do Pagseguro da UOL).</option>
                                                <option>Empenho - para Órgãos Públicos.</option>
                                                <option>Outros (Autorizado por exceção).</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="input-label">Observação</label>
                                        <textarea class="form-control input-sm" name="observ" value="" type="text"></textarea>
                                        <div class="input-group input-group-alternative">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modal-sub-add" tabindex="-1" role="dialog" aria-labelledby="modal-curso" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Adicionar Orçamento</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="db-add-enrollment.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Alunos Input -->
                                <div class="container">
                                    <div class="form-group">
                                        <label class="text-uppercase font-weight-bold">Marque caso seja uma turma fechada. *</label>
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" name="turma_fechada" id="customCheckRegister" type="checkbox">
                                            <label class="custom-control-label" for="customCheckRegister"><span>Turma fechada (Turma exclusiva apenas para os alunos abaixo)?</span></label>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <label class="text-uppercase font-weight-bold">Cadastro de Alunos *</label>
                                        <div class="card-body" id="aluno-body">

                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-lg-12">
                                                        <!-- Name Input -->
                                                        <div class="form-group">
                                                            <label class="text-uppercase font-weight-bold">Nome Completo do Profissional que Realizará o Curso *</label>
                                                            <div class="input-group input-group-alternative mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">@</span>
                                                                </div>
                                                                <input class="form-control" placeholder="Nome Completo" name="name-student[]" id="name" type="text" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="add-aluno btn btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Aluno</button>
                                                <button type="button" class="remove-aluno btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i> Remover Aluno</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="input-label">Empresa</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control input-sm" name="empresa" placeholder="Nome da Empresa ou Particular" type="text">
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-lg-6">
                                        <label class="input-label">Pagador</label>
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control input-sm" name="pagador" placeholder="Pagador" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="input-label">CPF/CNPJ do Pagador</label>
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control input-sm" name="doc_pagador1" placeholder="CPF/CNPJ" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="input-label">RG/Inscrição Estadual</label>
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control input-sm" name="doc_pagador2" placeholder="CPF/CNPJ" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="input-label">Telefone</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control input-sm" name="phone" placeholder="(00) 00000-0000" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="input-label">Email</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control input-sm" name="email" placeholder="emailparacontato@email.com" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="input-label">Cursos</label>
                                    <div class="input-group input-group-alternative">
                                        <textarea class="form-control input-sm" name="cursos" placeholder="Cursos" type="text"></textarea>
                                    </div>
                                    <small>Separe os cursos com uma vírgula ','</small>
                                </div>
                                <div class="form-group">
                                    <label class="input-label">Agendas</label>
                                    <div class="input-group input-group-alternative">
                                        <textarea class="form-control input-sm" name="agendas" placeholder="Agendas" type="text"></textarea>
                                    </div>
                                    <small>Separe os cursos com uma vírgula ','</small>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-lg-6">
                                        <label class="input-label">Cidade</label>
                                        <div class="input-group input-group-alternative">
                                            <textarea class="form-control input-sm" name="cidade" placeholder="Cidade" type="text"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="input-label">Estado</label>
                                        <div class="input-group input-group-alternative">
                                            <textarea class="form-control input-sm" name="estado" placeholder="Estado" type="text"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="input-label">Valor Total</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control input-sm" name="total" placeholder="R$ --,--" type="number">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label">Número de Parcelas</label>
                                            <div class="input-group input-group-alternative">
                                                <input class="form-control input-sm" name="parcels" placeholder="0" type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label">Valor da Parcela</label>
                                            <div class="input-group input-group-alternative">
                                                <input class="form-control input-sm" name="parcel_value" placeholder="R$ --,--" type="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="input-label">Forma de Pagamento</label>
                                    <div class="input-group input-group-alternative">
                                        <select class="form-control input-group-select" name="payment_method" required>
                                            <option>Boleto antecipado de uma única vez.</option>
                                            <option>Cartão de Débito (Através de Link do Pagseguro da UOL).</option>
                                            <option>Cartâo de Crédito de uma Única Vez (Através de Link do Pagseguro da UOL).</option>
                                            <option>Cartão de Crédito Parcelado (Através de Link do Pagseguro da UOL).</option>
                                            <option>Empenho - para Órgãos Públicos.</option>
                                            <option>Outros (Autorizado por exceção).</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="input-label">Observação</label>
                                    <textarea class="form-control input-sm" name="observ" value="" type="text"></textarea>
                                    <div class="input-group input-group-alternative">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="btn btn-file btn-primary">
                                                <i class="fas fa-cloud-upload-alt" style="margin-right: 0;" aria-hidden="true">
                                                </i>
                                                <input type="file" class="custom-control-input pdf" name="c_pdf_add" required>
                                            </span>
                                        </div>
                                        <label class="custom-control-label pdflabel" style="padding: 10px;">Orçamento em PDF
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Modal Uníco Para Cada Inscrição-->
    <?php
    $resultSub = $con->query("SELECT * FROM subscriptions ORDER BY id ASC");
    while ($row = mysqli_fetch_array($resultSub)) {
        $sv = preg_replace('/[^0-9]+/', '', $row['total']);
        $preco = number_format(preg_replace("/^([0-9]+)*?([0-9]{2})$/", "$1.$2", $sv), 2, ",", ".");
        if ($row['isExternal'] == '0' && empty($row['isExternal'])) {
            echo '<div class="modal fade" id="modal-sub-' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="modal-curso" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h6 class="modal-title" id="modal-title-default">Inscrição #<strong>' . $row['id'] . '</strong></h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                </div>
              <div class="modal-body">
                <form method="POST" action="proposta/index.php" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-lg-6">
                    <table class="table table-hover table-responsive">
                      <tr>
                        <td>
                          <b>Curso</b>
                        </td>
                        <td>
                          ' . $row['curso'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Agenda</b>
                        </td>
                        <td>
                          ' . str_replace(',', '<br>', $row['agenda']) . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Alunos</b>
                        </td>
                        <td>
                          ' . $row['nome_aluno'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>CPF Alunos</b>
                        </td>
                        <td>
                          ' . $row['cpf_aluno'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Telefone</b>
                        </td>
                        <td>
                          ' . $row['tel_aluno'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Empresa</b>
                        </td>
                        <td>
                          ' . $row['emp_aluno'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Pagador</b>
                        </td>
                        <td>
                          ' . $row['pagador'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>CPF/CNPJ Pagador</b>
                        </td>
                        <td>
                          ' . $row['doc_pagador1'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>RG/Inscrição Pagador</b>
                        </td>
                        <td>
                          ' . $row['doc_pagador2'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Forma de Pagamento</b>
                        </td>
                        <td>
                          ' . $row['pagamento'] . '
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Cupom</b>
                        </td>
                        <td>
                          ' . $row['cupom'] . '
                        </td>
                      </tr>
                    </table>
                    </div>
                    <div class="col-lg-6">
                        <input class="d-none" name="sub_id" value="' . $row['id'] . '"/>
                        <div class="form-group">
                            <label class="input-label">Valor Total</label>
                            <div class="input-group input-group-alternative">
                              <input disabled class="form-control input-sm" name="total"
                              placeholder="R$ --,--" type="text" value="R$ ' .

                $preco . '">
                        </div>
                        <div class="form-group form-row">
                          <div class="col-lg-12">
                            <label class="input-label">Número de Parcelas *</label>
                            <div class="input-group input-group-alternative">
                              <input class="form-control input-sm" name="parcels"
                              required
                              placeholder="Número de Parcelas" type="number">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="input-label">Capital (UF) *</label>
                            <div class="input-group input-group-alternative">
                              <input class="form-control input-sm" name="uf"
                              required
                              placeholder="Capital (UF)" type="text">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="input-label">Data da Proposta</label>
                            <div class="input-group input-group-alternative">
                              <input class="form-control input-sm" name="date"
                               type="date">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label class="input-label">Valor da Parcela *</label>
                            <div class="input-group input-group-alternative">
                              <input class="money form-control input-sm" name="parcel_value"
                              placeholder="R$ --,--" id="money" type="text" required>
                            </div>
                            <small>* Caso não seja parcelado, coloque o valor total.</small>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="input-label">Observação</label>
                            <div class="input-group input-group-alternative">
                              <textarea class="form-control input-sm" name="observ" value="" type="text"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="input-label">Validade</label>
                          <div class="input-group input-group-alternative">
                            <input class="form-control input-sm" name="validade" value="" type="text"/>
                            <small>Padrão 05 dias.</small>
                          </div>
                        </div>
                        <div class="form-group">
                        <label class="text-uppercase font-weight-bold">Marque caso seja uma turma fechada. *</label>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" name="fechado" id="customCheckRegister1' . $row['id'] . '" type="checkbox">
                            <label class="custom-control-label" for="customCheckRegister1' . $row['id'] . '"><span>Turma fechada (Turma exclusiva apenas para os alunos abaixo)?</span></label>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="text-uppercase font-weight-bold">Marque caso o treinamento seja realizado na localidade do cliente *</label>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input  class="custom-control-input" name="sedeContrat" id="customCheckRegister2' . $row['id'] . '" type="checkbox">
                        <label class="custom-control-label" for="customCheckRegister2' . $row['id'] . '">Treinamento na empresa do cliente.</label>
                    </div>
                </div>
                      </div>
                  </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar</button>
                </div> 
              </div>
            </form>
          </div>
          </div>
          </div>
        </div>';
        } else {
            echo '<div class="modal fade" id="modal-sub-' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="modal-curso" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Inscrição #<strong>' . $row['id'] . '</strong></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
          </div>
        <div class="modal-body">
          <form method="POST" action="proposta/index.php" enctype="multipart/form-data">
            <div class="row">
            <div class="col-lg-6">
              <table class="table table-hover table-responsive">
                <tr>
                  <td>
                    <b>Curso</b>
                  </td>
                  <td>
                    ' . $row['curso'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Agenda</b>
                  </td>
                  <td>
                    ' . str_replace(',', '<br>', $row['agenda']) . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Alunos</b>
                  </td>
                  <td>
                    ' . $row['nome_aluno'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>CPF Alunos</b>
                  </td>
                  <td>
                    ' . $row['cpf_aluno'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Telefone</b>
                  </td>
                  <td>
                    ' . $row['tel_aluno'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Empresa</b>
                  </td>
                  <td>
                    ' . $row['emp_aluno'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Pagador</b>
                  </td>
                  <td>
                    ' . $row['pagador'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>CPF/CNPJ Pagador</b>
                  </td>
                  <td>
                    ' . $row['doc_pagador1'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>RG/Inscrição Pagador</b>
                  </td>
                  <td>
                    ' . $row['doc_pagador2'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Forma de Pagamento</b>
                  </td>
                  <td>
                    ' . $row['pagamento'] . '
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Cupom</b>
                  </td>
                  <td>
                    ' . $row['cupom'] . '
                  </td>
                </tr>
              </table>
              </div>
              <div class="col-lg-6">
                  <input class="d-none" name="sub_id" value="' . $row['id'] . '"/>
                  <div class="form-group">
                      <label class="input-label">Valor Total</label>
                      <div class="input-group input-group-alternative">
                        <input disabled class="form-control input-sm" name="total"
                        placeholder="R$ --,--" type="text" value="R$ ' .

                $preco . '">
                  </div>
                  <div class="form-group form-row">
                    <div class="col-lg-12">
                      <label class="input-label">Número de Parcelas *</label>
                      <div class="input-group input-group-alternative">
                        <input class="form-control input-sm" name="parcels"
                        required
                        placeholder="Número de Parcelas" type="number">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <label class="input-label">Valor da Parcela *</label>
                      <div class="input-group input-group-alternative">
                        <input class="money form-control input-sm" name="parcel_value"
                        placeholder="R$ --,--" id="money" type="text" required>
                      </div>
                      <small>* Caso não seja parcelado, coloque o valor total.</small>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="input-label">Observação</label>
                      <div class="input-group input-group-alternative">
                        <textarea class="form-control input-sm" name="observ" value="" type="text"></textarea>
                      </div>
                  </div>  
                </div>
            </div>
        </div>
      </form>
    </div>
    </div>
    </div>
  </div>';
        }
    }
    ?>
    <!-- Modal Uníco Para Cada Curso-->
    <?php
    $now = strtotime(date('d-m-Y'));
    $result2 = $con->query("SELECT * FROM cursos ORDER BY id ASC");
    while ($row2 = mysqli_fetch_array($result2)) {
        $l = 0;
        $nome = $row2['nome'];
        $numagnd = $row2['agendas'];
        $id_curso = $row2['id'];
        $enabled = '';
        if ($row2['enabled'] == 1) $enabled = 'checked';
        echo '<div class="modal fade" id="modal-curso-' . $row2['id'] . '" tabindex="-1" role="dialog" aria-labelledby="modal-curso" aria-hidden="true">
<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
<div class="modal-content">
<div class="modal-header">
<h6 class="modal-title" id="modal-title-default">Editar Curso <strong>' . $nome . '</strong></h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form method="POST" action="db-edit-curso.php" enctype="multipart/form-data">
<div class="row">

<div class="col-lg 6">
<div class="form-group mb-3">
<label class="custom-toggle">
  <input type="checkbox" name="enabled" ' . $enabled . ' id="checkEnabled' . $row2['id'] . '" >
  <span class="custom-toggle-slider rounded-circle"></span>
</label>
</div>
<div class="form-group mb-3">
<label class="input-label">Nome do Curso</label>
<div class="input-group input-group-alternative">
<input class="form-control input-sm" name="c_name_add" value="' . $row2['nome'] . '" placeholder="Nome do Curso" type="text">
</div>
</div>
<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<input class="form-control input-sm" name="c_id" value="' . $row2['id'] . '" placeholder="id" type="number" style="display: none;">
</div>
</div>
<div class="form-group mb-3">
<label class="input-label">Posição</label>
<div class="input-group input-group-alternative">
<input class="form-control input-sm" name="c_pos_add" value="' . $row2['ord'] . '" placeholder="Posição (1..2.." type="number">
</div>
</div>
<div class="form-group mb-3">
  <label class="input-label">Carga Horária</label>
  <div class="input-group input-group-alternative">
    <input class="form-control input-sm" name="carga_horaria" placeholder="20hrs" value="' . $row2['carga_horaria'] . '" type="text" required>
  </div>
</div>
<div class="form-group form-row mb-3">
<div class="col-lg-6">
  <label class="input-label">Modalidade</label>
  <div class="input-group input-group-alternative">
        <input class="form-control input-sm" name="c_cat_add" value="' . $row2['category'] . '" placeholder="EAD...Presencial..." type="text">
  </div>
</div>
<div class="col-lg-6">
  <label class="input-label">Certificação</label>
  <div class="input-group input-group-alternative">
      <div class="input-group input-group-alternative">
            <input class="form-control input-sm" name="c_cert_add" value="' . $row2['certf'] . '" placeholder="DSBC...Furukawa." type="text">
      </div>
    </div>
</div>
</div>
<div class="form-group mb-3">
<label class="input-label">Observação</label>
<div class="input-group input-group-alternative">
  <textarea style="height: 100px;"class="form-control input-sm" name="c_ob_add" placeholder="Observação. Exemplo: Aulas teóricas para todas as turmas de Segunda a Sexta das 8:00 às 12:00" type="text">' . $row2['observ'] . '</textarea>
</div>
</div>
<div class="form-group mb-3">
<label class="input-label">Descrição</label>
<div class="input-group input-group-alternative">
<textarea style="height: 300px;"class="form-control input-sm" name="c_desc_add"  placeholder="Descrição do Curso" type="text">' . $row2['descr'] . '</textarea>
</div>
</div>
</div>
<div class="col-lg 6">
<div class="form-group">
<label class="input-label">Carga Horária</label>
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text">R$</span>
</div>
<input class="form-control input-sm" name="c_price_add" placeholder="X,XX" value="' . $row2['preco'] . '" type="text">
</div>
</div>
<div class="form-group mt-3" id="divdesconto">
<label class="input-label">Valor Promocional (R$)</label>
<div class="input-group input-group-alternative " >
<div class="input-group-prepend">
<span class="input-group-text">R$</span>
</div>
<input class="form-control input-sm descot" name="c_price_descont" placeholder="Valor Promocional (R$)" type="text" value="' . $row2['promo'] . '">
</div>
</div>
<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="btn btn-file btn-primary">
<i class="fas fa-cloud-upload-alt" style="margin-right: 0;"></i>
<input type="file" class="custom-control-input img" name="c_file_add" id="c_edit_img">
</span>
</div>
<label class="custom-control-label imglabel" style="padding: 10px;">' . $row2['img'] . '</label>
</div>

<div class="form-group mt-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="btn btn-file btn-primary">
<i class="fas fa-cloud-upload-alt" style="margin-right: 0;"></i>
<input type="file" class="custom-control-input img" name="c_pdf_add" id="c_edit_img">
</span>
</div>
<label class="custom-control-label imglabel" style="padding: 10px;">' . substr(str_replace('assets/pdf/', '', $row2['pdf']), 0, 25) . '</label>
</div>
</div>
<hr>';
        $chkd = '';
        if ($row2['agendas'] == 0) $chkd = 'checked';
        echo '
<div class="custom-control custom-control-alternative custom-checkbox mb-3">
<input class="custom-control-input" ' . $chkd . ' name="ready" id="check' . $row2['id'] . '" type="checkbox">
<label class="custom-control-label" for="check' . $row2['id'] . '">
  <span>Adicionar Em Breve</span>
</label>
</div>
';

        echo '
<div class="input-group-prepend mt-3">
<div class="form-group date_edit mb-3">
<div class="text-center">
<h6>Agenda</h6>
</div>
';
        $query_agnd = $con->query("SELECT * FROM agenda WHERE id='$id_curso'");
        $k = 0;
        if (mysqli_num_rows($query_agnd) <= 0) {
            echo '<span class="btn btn-file btn-add-edit">
  <a href="javascript:void(0);" class="">
  <i class="fas fa-plus"></i>
  </span>
  </a>
  <span class="btn btn-file">
  <input type="text" data-provide="datepicker"  data-date-format="dd/mm/yyyy" placeholder="Data de Início" class="flatpickr-input form-control input-sm" name="agnd_ini[]" value=""/>
  <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Término" class="flatpickr-input form-control input-sm mt-3" name="agnd_fim[]" value=""/>
  <textarea type="text" placeholder="Horários" class="form-control input-sm mt-3" name="agnd_cron[]"></textarea>
  <input type="text" placeholder="Cidade" class="form-control input-sm mt-3" name="agnd_cidade[]" value=""/>
  <input type="text" placeholder="Tamanho da Turma" class="form-control input-sm mt-3" name="agnd_turma[]" value=""/>
  <input type="text" placeholder="Valor Promocional (R$)" class="form-control input-sm mt-3 descot" name="agnd_promo[]" value=""/>
  </span>';
        }
        while ($array_agnd = mysqli_fetch_array($query_agnd)) {
            if ($k == 0) {
                echo '<span class="btn btn-file btn-add-edit">
    <a href="javascript:void(0);" class="">
    <i class="fas fa-plus"></i>
    </span>
    </a>
    <span class="btn btn-file">
    <input type="text" data-provide="datepicker"  data-date-format="dd/mm/yyyy" placeholder="Data de Início" class="flatpickr-input form-control input-sm" name="agnd_ini[]" value="' . $array_agnd["ini"] . '"/>
    <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Término" class="flatpickr-input form-control input-sm mt-3" name="agnd_fim[]" value="' . $array_agnd["fim"] . '"/>
    <textarea type="text" placeholder="Horários" class="form-control input-sm mt-3" name="agnd_cron[]">' . $array_agnd["horarios"] . '</textarea>
    <input type="text" placeholder="Cidade" class="form-control input-sm mt-3" name="agnd_cidade[]" value="' . $array_agnd["cid"] . '"/>
    <input type="text" placeholder="Tamanho da Turma" class="form-control input-sm mt-3" name="agnd_turma[]" value="' . $array_agnd["maxi"] . '"/>
    <input type="text" placeholder="Valor Promocional (R$)" class="form-control input-sm mt-3 descot" name="agnd_promo[]" value="' . $array_agnd["promo"] . '"/>';
                if (strtotime(str_replace('/', '.', $array_agnd['ini'])) < $now) echo '<div class="badge badge-warning mt-2">Prazo inválido</div>';
                echo '</span>';
                $k++;
            } else {
                echo '<div class="input-group-prepend"><div class="form-group mb-3"><span class="btn btn-file btn-remover"><a href="javascript:void(0);" class="btn-remover"><i class="fas fa-minus"></i></span></a>
    <span class="btn btn-file">
    <input class="flatpickr-input form-control input-sm"type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Início" name="agnd_ini[]" value="' . $array_agnd["ini"] . '">
    <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Término" class="flatpickr-input form-control input-sm mt-3" name="agnd_fim[]" value="' . $array_agnd["fim"] . '"/>
    <textarea class="form-control input-sm mt-3" value="' . $array_agnd["horarios"] . '" name="agnd_cron[]">' . $array_agnd["horarios"] . '</textarea>
    <input type="text" placeholder="Cidade" class="form-control input-sm mt-3" name="agnd_cidade[]" value="' . $array_agnd["cid"] . '"/>
    <input type="text" placeholder="Tamanho da turma" class="form-control input-sm mt-3" name="agnd_turma[]" value="' . $array_agnd["maxi"] . '"/>
    <input type="text" placeholder="Valor Promocional (R$)" class="form-control input-sm mt-3 descot" name="agnd_promo[]" value="' . $array_agnd["promo"] . '"/>
    ';
                if (strtotime(str_replace('/', '.', $array_agnd['ini'])) < $now) echo '<div class="badge badge-warning mt-2">Prazo inválido</div>';

                echo '
    </span></div></div>';
                $k++;
            }
        }
        echo '
</div>
</div>           
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Salvar</button>
<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar</button>
</div> 
</div>
</form>
</div>
</div>';
    }
    ?>

    <?php
    $result3 = $con->query("SELECT * FROM cursos");
    while ($row3 = mysqli_fetch_array($result3)) {
        echo '<div class="modal fade" id="modal-turma-' . $row3['id'] . '" tabindex="-1" role="dialog" aria-labelledby="modal-curso" aria-hidden="true">
<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
<div class="modal-content">
<div class="modal-header">
<h6 class="modal-title" id="modal-title-default">Editar Turmas do Curso <strong>' . $row3['nome'] . '</strong></h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-12">';





        $id =  $row3['id'];
        $agg = $con->query("SELECT * FROM agenda WHERE id='$id'");
        while ($agenda = mysqli_fetch_array($agg)) {
            $cid = $agenda['cid'];
            $idagenda = $agenda['idc'];
            $idd = $agenda["idc"];

            echo '<div class="text-center"><h6><strong>Agenda ' . $agenda['cid'] . '</strong></h6></div>';
            echo '<table id="' . $row3['id'] . '-' . $agenda['cid'] . '" class="table table-colors">';
            echo '
        <thead>
          <tr>
            <th>Nome
            </th>
            <th>Email
            </th>
            <th>Ações
            </th>
          </tr>
        </thead>
        <tbody>';
            $alunos = @unserialize($agenda[8]);
            if (empty($alunos)) {
                $alunos = array();
            }

            foreach ($alunos as $k1) {
                $queryalunos1 = mysqli_query($con, "SELECT * FROM users WHERE id='$k1'");
                while ($queryalunos = mysqli_fetch_array($queryalunos1)) {
                    echo "<tr>";
                    echo "<td>" . $queryalunos['nome'] . "</td>";
                    echo "<td>" . $queryalunos['email'] . "</td>";
                    echo "<td><form method='POST' ><button class='btn btn-sm btn btn-secondary'  id='" . $idd . "'  name='" . $queryalunos['id'] . "'>Expulsar</button></td>";
                    echo "</tr>";
                }
            }

            echo '
                                </tbody>
                                </thead>
                              </table>
<form method="POST" action="db-edit-turmas.php" enctype="multipart/form-data">
<input class="form-control input-sm" id="email" type="email" name="email" placeholder="aluno@email.com.br" required>
<input class="form-control input-sm" id="email" type="text" name="agenda" placeholder="aluno@email.com.br" readonly style="display:none;" value="' . $idd . '">
<input class="form-control input-sm" id="email" type="text" name="curso" placeholder="aluno@email.com.br" readonly style="display:none; value="' . $row3['id'] . '">
<button type="submit" class="btn btn-primary mt-2">Adicionar Aluno</button> <small>O aluno deve ter uma conta ativa no site.</small>
</form><br>';
        }
        echo '
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn btn-primary">Confirmar</button>
<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar</button>
</div> 
</div>

</div>
</div>';
    }
    ?>

    <?php
    $result2 = $con->query("SELECT * FROM noticias ORDER BY id ASC");
    while ($row2 = mysqli_fetch_array($result2)) {
        $l = 0;
        $nome = $row2['nome'];
        echo '
<div class="col-md-4">
  <div class="modal fade" id="modal-blog-' . $row2['id'] . '" tabindex="-1" role="dialog" aria-labelledby="modal-blog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Editando Blog <strong>' . $row2['nome'] . '</strong>
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×
            </span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="db-edit-blog.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg 6">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <input class="form-control input-sm" name="c_name_add" placeholder="Titulo" type="text" value="' . $row2['nome'] . '">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <textarea style="height: 300px;"class="form-control input-sm" name="c_desc_add" placeholder="Conteúdo" type="text" >' . $row2['texto'] . '</textarea>
                  </div>
                </div>
              </div>
              <div class="col-lg 6">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="btn btn-file btn-primary">
                        <i class="fas fa-cloud-upload-alt" style="margin-right: 0;">
                        </i>
                        <input type="file" class="custom-control-input img" name="c_file_add">
                      </span>
                    </div>
                    <label class="custom-control-label imglabel" style="padding: 10px;">' . $row2['img'] . '</label>
                  </div>
                  <small>* Tamanho recomendado: 1200x1000px</small>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <textarea style="height: 100px;"class="form-control input-sm" name="c_res_add" placeholder="Resumo do Conteúdo. (Máximo de 116 Caracteres)" maxlength="116" type="text">' . $row2['res'] . '</textarea>
                  </div>
                </div>
              </div>  
              <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="btn btn-file btn-primary">
                    <i class="fas fa-cloud-upload-alt" style="margin-right: 0;">
                    </i>
                    <input type="file" class="custom-control-input img" name="c_file_add">
                  </span>
                </div>
                <label class="custom-control-label imglabel" style="padding: 10px;">' . $row2['img'] . '</label>
              </div>
              <small>* Tamanho recomendado: 1200x1000px</small>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <textarea style="height: 100px;"class="form-control input-sm" name="c_res_add" placeholder="Resumo do Conteúdo. (Máximo de 116 Caracteres)" maxlength="116" type="text">' . $row2['res'] . '</textarea>
              </div>
            </div>
          </div>  
              <div class="form-group mb-3">
            <div class="input-group input-group-alternative">
            <input class="form-control input-sm" name="c_id" value="' . $row2['id'] . '" placeholder="id" type="number" style="display: none;">
            </div>
            </div>     
            </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar
            </button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancelar
            </button>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
';
    }
    ?>
    <script type="text/javascript">
        $('.img').on("change", function() {
            console.log("change fire");
            let i = $('.imglabel').next('label').clone();
            let file = $('.img')[0].files[0].name;
            console.log(file);
            $('.imglabel').text(file);
        });
    </script>
    <script type="text/javascript">
        $('.pdf').on("change", function() {
            console.log("change fire");
            let i = $('.pdflabel').next('label').clone();
            let file = $('.pdf')[0].files[0].name;
            console.log(file);
            $('.pdflabel').text(file);
        });
    </script>
    <script type="text/javascript">
        $('#customCheckLogin2').change(function() {
            $('#divdesconto').toggle();
        });
    </script>
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center justify-content-md-between">
                <div class="col-md-6">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="" target="_blank">Quacks Interatividade Digital
                        </a>.
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-footer justify-content-end">
                        <li class="nav-item">
                            <a href="" class="nav-link" target="_blank">Início
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" target="_blank">Sobre
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" target="_blank">Contato
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery.tabledit.js" type="text/javascript">
</script>
<script src="assets/js/core/popper.min.js" type="text/javascript">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" type="text/javascript">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/javascript">
</script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js">
</script>
<script src="assets/js/plugins/bootstrap-switch.js">
</script>
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript">
</script>
<script src="assets/js/plugins/moment.min.js">
</script>
<script src="assets/js/plugins/datetimepicker.js" type="text/javascript">
</script>
<script src="assets/js/plugins/bootstrap-datepicker.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
<script src="assets/js/main.js" type="text/javascript">
</script>
<script>
    $('.preco').mask('000.000.000.000.000,00', {
        reverse: true
    });
    $('.descot').mask('000.000.000.000.000,00', {
        reverse: true
    });
    $('.data').mask('11/11/1111');
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10;
        var addButton = $('.btn-add-edit');
        var wrapper = $('.date_edit');
        let fieldHTML = '<div class="input-group-prepend"><div class="form-group mb-3"><span class="btn btn-file btn-remover"><a href="javascript:void(0);" class="btn-remover"><i class="fas fa-minus"></i></span></a><span class="btn btn-file"><input class="flatpickr flatpickr-input form-control input-sm"type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Início" name="agnd_ini[]"><input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Término" class="flatpickr flatpickr-input form-control input-sm mt-3" name="agnd_fim[]"/><textarea type="text" data-date-format="dd/mm/yyyy" placeholder="Horários" class="flatpickr flatpickr-input form-control input-sm mt-3" name="agnd_cron[]" required></textarea><input type="text" placeholder="Cidade" class="form-control input-sm mt-3" name="agnd_cidade[]" value=""/> <input type="text" placeholder="Tamanho da turma" class="form-control input-sm mt-3" name="agnd_turma[]"/> <input type="text" placeholder="Promoção" class="form-control input-sm mt-3 descot" name="agnd_promo[]"/></span></div></div>';
        var x = 1;
        $(addButton).click(function() {
            if (x < maxField) {
                x++;
                $(wrapper).append(fieldHTML);
            }
        });
        $(wrapper).on('click', '.btn-remover', function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
    $(document).ready(function() {
        $("#money").inputmask('decimal', {
            'alias': 'numeric',
            'groupSeparator': ',',
            'autoGroup': true,
            'digits': 2,
            'radixPoint': ".",
            'digitsOptional': false,
            'allowMinus': false,
            'prefix': 'R$ ',
            'placeholder': ''
        });
        var maxField = 10;
        var addButton = $('.btn-add');
        var wrapper = $('.date');
        let fieldHTML = '<div class="input-group-prepend"><div class="form-group mb-3"><span class="btn btn-file btn-remover"><a href="javascript:void(0);" class="btn-remover"><i class="fas fa-minus"></i></span></a><span class="btn btn-file"><input class="flatpickr flatpickr-input form-control input-sm"type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Início" name="agnd_ini[]"><input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Data de Término" class="flatpickr flatpickr-input form-control input-sm mt-3" name="agnd_fim[]"/><textarea type="text" placeholder="Horários" class="form-control input-sm mt-3" name="agnd_cron[]" required></textarea><input type="text" placeholder="Cidade" class="form-control input-sm mt-3" name="agnd_cidade[]" value=""/> <input type="text" placeholder="Tamanho da turma" class="form-control input-sm mt-3" name="agnd_turma[]"/> <input type="text" placeholder="Promoção" class="form-control input-sm mt-3 descot" name="agnd_promo[]"/></span></div></div>';
        var x = 1;
        $(addButton).click(function() {
            if (x < maxField) {
                x++;
                $(wrapper).append(fieldHTML);
            }
        });
        $(wrapper).on('click', '.btn-remover', function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
</script>
<script type="text/javascript">
    $('.money').mask('000.000.000.000.000,00', {
        reverse: true
    });
    $('#tabela_curso').Tabledit({
        restoreButton: false,
        deleteButton: true,
        editButton: false,
        columns: {
            identifier: [0, 'id'],
            editable: [
                [9, 'nome']
            ]
        },
        buttons: {
            delete: {
                class: 'btn btn-sm btn-primary',
                html: 'Excluir',
                action: 'delete'
            },
            confirm: {
                class: 'btn btn-sm btn-success',
                html: 'Confirmar'
            }
        },
        hideIdentifier: true,
        url: 'db-del-curso.php'
    });
    $('#tabela_blog').Tabledit({
        restoreButton: false,
        deleteButton: true,
        editButton: false,
        columns: {
            identifier: [0, 'id'],
            editable: [
                [9, 'nome']
            ]
        },
        buttons: {
            delete: {
                class: 'btn btn-sm btn-primary',
                html: 'Excluir',
                action: 'delete'
            },
            confirm: {
                class: 'btn btn-sm btn-success',
                html: 'Confirmar'
            }
        },
        hideIdentifier: true,
        url: 'db-del-blog.php'
    });
    $('#tabela_newsl').Tabledit({
        restoreButton: false,
        deleteButton: true,
        editButton: false,
        columns: {
            identifier: [0, 'id'],
            editable: [
                [9, 'nome']
            ]
        },
        buttons: {
            delete: {
                class: 'btn btn-sm btn-primary',
                html: 'Excluir',
                action: 'delete'
            },
            confirm: {
                class: 'btn btn-sm btn-success',
                html: 'Confirmar'
            }
        },
        hideIdentifier: true,
        url: 'db-del-news.php'
    });
</script>
<script>
    $("#cfg_form").submit(function(event) {
        event.preventDefault();
        var form_data = $('#cfg_form').serialize();
        console.log(form_data);
        $.ajax({
            url: '/db_config.php',
            type: 'POST',
            data: form_data,
            success: () => {
                alert('Informações Alteradas com Sucesso');
            },
            error: () => {
                alert('Erro Interno');
            }
        });
    });
</script>

</html>