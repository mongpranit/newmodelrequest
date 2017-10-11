<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehicledataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicledata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tableid') ?>

    <?= $form->field($model, 'idvehicle') ?>

    <?= $form->field($model, 'novehecle') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'cc') ?>

    <?php // echo $form->field($model, 'from_year') ?>

    <?php // echo $form->field($model, 'to_year') ?>

    <?php // echo $form->field($model, 'vin_code') ?>

    <?php // echo $form->field($model, 'abe') ?>

    <?php // echo $form->field($model, 'abe_code') ?>

    <?php // echo $form->field($model, 'model_refno') ?>

    <?php // echo $form->field($model, 'model_ref') ?>

    <?php // echo $form->field($model, 'contry_modelref') ?>

    <?php // echo $form->field($model, 'engine_type') ?>

    <?php // echo $form->field($model, 'engine_layout') ?>

    <?php // echo $form->field($model, 'reference') ?>

    <?php // echo $form->field($model, 'idvehiclegroup') ?>

    <?php // echo $form->field($model, 'vehiclename') ?>

    <?php // echo $form->field($model, 'idvehiclesub') ?>

    <?php // echo $form->field($model, 'vehiclesubname') ?>

    <?php // echo $form->field($model, 'ref_source') ?>

    <?php // echo $form->field($model, 'oem_shocktype') ?>

    <?php // echo $form->field($model, 'specialnote') ?>

    <?php // echo $form->field($model, 'sync_cloud_date') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'sync_cloud_status') ?>

    <?php // echo $form->field($model, 'cloud_uuid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
