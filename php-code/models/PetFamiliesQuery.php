<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PetFamilies]].
 *
 * @see PetFamilies
 */
class PetFamiliesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

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
