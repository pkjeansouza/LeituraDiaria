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
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo $nomeDoAplicativo ?>
    </title>

    <!-- Mobile Metas -->
    <?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no')); ?>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <?php
    echo $this->Html->meta('icon');

    echo $this->fetch('meta');

    //VENDOR CSS
    echo $this->Html->css('../admin/assets/vendor/bootstrap/css/bootstrap.css');
    echo $this->Html->css('../admin/assets/vendor/font-awesome/css/font-awesome.css');
    echo $this->Html->css('../admin/assets/vendor/magnific-popup/magnific-popup.css');
    echo $this->Html->css('../admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css');

    //THEME CSS
    echo $this->Html->css('../admin/assets/stylesheets/theme.css');

    //SKINS
    echo $this->Html->css('../admin/assets/stylesheets/skins/default.css');

    //CUSTOM CSS
    echo $this->Html->css('../admin/assets/stylesheets/theme-custom.css');

    //HEAD LIBS
    echo $this->Html->script('../admin/assets/vendor/modernizr/modernizr.js');
    echo $this->Html->scriptBlock('var baseUrl = "' . Router::url('/') . '"');
    ?>

</head>
<body>
<?php echo $this->fetch('content'); ?>

<?php
//VENDOR SCRIPTS
echo $this->Html->script('../admin/assets/vendor/jquery/jquery.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap/js/bootstrap.js');
echo $this->Html->script('../admin/assets/vendor/nanoscroller/nanoscroller.js');
echo $this->Html->script('../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js');
echo $this->Html->script('../admin/assets/vendor/magnific-popup/jquery.magnific-popup.js');
echo $this->Html->script('../admin/assets/vendor/jquery-placeholder/jquery-placeholder.js');

//Theme Base, Components and Settings
echo $this->Html->script('../admin/assets/javascripts/theme.js');

//Theme Initialization Files
echo $this->Html->script('../admin/assets/javascripts/theme.init.js');
?>

</body>
</html>