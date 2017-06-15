<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo DEFCOM_NAME; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="Def-Com" content="">

        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/bootstrap.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/materialadmin.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/font-awesome.min.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/material-design-iconic-font.min.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/wizard/wizard.css"; ?>" />


        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/select2/select2.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/multi-select/multi-select.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/wizard/wizard.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/bootstrap-datepicker/datepicker3.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/toastr/toastr.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/DataTables/jquery.dataTables.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/DataTables/extensions/dataTables.colVis.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/DataTables/extensions/dataTables.tableTools.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/typeahead/typeahead.css"; ?>" />

        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "theme-default/libs/dropzone/dropzone-theme.css"; ?>" />

        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "def-com/general.css"; ?>" />
        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo JS . "libs/utils/html5shiv.js"; ?>"></script>
        <script type="text/javascript" src="<?php echo JS . "libs/utils/respond.min.js"; ?>"></script>
        <![endif]-->

        <?php
        if ($style != null) {
            echo " <link type='text/css' rel='stylesheet' href='" . CSS . "def-com/" . $style . ".css' />";
        }
        ?>

        <script src="<?php echo JS . "def-com/constants.js"; ?>"></script>


    </head>
    <body class="menubar-hoverable header-fixed  gray-def-com-back">
        <header id="header" >
            <div class="headerbar">
                <div class="headerbar-left">
                    <ul class="header-nav header-nav-options">
                        <li class="header-nav-brand" >
                            <div class="brand-holder">
                                <a href="../../html/dashboards/dashboard.html">
                                    <span class="text-lg text-bold text-primary"><?php echo DEFCOM_NAME; ?></span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </header>
        <div id="base">
            <div class="offcanvas">
            </div>
            <?php
            echo $body;
            echo $menu;
            ?>
        </div>




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

        <div class="modal fade" id="loading_data_general_modal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="charge_data_general_modal_dialog">
                <div class="modal-content">
                    <div class="modal-body">

                        <p class="align-center modal_message" id="charge_modal_message">Cargando datos un momento por favor.</p>
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

        <div class="modal fade" id="warning_action_modal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="charge_data_general_modal_dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fa fa-check-circle-o modal_custom_icon icon-warning "></i>
                        <p class="align-center modal_message" id="warning_modal_message"></p>

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
        <script src="<?php echo JS . "libs/jquery-ui/jquery-ui.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/bootstrap/bootstrap.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/spin.js/spin.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/wizard/jquery.bootstrap.wizard.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/autosize/jquery.autosize.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/DataTables/jquery.dataTables.js"; ?>"></script>
        <script src="<?php echo JS . "libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/nanoscroller/jquery.nanoscroller.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/wizard/jquery.bootstrap.wizard.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/bootstrap-datepicker/bootstrap-datepicker.js"; ?>"></script>
        <script src="<?php echo JS . "libs/inputmask/jquery.inputmask.bundle.min.js"; ?>"></script>
        <script src="<?php echo JS . "libs/toastr/toastr.js"; ?>"></script>
        <script src="<?php echo JS . "libs/dropzone/dropzone.min.js"; ?>"></script>
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
        <?php
        if ($script != null) {
            echo "<script src='" . JS . "def-com/" . $script . ".js'></script>";
        }
        ?>
    </body>
</html>
