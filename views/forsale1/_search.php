<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Forsale1Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forsale1-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tableid') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idVehicle') ?>

    <?= $form->field($model, 'runrequest') ?>

    <?= $form->field($model, 'sync_cloud_date') ?>

    <?php // echo $form->field($model, 'sync_cloud_status') ?>

    <?php // echo $form->field($model, 'cloud_uuid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
