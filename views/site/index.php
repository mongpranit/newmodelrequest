<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicledataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vehicledatas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicledata-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Vehicledata'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tableid',
            'idvehicle',
            'novehecle',
            'brand',
            'model',
            // 'cc',
            // 'from_year',
            // 'to_year',
            // 'vin_code',
            // 'abe',
            // 'abe_code',
            // 'model_refno',
            // 'model_ref',
            // 'contry_modelref',
            // 'engine_type',
            // 'engine_layout',
            // 'reference',
            // 'idvehiclegroup',
            // 'vehiclename',
            // 'idvehiclesub',
            // 'vehiclesubname',
            // 'ref_source',
            // 'oem_shocktype',
            // 'specialnote',
            // 'sync_cloud_date',
            // 'updated_at',
            // 'sync_cloud_status',
            // 'cloud_uuid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
