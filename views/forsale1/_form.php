<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Forsale1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forsale1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'vehicledata')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'runrequest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sync_cloud_date')->textInput() ?>

    <?= $form->field($model, 'sync_cloud_status')->textInput() ?>

    <?= $form->field($model, 'cloud_uuid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
