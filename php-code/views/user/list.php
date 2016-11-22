<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $adoptModel app\models\AdoptForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adopt list';
$this->params['breadcrumbs'][] = $this->title;
$view = $this;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'login',
            'name',
            [
                'label' => 'Adopt',
                'format' => 'raw',
                'value' => function($model) use ($adoptModel, $view){
                    if ($adoptModel->userId != $model->id){
                        $adoptModel = new \app\models\AdoptForm();
                        $adoptModel->userId = $model->id;
                    }
                    return $view->render('/pet/_adopt', [
                        'model' => $model,
                        'adoptModel' => $adoptModel,
                    ]);
                },
            ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
