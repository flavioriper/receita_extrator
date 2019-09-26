<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Extrator da receita federal">
    <meta name="author" content="Flávio Riper">

    <!-- Title Page-->
    <title>InExtractor</title>

    <!-- Fontfaces CSS-->
    <link href="<?=base_url('assets/')?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=base_url()?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=base_url()?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>css/smoothness/jquery-ui-1.9.2.custom.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=base_url('assets/')?>css/theme.css" rel="stylesheet" media="all">
    <!-- Local Page CSS -->
    <?php $this->load->view($style); ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="<?=base_url('assets/')?>images/logo_Inextractor.png" width="200" alt="Logo InExtractor" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            
                        </ul>
                    </div>
                    <div class="header__tool">
                    
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                
            </div>
            <nav class="navbar-mobile">
                
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
        
        </div>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4"><?=$sectionTitle?></h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->