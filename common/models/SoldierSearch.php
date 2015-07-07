<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Soldier;

/**
 * SoldierSearch represents the model behind the search form about `app\models\Soldier`.
 */
class SoldierSearch extends Soldier
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rank', 'position', 'unit', 'photos', 'primary_photo'], 'integer'],
            [['name', 'nickname', 'phone', 'email', 'password'], 'safe'],
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
        $query = Soldier::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'rank' => $this->rank,
            'position' => $this->position,
            'unit' => $this->unit,
            'photos' => $this->photos,
            'primary_photo' => $this->primary_photo,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }

    public function selectOptions()
    {
        $query = Soldier::find();

        $arr = $query->select(['id', 'name', 'nickname'])
            ->asArray()
            ->all();

        $soldiers = ['' => 'Обрати'];
        foreach($arr as $soldier) {
            $soldiers[$soldier['id']] = "{$soldier['nickname']} ({$soldier['name']})";
        }

        return $soldiers;
    }
}
