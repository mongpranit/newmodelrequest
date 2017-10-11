<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property string $tableid
 * @property integer $id
 * @property string $n_number_request
 * @property string $rd_status_app
 * @property string $rd_developin
 * @property string $internation_receive
 * @property string $internation_receivedate
 * @property string $internation_name
 * @property integer $sync_cloud_status
 * @property string $sync_cloud_date
 * @property string $cloud_uuid
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'sync_cloud_status'], 'integer'],
            [['internation_receivedate', 'sync_cloud_date'], 'safe'],
            [['n_number_request', 'rd_status_app', 'rd_developin', 'internation_receive', 'internation_name', 'cloud_uuid'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tableid' => 'Tableid',
            'id' => 'ID',
            'n_number_request' => 'N Number Request',
            'rd_status_app' => 'Rd Status App',
            'rd_developin' => 'Rd Developin',
            'internation_receive' => 'Internation Receive',
            'internation_receivedate' => 'Internation Receivedate',
            'internation_name' => 'Internation Name',
            'sync_cloud_status' => 'Sync Cloud Status',
            'sync_cloud_date' => 'Sync Cloud Date',
            'cloud_uuid' => 'Cloud Uuid',
        ];
    }

}
