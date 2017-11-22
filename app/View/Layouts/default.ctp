<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$nomeDoAplicativo = 'Leitura Diária';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no')); ?>
    <title>
        <?php echo $nomeDoAplicativo ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
          rel="stylesheet" type="text/css">
    <?php
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');

    //VENDOR CSS
    echo $this->Html->css('../vendor/bootstrap/css/bootstrap.min.css');
    echo $this->Html->css('../vendor/font-awesome/css/font-awesome.min.css');
    echo $this->Html->css('../vendor/animate/animate.min.css');
    echo $this->Html->css('../vendor/simple-line-icons/css/simple-line-icons.min.css');
    echo $this->Html->css('../vendor/owl.carousel/assets/owl.carousel.min.css');
    echo $this->Html->css('../vendor/owl.carousel/assets/owl.theme.default.min.css');
    echo $this->Html->css('../vendor/magnific-popup/magnific-popup.min.css');

    //THEME CSS
    echo $this->Html->css('theme.css');
    echo $this->Html->css('theme-elements.css');
    echo $this->Html->css('theme-blog.css');
    echo $this->Html->css('theme-shop.css');

    //ADMIN EXTENSION
    echo $this->Html->css('../admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css');
    echo $this->Html->css('../admin/assets/vendor/jquery-ui/jquery-ui.min.css');
    echo $this->Html->css('../admin/assets/vendor/jquery-ui/jquery-ui.theme.min.css');
    echo $this->Html->css('../admin/assets/vendor/select2/css/select2.min.css');
    echo $this->Html->css('../admin/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css');
    echo $this->Html->css('../admin/assets/vendor/jquery-datatables-bs3/assets/css/datatables');
    echo $this->Html->css('../admin/assets/vendor/pnotify/pnotify.custom');
    echo $this->Html->css('../admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css');
    echo $this->Html->css('../admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css');
    echo $this->Html->css('../admin/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css');
    echo $this->Html->css('../admin/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css');
    echo $this->Html->css('../admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min');
    echo $this->Html->css('../admin/assets/vendor/dropzone/min/basic.min.css');
    echo $this->Html->css('../admin/assets/vendor/dropzone/min/dropzone.min.css');
    echo $this->Html->css('../admin/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css');
    echo $this->Html->css('../admin/assets/vendor/summernote/summernote.css');
    echo $this->Html->css('../admin/assets/vendor/summernote/summernote-bs3.css');
    echo $this->Html->css('../admin/assets/vendor/codemirror/lib/codemirror.css');
    echo $this->Html->css('../admin/assets/vendor/codemirror/theme/monokai.css');
    echo $this->Html->css('../admin/assets/stylesheets/theme-admin-extension.css');
    echo $this->Html->css('../admin/assets/stylesheets/skins/extension.css');

    //SKINS
    echo $this->Html->css('skins/default.css');

    //CUSTOM CSS
    echo $this->Html->css('custom.css');

    //PAGE CSS
    echo $this->fetch('css');

    //HEAD LIBS
    echo $this->Html->script('../vendor/modernizr/modernizr.min.js');
    echo $this->Html->scriptBlock('var baseUrl = "' . Router::url('/') . '"');
    ?>

</head>
<body>
<div class="body">

    <header id="header"
            class="header-narrow"
            data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 1, 'stickySetTop': '1'}"
            style="min-height: 0;">
        <div class="header-body" style="top: 0;">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-logo">
                            <?= $this->Html->link($this->Html->image('LeituraDiaria/Icones/agenda.svg', ['alt="Leitura Diária" width="64" height="64"',
                                'style' => [
                                    'margin-right: 0 !important;',
                                    'margin-top: 0 !important;',
                                    'margin-bottom: 0 !important;']]),
                                ['controller' => 'Pages', 'action' => 'home'], array('escape' => false)) ?>
                        </div>
                    </div>
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-nav">
                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                    <nav>
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li>
                                                <?= $this->Html->link('HOME', ['controller' => 'Pages', 'action' => 'home']) ?>
                                            </li>
                                            <li class="dropdown">
                                                <?= $this->Html->link('LIVROS', 'javascript:void(0)', ['class' => 'dropdown-toggle']) ?>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <?= $this->Html->link('Meus Livros', ['controller' => 'Livros', 'action' => 'meus_livros'],
                                                            ['class' => 'dropdown-item']) ?>
                                                    </li>
                                                    <li>
                                                        <?= $this->Html->link('Novo Livro', ['controller' => 'Livros', 'action' => 'novo_livro'],
                                                            ['class' => 'dropdown-item']) ?>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <?= $this->Html->link('LEMBRETES', 'javascript:void(0)', ['class' => 'dropdown-toggle']) ?>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <?= $this->Html->link('Meus Lembretes', ['controller' => 'Lembretes', 'action' => 'meus_lembretes'],
                                                            ['class' => 'dropdown-item']) ?>
                                                    </li>
                                                    <li>
                                                        <?= $this->Html->link('Novo Lembrete', ['controller' => 'Lembretes', 'action' => 'novo_lembrete'],
                                                            ['class' => 'dropdown-item']) ?>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                        data-target=".header-nav-main">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div role="main" class="main">
        <?php echo $this->fetch('pageHeader') ?>
        <?php ?>
        <div style="margin-left: 15px; margin-right: 15px;">
        <?php echo $this->Session->flash(); ?>
        </div>
        <?php echo $this->fetch('content'); ?>
    </div>
