<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pets".
 *
 * @property integer $id
 * @property integer $genusId
 * @property integer $name
 * @property double $age
 *
 * @property PetFamilies[] $petFamilies
 * @property Genus $genus
 */
class Pets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genusId', 'name'], 'integer'],
            [['age'], 'number'],
            [['genusId'], 'exist', 'skipOnError' => true, 'targetClass' => Genus::className(), 'targetAttribute' => ['genusId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genusId' => 'Genus ID',
            'name' => 'Name',
            'age' => 'Age',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetFamilies()
    {
        return $this->hasMany(PetFamilies::className(), ['petId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenus()
    {
        return $this->hasOne(Genus::className(), ['id' => 'genusId']);
    }

    /**
     * @inheritdoc
     * @return PetsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PetsQuery(get_called_class());
    }
}