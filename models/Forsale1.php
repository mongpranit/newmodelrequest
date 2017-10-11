<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forsale_1".
 *
 * @property string $tableid
 * @property integer $id
 * @property string $vehicledata
 * @property string $runrequest
 * @property string $sync_cloud_date
 * @property integer $sync_cloud_status
 * @property string $cloud_uuid
 */
class Forsale1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forsale_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sync_cloud_status'], 'integer'],
            [['sync_cloud_date'], 'safe'],
            [['vehicledata', 'runrequest', 'cloud_uuid'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tableid' => Yii::t('app', 'Tableid'),
            'id' => Yii::t('app', 'ID'),
            'vehicledata' => Yii::t('app', 'Vehicledata'),
            'runrequest' => Yii::t('app', 'Runrequest'),
            'sync_cloud_date' => Yii::t('app', 'Sync Cloud Date'),
            'sync_cloud_status' => Yii::t('app', 'Sync Cloud Status'),
            'cloud_uuid' => Yii::t('app', 'Cloud Uuid'),
        ];
    }
}
