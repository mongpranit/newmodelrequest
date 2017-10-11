<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicledata".
 *
 * @property string $tableid
 * @property integer $idvehicle
 * @property string $novehecle
 * @property string $brand
 * @property string $model
 * @property string $cc
 * @property string $from_year
 * @property string $to_year
 * @property string $vin_code
 * @property string $abe
 * @property string $abe_code
 * @property string $model_refno
 * @property string $model_ref
 * @property string $contry_modelref
 * @property string $engine_type
 * @property string $engine_layout
 * @property string $reference
 * @property string $idvehiclegroup
 * @property string $vehiclename
 * @property string $idvehiclesub
 * @property string $vehiclesubname
 * @property string $ref_source
 * @property string $oem_shocktype
 * @property string $specialnote
 * @property string $sync_cloud_date
 * @property string $updated_at
 * @property integer $sync_cloud_status
 * @property string $cloud_uuid
 */
class Vehicledata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicledata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idvehicle', 'sync_cloud_status'], 'integer'],
            [['sync_cloud_date', 'updated_at'], 'safe'],
            [['novehecle'], 'string', 'max' => 11],
            [['brand', 'model', 'cc', 'from_year', 'to_year', 'vin_code', 'abe', 'abe_code', 'model_refno', 'model_ref', 'contry_modelref', 'engine_type', 'engine_layout', 'reference', 'idvehiclegroup', 'vehiclename', 'idvehiclesub', 'vehiclesubname', 'ref_source', 'oem_shocktype', 'specialnote', 'cloud_uuid'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tableid' => Yii::t('app', 'Tableid'),
            'idvehicle' => Yii::t('app', 'Idvehicle'),
            'novehecle' => Yii::t('app', 'Novehecle'),
            'brand' => Yii::t('app', 'Brand'),
            'model' => Yii::t('app', 'Model'),
            'cc' => Yii::t('app', 'Cc'),
            'from_year' => Yii::t('app', 'From Year'),
            'to_year' => Yii::t('app', 'To Year'),
            'vin_code' => Yii::t('app', 'Vin Code'),
            'abe' => Yii::t('app', 'Abe'),
            'abe_code' => Yii::t('app', 'Abe Code'),
            'model_refno' => Yii::t('app', 'Model Refno'),
            'model_ref' => Yii::t('app', 'Model Ref'),
            'contry_modelref' => Yii::t('app', 'Contry Modelref'),
            'engine_type' => Yii::t('app', 'Engine Type'),
            'engine_layout' => Yii::t('app', 'Engine Layout'),
            'reference' => Yii::t('app', 'Reference'),
            'idvehiclegroup' => Yii::t('app', 'Idvehiclegroup'),
            'vehiclename' => Yii::t('app', 'Vehiclename'),
            'idvehiclesub' => Yii::t('app', 'Idvehiclesub'),
            'vehiclesubname' => Yii::t('app', 'Vehiclesubname'),
            'ref_source' => Yii::t('app', 'Ref Source'),
            'oem_shocktype' => Yii::t('app', 'Oem Shocktype'),
            'specialnote' => Yii::t('app', 'Specialnote'),
            'sync_cloud_date' => Yii::t('app', 'Sync Cloud Date'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'sync_cloud_status' => Yii::t('app', 'Sync Cloud Status'),
            'cloud_uuid' => Yii::t('app', 'Cloud Uuid'),
        ];
    }
}
