<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_families".
 *
 * @property integer $id
 * @property integer $petId
 * @property integer $userId
 * @property string $dateAdoption
 *
 * @property Pets $pet
 * @property Users $user
 */
class PetFamilies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_families';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['petId', 'userId'], 'integer'],
            [['dateAdoption'], 'safe'],
            [['petId'], 'exist', 'skipOnError' => true, 'targetClass' => Pets::className(), 'targetAttribute' => ['petId' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'petId' => 'Pet ID',
            'userId' => 'User ID',
            'dateAdoption' => 'Date Adoption',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPet()
    {
        return $this->hasOne(Pets::className(), ['id' => 'petId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'userId']);
    }

    /**
     * @inheritdoc
     * @return PetFamiliesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PetFamiliesQuery(get_called_class());
    }
}
