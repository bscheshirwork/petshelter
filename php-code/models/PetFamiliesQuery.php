<?php

namespace app\models;
use yii\db\Query;

/**
 * This is the ActiveQuery class for [[PetFamilies]].
 *
 * @see PetFamilies
 */
class PetFamiliesQuery extends \yii\db\ActiveQuery
{
    public function readyToAdept()
    {
        return $this->andWhere(
            ['and', ['is', 'userId', null], ['in', 'id',
                new Query([
                    'select' => ['id'],
                    'from' => [PetFamilies::tableName()],
                    'groupBy' => ['petId'],
                    'orderBy' => ['dateAdoption' => SORT_DESC, 'id' => SORT_DESC]
                ])
            ]]
//                '(SELECT id FROM ' . PetFamilies::tableName() . ' GROUP BY petId, ORDER BY dateAdoption DESC, id DESC)']]
        );
    }

    /**
     * @inheritdoc
     * @return PetFamilies[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PetFamilies|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
