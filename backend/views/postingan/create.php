<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Postingan */

$this->title = 'Create Postingan';
$this->params['breadcrumbs'][] = ['label' => 'Postingans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postingan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
