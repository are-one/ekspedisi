<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Surat;

/**
 * SuratSearch represents the model behind the search form of `app\models\Surat`.
 */
class SuratSearch extends Surat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_surat', 'id_satker'], 'integer'],
            [['perihal', 'penerima', 'foto'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Surat::find();

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
            'id_surat' => $this->id_surat,
            'id_satker' => $this->id_satker,
        ]);

        $query->andFilterWhere(['like', 'perihal', $this->perihal])
            ->andFilterWhere(['like', 'penerima', $this->penerima])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