</div>

<?php
//VENDOR SCRIPTS
echo $this->Html->script('../vendor/jquery/jquery.js');
echo $this->Html->script('../vendor/jquery.appear/jquery.appear.js');
echo $this->Html->script('../vendor/jquery.easing/jquery.easing.js');
echo $this->Html->script('../vendor/jquery-cookie/jquery-cookie.js');
echo $this->Html->script('../vendor/bootstrap/js/bootstrap.js');
echo $this->Html->script('../vendor/common/common.js');
echo $this->Html->script('../vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js');
echo $this->Html->script('../vendor/jquery.gmap/jquery.gmap.js');
echo $this->Html->script('../vendor/jquery.lazyload/jquery.lazyload.js');
echo $this->Html->script('../vendor/isotope/jquery.isotope.min.js');
echo $this->Html->script('../vendor/owl.carousel/owl.carousel.min.js');
echo $this->Html->script('../vendor/magnific-popup/jquery.magnific-popup.js');
echo $this->Html->script('../vendor/vide/vide.js');

//Theme Base, Components and Settings
echo $this->Html->script('theme.js');

//ADMIN EXTENSION
echo $this->Html->script('../admin/assets/vendor/jquery-validation/jquery.validate.js');
echo $this->Html->script('../admin/assets/vendor/jquery-validation/additional-methods.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js');
echo $this->Html->script('../admin/assets/vendor/jquery-placeholder/jquery-placeholder.js');
echo $this->Html->script('../admin/assets/vendor/jquery-ui/jquery-ui.js');
echo $this->Html->script('../admin/assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js');
echo $this->Html->script('../admin/assets/vendor/select2/js/select2.js');
echo $this->Html->script('../admin/assets/vendor/select2/js/i18n/pt-BR.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js');
echo $this->Html->script('../admin/assets/vendor/jquery-maskedinput/jquery.maskedinput.js');
echo $this->Html->script('../admin/assets/vendor/pnotify/pnotify.custom.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js');
echo $this->Html->script('../admin/assets/vendor/fuelux/js/spinner.js');
echo $this->Html->script('../admin/assets/vendor/dropzone/dropzone.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-markdown/js/markdown.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-markdown/js/to-markdown.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js');
echo $this->Html->script('../admin/assets/vendor/codemirror/lib/codemirror.js');
echo $this->Html->script('../admin/assets/vendor/codemirror/addon/selection/active-line.js');
echo $this->Html->script('../admin/assets/vendor/codemirror/addon/edit/matchbrackets.js');
echo $this->Html->script('../admin/assets/vendor/codemirror/mode/javascript/javascript.js');
echo $this->Html->script('../admin/assets/vendor/codemirror/mode/xml/xml.js');
echo $this->Html->script('../admin/assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js');
echo $this->Html->script('../admin/assets/vendor/codemirror/mode/css/css.js');
echo $this->Html->script('../admin/assets/vendor/summernote/summernote.min.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js');
echo $this->Html->script('../admin/assets/vendor/ios7-switch/ios7-switch.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-confirmation/bootstrap-confirmation.js');
echo $this->Html->script('../admin/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js');
echo $this->Html->script('../admin/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.js');
echo $this->Html->script('../admin/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js');
echo $this->Html->script('../admin/assets/javascripts/theme.admin.extension.js');

//CUSTOM

//Theme Initialization Files
echo $this->Html->script('theme.init.js');
echo $this->Html->script('custom.js');
echo $this->Html->script('api.js');

//PAGE Scripts
echo $this->Html->script('LeituraDiaria/Layouts/default', ['block' => 'script']);
echo $this->fetch('script');
?>
</body>
</html>