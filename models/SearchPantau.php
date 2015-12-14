<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pantau;

/**
 * SearchPantau represents the model behind the search form about `app\models\Pantau`.
 */
class SearchPantau extends Pantau
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'provinsi', 'kode_provinsi', 'kode_kabupaten', 'kabupaten', 'kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', 'is_kelurahan', 'method', 'content'], 'safe'],
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
        $query = Pantau::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'kode_provinsi', $this->kode_provinsi])
            ->andFilterWhere(['like', 'kode_kabupaten', $this->kode_kabupaten])
            ->andFilterWhere(['like', 'kabupaten', $this->kabupaten])
            ->andFilterWhere(['like', 'kode_kecamatan', $this->kode_kecamatan])
            ->andFilterWhere(['like', 'kecamatan', $this->kecamatan])
            ->andFilterWhere(['like', 'kode_desa', $this->kode_desa])
            ->andFilterWhere(['like', 'desa', $this->desa])
            ->andFilterWhere(['like', 'is_kelurahan', $this->is_kelurahan])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
