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
            ['is', 'userId', null]
        )->lastFamily();
    }

    public function lastFamily(){
        return $this->andWhere(
            ['in', 'dateAdoption',
                new Query([
                    'select' => ['maxDateId'=>'MAX(dateAdoption)'],
                    'from' => [PetFamilies::tableName()],
                    'groupBy' => ['petId'],
                ])
            ]
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
