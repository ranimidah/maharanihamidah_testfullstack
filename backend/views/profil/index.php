<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profils';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="postingan-create">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-3">
              <?php if ($model) { ?>
              <img
                src="<?= $model->photo_profil ? Yii::getAlias('@web/uploads/profil/' . $model->photo_profil) : Yii::getAlias('@web/uploads/default.png') ?>"
                class="img-circle" alt="User Image" width="100px" height="100px">
              <?php } else { ?>
              <img src="<?= Yii::getAlias('@web/uploads/default.png') ?>" class="img-circle" alt="User Image"
                width="100px" height="100px">
              <?php } ?>
            </div>
            <div class="col-md-9">
              <div class="ml-5">
                <p style="font-size: 18pt;">
                  <?= Yii::$app->user->identity->username ?>
                  <a href="<?= Url::toRoute(['update']) ?>" class="btn btn-default">Edit
                    Profil</a>
                </p>
                <p> <?= $countPostingan ?> postingan</p>
                <p>
                  <span style="font-weight: bold;"><?= Yii::$app->user->identity->nama ?></span><br>
                  <span><?= $model ? nl2br($model->bio) : false ?></span>
                </p>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="row mt-4">
            <?php
            if ($postingan) {
              foreach ($postingan as $val) {
            ?>
            <div class="col-sm-4">
              <a href="<?= Url::toRoute(['/site/comment', 'id' => $val->id]) ?>">
                <div class="position-relative" style="min-height: 180px;">
                  <img
                    src="<?= $val->photo ? Yii::getAlias('@web/uploads/postingan/' . $val->photo) : Yii::getAlias('@web/uploads/default.png') ?>"
                    alt="Photo 2" class="img-fluid">
                </div>
              </a>
            </div>
            <?php } ?>
            <?php } else { ?>
            <p>Belum ada postingan</p>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>