<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'n_number_request')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rd_status_app')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rd_developin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'internation_receive')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'internation_receivedate')->textInput() ?>

    <?= $form->field($model, 'internation_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sync_cloud_status')->textInput() ?>

    <?= $form->field($model, 'sync_cloud_date')->textInput() ?>

    <?= $form->field($model, 'cloud_uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
