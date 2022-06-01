<?php

use backend\models\KomentarPostingan;
use backend\models\LikePostingan;
use backend\models\Profil;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-6">
    <?php
    foreach ($model as $val) {
      $cekLike = LikePostingan::find()
        ->where(['id_user' => Yii::$app->user->identity->id])
        ->andWhere(['id_postingan' => $val->id])
        ->one();
      $countKomen = KomentarPostingan::find()
        ->where(['id_postingan' => $val->id])
        ->count();
      $cekProfil = Profil::find()
        ->where(['id' => $val->id_user])
        ->one();
    ?>
    <div class="card">
      <div class="card-header">
        <div class="user-panel d-flex">
          <div class="image">
            <?php if ($cekProfil) { ?>
            <img
              src="<?= $cekProfil->photo_profil ? Yii::getAlias('@web/uploads/profil/' . $cekProfil->photo_profil) : Yii::getAlias('@web/uploads/default.png') ?>"
              class="img-circle" alt="User Image">
            <?php } else { ?>
            <img src="<?= Yii::getAlias('@web/uploads/default.png') ?>" class="img-circle" alt="User Image">
            <?php } ?>
          </div>
          <div class="info">
            <h3 class="card-title"><?= $val->user->username; ?></h3>
          </div>
        </div>
      </div>
      <div class="card-body px-0 py-0">
        <img src="<?= Yii::getAlias('@web/uploads/postingan/' . $val->photo) ?>" class="img-responsive"
          alt="<?= Yii::$app->user->identity->nama ?>" width="100%" height="450px">
        <div class="mt-2 mx-3">
          <?php if ($cekLike) { ?>
          <a href="<?= Url::toRoute(['unlike', 'id' => $val->id]); ?>">
            <i class="fa fa-heart text-red"></i>
          </a>
          <?php } else { ?>
          <a href="<?= Url::toRoute(['like', 'id' => $val->id]); ?>">
            <i class="fa fa-heart text-gray"></i>
          </a>
          <?php } ?>
          <a href="<?= Url::toRoute(['comment', 'id' => $val->id]); ?>">
            <i class="fa fa-comment text-gray"></i>
          </a>
        </div>
        <div class="mt-2 mx-4 mb-4">
          <div class="row mb-2">
            <?= $val->count_like ? $val->count_like : '0'; ?> Suka
          </div>
          <div class="row">
            <span><b><?= $val->user->username; ?></b><span> <span><?= nl2br($val->caption); ?></span>
          </div>
          <div class="row">
            <?php if ($countKomen) { ?>
            <a href="<?= Url::toRoute(['comment', 'id' => $val->id]); ?>" class="text-gray">Lihat semua
              <?= $countKomen ?> komentar</a>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <div class="col-md-4 ">
    <h3>Tes Full Stack SEVIMA</h3>
  </div>
</div>
</div>