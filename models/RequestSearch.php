<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Request;

/**
 * RequestSearch represents the model behind the search form about `app\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tableid', 'id', 'sync_cloud_status'], 'integer'],
            [['n_number_request', 'rd_status_app', 'rd_developin', 'internation_receive', 'internation_receivedate', 'internation_name', 'sync_cloud_date', 'cloud_uuid'], 'safe'],
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
        $query = Request::find();

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
            'internation_receivedate' => $this->internation_receivedate,
            'sync_cloud_status' => $this->sync_cloud_status,
            'sync_cloud_date' => $this->sync_cloud_date,
        ]);

        $query->andFilterWhere(['like', 'n_number_request', $this->n_number_request])
            ->andFilterWhere(['like', 'rd_status_app', $this->rd_status_app])
            ->andFilterWhere(['like', 'rd_developin', $this->rd_developin])
            ->andFilterWhere(['like', 'internation_receive', $this->internation_receive])
            ->andFilterWhere(['like', 'internation_name', $this->internation_name])
            ->andFilterWhere(['like', 'cloud_uuid', $this->cloud_uuid]);

        return $dataProvider;
    }
}
