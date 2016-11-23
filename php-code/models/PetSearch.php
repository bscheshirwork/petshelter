<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pets;
use yii\data\DataProviderInterface;

/**
 * PetSearch represents the model behind the search form about `app\models\Pets`.
 */
class PetSearch extends Pets
{

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['genus.id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'genus.id'], 'integer'],
            [['name'], 'safe'],
            [['age'], 'number'],
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
        $query = Pets::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith('genus AS genus');
        $dataProvider->sort->attributes['genus.id'] = [
            'asc' => ['genus.name' => SORT_ASC],
            'desc' => ['genus.name' => SORT_DESC],
        ];
        $query->joinWith('lastPetFamily.user as user');
        $dataProvider->sort->attributes['lastPetFamily.user.name'] = [
            'asc' => ['user.name' => SORT_ASC],
            'desc' => ['user.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'genus.id' => $this->getAttribute('genus.id'),
            'user.name' => $this->getAttribute('lastPetFamily.user.name'),
            'age' => $this->age,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }

    /**
     * @param $dataProvider
     * @return mixed
     */
    public function addDefaultSort(DataProviderInterface $dataProvider): DataProviderInterface{
        $dataProvider->getSort()->defaultOrder = [
            'name' => SORT_ASC,
        ];
        return $dataProvider;
    }
}
