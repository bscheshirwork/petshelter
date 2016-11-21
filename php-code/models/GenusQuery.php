<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Genus]].
 *
 * @see Genus
 */
class GenusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Genus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Genus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
