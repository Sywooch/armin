<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Item;

/**
 * ItemSearch represents the model behind the search form about `app\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'attached_to', 'provided_by', 'condition', 'fixed_by', 'date_added', 'date_updated', 'status', 'photos'], 'integer'],
            [['title', 'serial', 'description', 'characteristics', 'doc_links', 'complect'], 'safe'],
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
        $query = Item::find();

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
            'category_id' => $this->category_id,
            'attached_to' => $this->attached_to,
            'provided_by' => $this->provided_by,
            'condition' => $this->condition,
            'fixed_by' => $this->fixed_by,
            'date_added' => $this->date_added,
            'date_updated' => $this->date_updated,
            'status' => $this->status,
            'photos' => $this->photos,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'characteristics', $this->characteristics])
            ->andFilterWhere(['like', 'doc_links', $this->doc_links])
            ->andFilterWhere(['like', 'complect', $this->complect]);

        return $dataProvider;
    }
}
