<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Postingan */

$this->title = 'Create Postingan';
$this->params['breadcrumbs'][] = ['label' => 'Postingans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postingan-create">
  <div class="postingan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-3">
        <?php if ($model->photo) : ?>
        <img src="<?= Yii::getAlias('@web/uploads/postingan/' . $model->photo) ?>" height="150" width="200">
        <?php endif; ?>
      </div>
      <div class="col-md-9">
        <?= $form->field($model, 'caption')->textArea(['rows' => 6])->label(false) ?>
      </div>
    </div>


    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>