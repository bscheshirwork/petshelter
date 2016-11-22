<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'genusId' => [
                'attribute' => 'genus.id',
                'label' => (new \app\models\Genus)->getAttributeLabel('name'),
                'value' => 'genus.name',
                'filter'=> \app\models\Genus::getList(),
            ],
            'name',
            'age',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
