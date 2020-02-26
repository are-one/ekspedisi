<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$action = Yii::$app->controller->action->id;
$controller = Yii::$app->controller->id;

$list_controller = ['surat', 'satker', 'site'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<?php
if (Yii::$app->user->isGuest) :
?>

  <body class="hold-transition layout-top-nav">

  <?php else : ?>

    <body class="hold-transition sidebar-mini layout-navbar-fixed layout-footer-fixed">
    <?php endif; ?>

    <?php $this->beginBody() ?>
    <div class="wrapper">
      <?php
      if (Yii::$app->user->isGuest) :
      ?>
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
          <div class="container">
            <a href="#" class="navbar-brand">
              <span class="brand-text font-weight-light"><b>SURAT EKSPEDISI</b></span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>


            <ul class="navbar-nav ml-auto">
              <!-- Messages Dropdown Menu -->

              <!-- Notifications Dropdown Menu -->
              <li class="dropdown user user-menu open">
                <a class="nav-link" href="index.php?r=site/login">

                  <span class="hidden-xs">login</span>

                </a>

              </li>
            </ul>
            <!-- Right navbar links -->

          </div>
        </nav>
      <?php else : ?>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
          </ul>

          <!-- SEARCH FORM -->


          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->

            <!-- Notifications Dropdown Menu -->
            <li class="dropdown user user-menu open">
              <a class="nav-link" data-toggle="dropdown" href="#">

                <img src="<?= Url::to('@web') ?>/img/pin logo.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>

              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header">
                  <img src="<?= Url::to('@web') ?>/img/pin logo.png" class="img-circle" alt="User Image">

                  <p>
                    <?= Yii::$app->user->identity->username ?>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="float-left">
                    <?= Html::a('Logout', ['site/logout'], ['class' => 'btn btn-default btn-flat', 'data' => ['method' => 'post']]) ?>

                  </div>

                </li>
              </ul>
            </li>
          </ul>

        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Surat Ekspedisi </span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="<?= Url::to('@web') ?>/img/pin logo.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?></a>
              </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                  <a href="index.php?r=site" class="nav-link <?= ($controller == 'site') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Beranda

                    </p>
                  </a>

                </li>

                <li class="nav-item">
                  <a href="index.php?r=surat" class="nav-link <?= ($controller == 'surat') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      Surat Ekspedisi
                    </p>
                  </a>

                </li>
                <li class="nav-item">
                  <a href="index.php?r=satker" class="nav-link <?= ($controller == 'satker') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      Satker
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?r=user/update&id=1" class="nav-link <?= ($controller == 'user') ? 'active' : '' ?>">
                    <i class="nav-icon fas  fa-unlock-alt"></i>
                    <p>
                      Ganti password
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>
      <?php endif; ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $this->title ?></h1>
              </div><!-- /.col -->
              <?php if (!Yii::$app->user->isGuest) : ?>
                <div class="col-sm-6">
                  <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumb float-sm-right'],
                    'itemTemplate' => "<li>{link}</li>&nbsp; / &nbsp; \n",
                  ]) ?>
                </div><!-- /.col -->
              <?php endif; ?>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">



            <?= Alert::widget() ?>
            <?= $content ?>


          </div>
          <!--/. container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>&copy; My Company <?= date('Y') ?></strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <?= Yii::powered() ?>
        </div>
      </footer>
    </div>

    <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>