<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "genus".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Pets[] $pets
 */
class Genus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Genus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPets()
    {
        return $this->hasMany(Pets::className(), ['genusId' => 'id']);
    }

    /**
     * @inheritdoc
     * @return GenusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GenusQuery(get_called_class());
    }

    /**
     * Return list of genus
     * @return array
     */
    public static function getList(){
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
