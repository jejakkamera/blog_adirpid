<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/themplate/assets/images/logo-upr.png">
    <title>Kepegawaian UBP Karawang</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/themplate/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/themplate/assets/libs/jquery/dist/jquery.min.js"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="<?php echo base_url(); ?>" class="logo">
                            <!-- Logo icon -->
                            
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <strong>UBP Karawang</strong>
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                       
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url(); ?>assets/themplate/assets/images/logo-upr.png" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block"><?php echo $this->session->userdata('name') ?> <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="<?php echo base_url(); ?>assets/themplate/assets/images/logo-upr.png" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $this->session->userdata('name') ?></h4>
                                        <p class=" m-b-0"><?php echo $this->session->userdata('id') ?></p>
                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                   
                                    <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                                
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('Dashboard'); ?>" aria-expanded="false"><i class="ti-layout"></i><span class="hide-menu">Dashboard</span></a></li>

        <?php 
                           
        $header = json_decode($this->session->userdata('header'));
        if($header){
        $total=count($header);
        $menu='';
        $menu_next='';
        $loop=0;
       foreach($header as $row){
        $loop++;
           if($menu == $row->code_menu){
                
               ?>
                    
                        <li class="sidebar-item"><a href="<?php echo base_url($row->link); ?>" class="sidebar-link"><i class="<?php echo $row->icon_submenu ?>"></i><span class="hide-menu"> <?php echo $row->sub_menu ?></span></a></li>
                

               <?php
           }else{
                    

              ?>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="<?php echo $row->menu_icon ?>"></i><span class="hide-menu"><?php echo $row->name_menu ?></span></a>

                    <ul aria-expanded="false" class="collapse first-level">

                        <li class="sidebar-item"><a href="<?php echo base_url($row->link); ?>" class="sidebar-link"><i class="<?php echo $row->icon_submenu ?>"></i><span class="hide-menu"> <?php echo $row->sub_menu ?></span></a></li>

                   
              <?php
           }
           $menu=$row->code_menu;
           
           if($loop==$total){
            echo "</ul></li>";
                
           }else{
               
            $menu_next=$header[$loop]->code_menu;

            if($menu_next==$menu){
            }else{
                echo "</ul></li>";
            }
            
           }
           
           
       }
    }
                        
        ?>
            
                        

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('login/logout'); ?>" aria-expanded="false"><i class="ti-power-off"></i><span class="hide-menu">Logout</span></a></li>
<?php 
//print_r($this->session->userdata('tugas'));
if($this->session->userdata('tugas')!='null'){ ?>

            <hr>
            <b>Menu Petugas</b>
            <?php 
                           
                           $tugas = json_decode($this->session->userdata('tugas'));
                           if($tugas){
                           $total=count($tugas);
                           $menu='';
                           $menu_next='';
                           $loop=0;
                          foreach($tugas as $row){
                           $loop++;
                              if($menu == $row->code_menu){
                                   
                                  ?>
                                       
                                           <li class="sidebar-item"><a href="<?php echo base_url($row->link); ?>" class="sidebar-link"><i class="<?php echo $row->icon_submenu ?>"></i><span class="hide-menu"> <?php echo $row->sub_menu ?></span></a></li>
                                   
                   
                                  <?php
                              }else{
                                       
                   
                                 ?>
                                   <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="<?php echo $row->menu_icon ?>"></i><span class="hide-menu"><?php echo $row->menu ?></span></a>
                   
                                       <ul aria-expanded="false" class="collapse first-level">
                   
                                           <li class="sidebar-item"><a href="<?php echo base_url($row->link); ?>" class="sidebar-link"><i class="<?php echo $row->icon_submenu ?>"></i><span class="hide-menu"> <?php echo $row->sub_menu ?></span></a></li>
                   
                                      
                                 <?php
                              }
                              $menu=$row->code_menu;
                              
                              if($loop==$total){
                               echo "</ul></li>";
                                   
                              }else{
                                  
                               $menu_next=$header[$loop]->code_menu;
                   
                               if($menu_next==$menu){
                               }else{
                                   echo "</ul></li>";
                               }
                               
                              }
                              
                              
                          }}}
                                           
                           ?>           
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
           