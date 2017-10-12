<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;            //for display message

$this->title = 'Users';
$this->params['breadcrumbs'][] = 'Change Password';
?>

<!-- ============== CODE FOR DISPLAY MESSAGE===================== -->
<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
    <?= \yii\bootstrap\Alert::widget([
        'body'=>ArrayHelper::getValue($message, 'body'),
        'options'=>ArrayHelper::getValue($message, 'options'),
    ])?>
<?php endforeach; ?>
<!-- ======================== END =============================== -->

<div class="col-lg-8">
<div class="panel panel-primary">
 <div class="panel-heading"><h3>Change Password</h3></div>
  <div class="panel-body">
        <?php $form=ActiveForm::begin(); ?>
        <?= $form->field($user,'currentPassword')->passwordInput() ?>
        <?= $form->field($user,'newPassword')->passwordInput() ?>
        <?= $form->field($user,'newPasswordConfirm')->passwordInput() ?>

        <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <?= Html::submitButton('Submit',['class'=>'btn btn-primary']) ?>
        </div>
        </div>

        <?php ActiveForm::end(); ?>
  </div>
</div>
</div>