<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $adoptModel app\models\AdoptForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adopt-form-<?= $model->id;?>">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($adoptModel, 'userId')->hiddenInput()->label(false) ?>
    <?= $form->field($adoptModel, 'genusId')->dropDownList([''=>''] + \app\models\Genus::getList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Adopt =^_^=', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
