<?php

use backend\models\Profil;
use yii\helpers\Html;
use yii\helpers\Url;

$cekProfil = Profil::find()
  ->where(['id' => Yii::$app->user->identity->id])
  ->one();

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <ul class="navbar-nav">
      <h3>RaniInstaApp</h3>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= Url::toRoute(['/site/index']) ?>" role="button">
          <i class="fas fa-home"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= Url::toRoute(['/postingan/create']) ?>" role="button">
          <i class="far fa-plus-square"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= Url::toRoute(['/profil/index']) ?>" role="button">
          <div class="user-panel d-flex ">
            <div class="image px-0">
              <?php if ($cekProfil) { ?>
              <img
                src="<?= $cekProfil->photo_profil ? Yii::getAlias('@web/uploads/profil/' . $cekProfil->photo_profil) : Yii::getAlias('@web/uploads/default.png') ?>"
                class="img-circle" alt="User Image">
              <?php } else { ?>
              <img src="<?= Yii::getAlias('@web/uploads/default.png') ?>" class="img-circle" alt="User Image">
              <?php } ?>
            </div>
          </div>
        </a>
      </li>


      <li class="nav-item">
        <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
      </li>

    </ul>
  </div>
</nav>
<!-- /.navbar -->