<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- <div class="card"> -->
<div class="card card-outline card-primary">
  <div class="card-header text-center">
    <a href="../../index2.html" class="h1"><b>Insta</b>App</a>
  </div>
  <div class="card-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

    <?= $form->field($model, 'username', [
      'options' => ['class' => 'form-group has-feedback'],
      'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
      'template' => '{beginWrapper}{input}{error}{endWrapper}',
      'wrapperOptions' => ['class' => 'input-group mb-3']
    ])
      ->label(false)
      ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

    <?= $form->field($model, 'password', [
      'options' => ['class' => 'form-group has-feedback'],
      'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
      'template' => '{beginWrapper}{input}{error}{endWrapper}',
      'wrapperOptions' => ['class' => 'input-group mb-3']
    ])
      ->label(false)
      ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

    <!-- <p class="mb-3 text-right">
      <a href="forgot-password.html">I forgot my password</a>
    </p> -->

    <div class="row">
      <!-- <div class="col-8">
        <?= $form->field($model, 'rememberMe')->checkbox([
          'template' => '<div class="icheck-primary">{input}{label}</div>',
          'labelOptions' => [
            'class' => ''
          ],
          'uncheck' => null
        ]) ?>
      </div> -->
      <div class="col-12">
        <?= Html::submitButton('Log In', ['class' => 'btn btn-primary btn-block']) ?>
      </div>
    </div>
    <p class="mb-3 text-center">
      <a href="<?= Url::toRoute(['signup']) ?>" class="text-red">Register</a>
    </p>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>
  </div>
</div>
<!-- /.login-card-body -->
<!-- </div> -->