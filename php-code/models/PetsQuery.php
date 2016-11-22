<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pets]].
 *
 * @see Pets
 */
class PetsQuery extends \yii\db\ActiveQuery
{
    public function onlyGenus($genusId)
    {
        return $this->andWhere(['genusId'=>$genusId]);
    }

    /**
     * @inheritdoc
     * @return Pets[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pets|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
