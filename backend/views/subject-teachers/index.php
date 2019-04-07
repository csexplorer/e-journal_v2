<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubjectTeachersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subject Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-teachers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Subject Teachers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'subject.name:text:salom',
            [
                'attribute' => 'subject_id',
                'label' => 'Subject',
                'value' => 'subject.name'
            ],
            [
                'attribute' => 'teacher_id',
                'label' => 'Teacher',
                'value' => 'teacher.fullname'
            ],
            // 'teacher_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
