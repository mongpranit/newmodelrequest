<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehicledata;

/**
 * VehicledataSearch represents the model behind the search form about `app\models\Vehicledata`.
 */
class VehicledataSearch extends Vehicledata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tableid', 'idvehicle', 'sync_cloud_status'], 'integer'],
            [['novehecle', 'brand', 'model', 'cc', 'from_year', 'to_year', 'vin_code', 'abe', 'abe_code', 'model_refno', 'model_ref', 'contry_modelref', 'engine_type', 'engine_layout', 'reference', 'idvehiclegroup', 'vehiclename', 'idvehiclesub', 'vehiclesubname', 'ref_source', 'oem_shocktype', 'specialnote', 'sync_cloud_date', 'updated_at', 'cloud_uuid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Vehicledata::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tableid' => $this->tableid,
            'idvehicle' => $this->idvehicle,
            'sync_cloud_date' => $this->sync_cloud_date,
            'updated_at' => $this->updated_at,
            'sync_cloud_status' => $this->sync_cloud_status,
        ]);

        $query->andFilterWhere(['like', 'novehecle', $this->novehecle])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'cc', $this->cc])
            ->andFilterWhere(['like', 'from_year', $this->from_year])
            ->andFilterWhere(['like', 'to_year', $this->to_year])
            ->andFilterWhere(['like', 'vin_code', $this->vin_code])
            ->andFilterWhere(['like', 'abe', $this->abe])
            ->andFilterWhere(['like', 'abe_code', $this->abe_code])
            ->andFilterWhere(['like', 'model_refno', $this->model_refno])
            ->andFilterWhere(['like', 'model_ref', $this->model_ref])
            ->andFilterWhere(['like', 'contry_modelref', $this->contry_modelref])
            ->andFilterWhere(['like', 'engine_type', $this->engine_type])
            ->andFilterWhere(['like', 'engine_layout', $this->engine_layout])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'idvehiclegroup', $this->idvehiclegroup])
            ->andFilterWhere(['like', 'vehiclename', $this->vehiclename])
            ->andFilterWhere(['like', 'idvehiclesub', $this->idvehiclesub])
            ->andFilterWhere(['like', 'vehiclesubname', $this->vehiclesubname])
            ->andFilterWhere(['like', 'ref_source', $this->ref_source])
            ->andFilterWhere(['like', 'oem_shocktype', $this->oem_shocktype])
            ->andFilterWhere(['like', 'specialnote', $this->specialnote])
            ->andFilterWhere(['like', 'cloud_uuid', $this->cloud_uuid]);

        return $dataProvider;
    }
}
