<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicledata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicledata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idvehicle')->textInput() ?>

    <?= $form->field($model, 'novehecle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vin_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abe_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_refno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contry_modelref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine_layout')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idvehiclegroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehiclename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idvehiclesub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehiclesubname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oem_shocktype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specialnote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sync_cloud_date')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'sync_cloud_status')->textInput() ?>

    <?= $form->field($model, 'cloud_uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
