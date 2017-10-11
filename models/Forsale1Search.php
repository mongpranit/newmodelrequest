<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Forsale1;

/**
 * Forsale1Search represents the model behind the search form about `app\models\Forsale1`.
 */
class Forsale1Search extends Forsale1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tableid', 'id', 'sync_cloud_status'], 'integer'],
            [['vehicledata', 'runrequest', 'sync_cloud_date', 'cloud_uuid'], 'safe'],
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
        $query = Forsale1::find();

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
            'id' => $this->id,
            'sync_cloud_date' => $this->sync_cloud_date,
            'sync_cloud_status' => $this->sync_cloud_status,
        ]);

        $query->andFilterWhere(['like', 'vehicledata', $this->vehicledata])
            ->andFilterWhere(['like', 'runrequest', $this->runrequest])
            ->andFilterWhere(['like', 'cloud_uuid', $this->cloud_uuid]);

        return $dataProvider;
    }
}
