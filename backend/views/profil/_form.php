<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Profil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profil-form">

  <?php $form = ActiveForm::begin(); ?>

  <?php if ($cekProfil) { ?>

  <?= $form->field($cekProfil, 'nama')->textInput() ?>

  <?= $form->field($cekProfil, 'bio')->textarea(['rows' => 6]) ?>

  <?= $form->field($cekProfil, '_photo')->fileInput(['maxlength' => true]) ?>
  <?php } else { ?>
  <?= $form->field($model, 'nama')->textInput() ?>

  <?= $form->field($model, 'bio')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, '_photo')->fileInput(['maxlength' => true]) ?>
  <?php } ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>