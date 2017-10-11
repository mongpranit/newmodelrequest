<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Forsale1 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Forsale1',
]) . $model->tableid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Forsale1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tableid, 'url' => ['view', 'id' => $model->tableid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="forsale1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
