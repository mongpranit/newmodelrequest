<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username') ?>
            
                <?= $form->field($model, 'fname') ?>
            
                <?= $form->field($model, 'lname') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
            
                <?php // $form->field($model, 'newPassword') ?>
                <?php // $form->field($model, 'currentPassword') ?>
                <?php // $form->field($model, 'newPasswordConfirm') ?>
            
            
                
                <?php
                    $authItems= ArrayHelper::map($authItems,'name','name');
                ?>

                <?=$form->field($model,'permissions')->checkboxList($authItems); ?>
            
            
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>