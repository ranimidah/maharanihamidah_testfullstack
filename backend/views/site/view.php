<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $cekPembuat->user->username;
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="postingan-create">
      <div class="card">
        <div class="card-body px-0 py-0">
          <div class="row">
            <div class="col-md-6">
              <img src="<?= Yii::getAlias('@web/uploads/postingan/' . $cekPembuat->photo) ?>" width="100%"
                height="450px" />
            </div>
            <div class="col-md-6 px-0 mx-0">
              <div class="card direct-chat direct-chat-primary mr-2 mb-0" style="height: 450px;">
                <div class="card-header mr-2 px-0">
                  <div class="user-panel d-flex">
                    <div class="image">
                      <img src="<?= Yii::getAlias('@web/uploads/default.png') ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="info">
                      <h3 class="card-title"><?= $cekPembuat->user->username; ?></h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="direct-chat-messages">
                    <div class="user-panel d-flex">
                      <div class="image mt-2">
                        <?php if ($cekProfil) { ?>
                        <img
                          src="<?= $cekProfil->photo_profil ? Yii::getAlias('@web/uploads/profil/' . $cekProfil->photo_profil) : Yii::getAlias('@web/uploads/default.png') ?>"
                          class="img-circle" alt="User Image">
                        <?php } else { ?>
                        <img src="<?= Yii::getAlias('@web/uploads/default.png') ?>" class="img-circle" alt="User Image">
                        <?php } ?>
                      </div>
                      <div class="info">
                        <span><b><?= $cekPembuat->user->username; ?></b><span>
                            <span><?= nl2br($cekPembuat->caption); ?></span>
                      </div>
                    </div>
                    <div class="mt-3">
                      <?php if ($cekKomentar) { ?>
                      <p>Komentar</p>
                      <?php } ?>
                      <?php foreach ($cekKomentar as $val) { ?>
                      <div class="user-panel d-flex">
                        <div class="image mt-2">
                          <?php if ($cekProfil) { ?>
                          <img
                            src="<?= $cekProfil->photo_profil ? Yii::getAlias('@web/uploads/profil/' . $cekProfil->photo_profil) : Yii::getAlias('@web/uploads/default.png') ?>"
                            class="img-circle" alt="User Image">
                          <?php } else { ?>
                          <img src="<?= Yii::getAlias('@web/uploads/default.png') ?>" class="img-circle"
                            alt="User Image">
                          <?php } ?>
                        </div>
                        <div class="info">
                          <span><b><?= $val->user0->username; ?></b><span>
                              <span><?= nl2br($val->komentar); ?></span>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="card-footer pb-0">
                  <?php $form = ActiveForm::begin(); ?>
                  <div class="row">
                    <div class="input-group">
                      <div class="col-md-9">
                        <?= $form->field($model, 'komentar')->textInput(['maxlength' => true, 'placeholder' => 'Tambahkan Komentar'])->label(false) ?>
                      </div>
                      <div class="input-group-append">
                        <div class="form-group">
                          <?= Html::submitButton('Kirim', ['class' => 'btn btn-ligth btn-flat text-blue']) ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php ActiveForm::end(); ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>