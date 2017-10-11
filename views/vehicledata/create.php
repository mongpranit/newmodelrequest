<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vehicledata */

$this->title = Yii::t('app', 'Create Vehicledata');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicledatas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicledata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
