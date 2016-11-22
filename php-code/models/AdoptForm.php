<?php
/**
 * Created by PhpStorm.
 * User: bogdan
 * Date: 22.11.16
 * Time: 17:29
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the adopt form.
 */
class AdoptForm extends Model
{
    public $userId;
    public $genusId;

    private $_pet;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['userId', 'required'],
            [['genusId'], 'exist', 'skipOnError' => true, 'targetClass' => Genus::className(), 'targetAttribute' => ['genusId' => 'id']],
            ['genusId', 'validateGenusCount'],
        ];
    }

    /**
     * Validates the ready-to-adopt pets.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateGenusCount($attribute, $params)
    {
        if (!$this->hasErrors()) {
            //pdo is faster
            $qb = Pets::find()->with([
                    'petFamilies' => function (PetFamiliesQuery $query) {
                        $query->orderBy(['dateAdoption' => SORT_ASC])->readyToAdept();
                    },
                ]);
            if ($this->genusId)
                $qb = $qb->onlyGenus($this->genusId);
            if (!$this->_pet = $qb->one())
                $this->addError($attribute, 'Incorrect request.');
        }
    }

    /**
     * Adopt valid pet
     * @return bool
     */
    public function adopt(){
        if ($this->validate()){
            return $this->_pet->adopt($this->userId);
        }
        return false;
    }
}