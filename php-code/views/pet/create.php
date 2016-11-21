<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pets */

$this->title = 'Create Pets';
$this->params['breadcrumbs'][] = ['label' => 'Pets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
