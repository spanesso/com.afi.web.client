<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo DEFCOM_NAME; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/bootstrap.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/materialadmin.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/font-awesome.min.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/material-design-iconic-font.min.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/wizard/wizard.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/toastr/toastr.css"; ?>" />
       
        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo JS . "libs/utils/html5shiv.js"; ?>"></script>
        <script type="text/javascript" src="<?php echo JS . "libs/utils/respond.min.js"; ?>"></script>
        <![endif]-->

        <?php
        if ($style != null) {
            echo " <link type='text/css' rel='stylesheet' href='" . CSS . "def-com/" . $style . ".css' />";
        }
        ?>
         <link type="text/css" rel="stylesheet" href="<?php echo CSS . "def-com/general.css"; ?>" />
        <script src="<?php echo JS . "def-com/constants.js"; ?>"></script>
    </head>
    <body class="menubar-hoverable header-fixed ">
        <?php
        echo $body;
        ?>


        <div class="modal fade" id="charge_data_general_modal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="charge_data_general_modal_dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="<?php echo IMG . "def-com/spinner.gif" ?>" class="spinner-icon">
                        <p class="align-center modal_message" id="charge_modal_message"></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="success_action_modal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="charge_data_general_modal_dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fa fa-check-circle-o modal_custom_icon icon-success "></i>
                        <p class="align-center modal_message" id="success_modal_message"></p>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="error_action_modal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="charge_data_general_modal_dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fa fa-times-circle-o modal_custom_icon icon-error "></i>
                        <p class="align-center modal_message" id="error_modal_message"></p>

                    </div>

                </div>
            </div>
        </div>


        <script src="<?php echo JS . "libs/jquery/jquery-1.11.2.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/jquery/jquery-migrate-1.2.1.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/bootstrap/bootstrap.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/spin.js/spin.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/autosize/jquery.autosize.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/nanoscroller/jquery.nanoscroller.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/wizard/jquery.bootstrap.wizard.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/toastr/toastr.js"; ?>"></script>
        <script src="<?php echo JS . "core/source/App.js"; ?>"></script>
        <script src="<?php echo JS . "core/source/AppNavigation.js"; ?>"></script>
        <script src="<?php echo JS . "core/source/AppOffcanvas.js"; ?>"></script>
        <script src="<?php echo JS . "core/source/AppCard.js"; ?>"></script>
        <script src="<?php echo JS . "core/source/AppForm.js"; ?>"></script>
        <script src="<?php echo JS . "core/source/AppNavSearch.js"; ?>"></script>
        <script src="<?php echo JS . "core/source/AppVendor.js"; ?>"></script>
        <script src="<?php echo JS . "core/demo/Demo.js"; ?>"></script>
        <script src="<?php echo JS . "core/demo/DemoFormWizard.js"; ?>"></script>
        <script src="<?php echo JS . "def-com/base.js"; ?>"></script>
        <script src="<?php echo JS . "def-com/jquery.progressTimer.min.js"; ?>"></script>

        <?php
        if ($script != null) {
            echo "<script src='" . JS . "def-com/" . $script . ".js'></script>";
        }
        ?>
    </body>
</html>
