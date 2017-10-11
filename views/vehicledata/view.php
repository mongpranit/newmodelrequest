<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicledata */

$this->title = $model->tableid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicledatas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicledata-view">

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
            'idvehicle',
            'novehecle',
            'brand',
            'model',
            'cc',
            'from_year',
            'to_year',
            'vin_code',
            'abe',
            'abe_code',
            'model_refno',
            'model_ref',
            'contry_modelref',
            'engine_type',
            'engine_layout',
            'reference',
            'idvehiclegroup',
            'vehiclename',
            'idvehiclesub',
            'vehiclesubname',
            'ref_source',
            'oem_shocktype',
            'specialnote',
            'sync_cloud_date',
            'updated_at',
            'sync_cloud_status',
            'cloud_uuid',
        ],
    ]) ?>

</div>
