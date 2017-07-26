<!DOCTYPE html>
<html>
    <head>
        <title><?php echo ucwords(APPS_TITLE); ?></title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/uikit.min.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/components/search.min.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/base.css"); ?>" />

        <script src="<?php echo base_url("assets/js/jquery-2.1.1.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/uikit.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/components/search.min.js"); ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.min.css"); ?>">
        <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
        <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="uk-container uk-container-center">
            <!-- header -->
            <div class="tara-header uk-clearfix">
                <div class="uk-grid">
                    <div class="uk-width-5-6">
                        <a class="tara-logo"><img alt="Bintang Pelajar" width="150px" src="<?php echo base_url("assets/images/logo_s-ipk_1.png"); ?>"></a>
                    </div>
                    <div class="uk-width-1-6">
                        <a class="tara-logo" style="float: right;"><img alt="Bintang Pelajar" style="height: 60px;" src="<?php echo base_url("assets/images/logo.jpg"); ?>"></a>
                    </div>
                </div>
            </div>

            <!-- menu -->
            <nav class="uk-navbar uk-margin-top">
                <ul class="uk-navbar-nav">
                    <li id="home"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li id="master"><a href="#canvas-master" data-uk-offcanvas>Master</a></li>
                    <li id="simulasi"><a href="<?php echo base_url("simulasi"); ?>">Simulasi</a></li>
                </ul>

                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav">
                        <li class="uk-parent" data-uk-dropdown="">
                            <a href=""><i class="uk-icon-user"></i> <?php echo $this->session->userdata("userRealName")." | ".$this->session->userdata("userCabang"); ?></a>
                            <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-flip">
                                <ul class="uk-nav uk-nav-navbar">
                                    <li><a href="<?php echo base_url("auth/form_change_password"); ?>"><i class="uk-icon-pencil-square-o"></i> Change Password</a></li>
                                    <li><a href="<?php echo base_url("auth/logout"); ?>"><i class="uk-icon-sign-out"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="tara-body">
                <div class="uk-panel uk-panel-header">
                    <h3 class="uk-panel-title">
                        <div class="uk-grid">
                            <div class="uk-width-1-2" style="font-family: 'Open Sans Condensed', sans-serif;">
                                <i class="uk-icon-<?php echo (isset($icon)) ? $icon : ""; ?>"></i> <?php echo ucwords((isset($title)) ? $title : ""); ?>
                            </div>
                            <div class="uk-width-1-2">
                                <?php
                                if(isset($my_title) and $my_title != "change password")
                                {
                                    ?>
                                    <a href="<?php echo base_url($my_title."/form_tambah"); ?>" class="uk-button uk-align-right">Tambah <?php echo ucwords($title); ?></a>
                                    <?php
                                }
                                if($this->uri->segment(1, 0)==="siswa" || $this->uri->segment(1, 0)==="universitas" || $this->uri->segment(1, 0)==="fakultas")
                                {
                                    ?>
                                    <a href="<?php echo base_url($my_title."/form_upload"); ?>" class="uk-button uk-align-right">Upload <?php echo ucwords($title); ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </h3>

                    <div id="contentnya"></div>
