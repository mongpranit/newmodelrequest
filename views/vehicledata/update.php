<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicledata */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Vehicledata',
]) . $model->tableid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicledatas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tableid, 'url' => ['view', 'id' => $model->tableid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vehicledata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
