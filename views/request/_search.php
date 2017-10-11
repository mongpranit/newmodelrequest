<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tableid') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'n_number_request') ?>

    <?= $form->field($model, 'rd_status_app') ?>

    <?= $form->field($model, 'rd_developin') ?>

    <?php // echo $form->field($model, 'internation_receive') ?>

    <?php // echo $form->field($model, 'internation_receivedate') ?>

    <?php // echo $form->field($model, 'internation_name') ?>

    <?php // echo $form->field($model, 'sync_cloud_status') ?>

    <?php // echo $form->field($model, 'sync_cloud_date') ?>

    <?php // echo $form->field($model, 'cloud_uuid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
