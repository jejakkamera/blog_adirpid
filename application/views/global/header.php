<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="title" content="adirp.id">
    <meta name="description" content="adirp.id adalah blog pribadi yang berisi catatan pribadi, dokumen pengajaran, dokumen penelitian. selain tulisan adirp.id juga berisi prodak yang kami jual">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="adirp,adi rizky pratama,blog,content">
    <meta name="author" content="adi rizky pratama">
    <title><?php echo $header; ?></title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/sasu/img/favicon.png">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_compres/style.css"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- font awesome CSS -->
    
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_min/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_min/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_min/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_min/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_min/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_min/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_min/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sasu/css_min/all.css">
    
    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets/sasu/js/jquery-1.12.1.min.js"></script> -->
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img width="40%" data-sizes="auto" class="lazyload" data-src="<?php echo base_url(); ?>assets/sasu/img/favicon.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('web/category/blog'); ?>">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('web/category/teaching'); ?>">teaching</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('web/category/research'); ?>">research</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        product
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo base_url('shop/search/ebook/category'); ?>"> E-Book</a>
                                        <a class="dropdown-item" href="<?php echo base_url('shop/search/apps/category'); ?>">Apps</a>
                                        <a class="dropdown-item" href="<?php echo base_url('shop/search/service/category'); ?>">our services</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('web/sitemap_html'); ?>">Sitemap</a>
                                </li>
                               
                            </ul>
                        </div>
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner" action='<?php echo base_url('web/search_key'); ?>'>
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->