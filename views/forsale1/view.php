<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Forsale1 */

$this->title = $model->tableid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Forsale1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forsale1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->tableid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->tableid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tableid',
            'id',
            'vehicledata',
            'runrequest',
            'sync_cloud_date',
            'sync_cloud_status',
            'cloud_uuid',
        ],
    ]) ?>

</div>
