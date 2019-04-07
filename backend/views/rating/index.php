<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Students;
use backend\models\Groups;
use backend\models\Teachers;
use backend\models\Subjects;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RatingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ratings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rating-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rating', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    

    <div class="row">
        <div class="col-md-12">
            <div class="rating-search-form">
                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'group_id', [
                        'options' => [
                            'tag' => 'div',
                            'class' => 'col-md-2'
                        ]
                    ])->dropDownList(
                        ArrayHelper::map(Groups::find()->all(), 'id', 'name'),
                        ['prompt' => 'Select Group']
                    ) ?>

                    <?= $form->field($model, 'subject_id', [
                        'options' => [
                            'tag' => 'div',
                            'class' => 'col-md-2'
                        ]
                    ])->dropDownList(
                        ArrayHelper::map(Subjects::find()->all(), 'id', 'name'),
                        ['prompt' => 'Select Subject']
                    ) ?>

                    <?= $form->field($model, 'teacher_id', [
                        'options' => [
                            'tag' => 'div',
                            'class' => 'col-md-2'
                        ]
                    ])->dropDownList(
                        ArrayHelper::map(Teachers::find()->all(), 'id', 'fullname'),
                        ['prompt' => 'Select Teacher']
                    ) ?>

                    <div class="col-md-4 form-group">
                        <?= Html::submitButton('Search ', ['class' => 'btn btn-success']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'student_id',
                'value' => 'student.fullname',
                'filter' => ArrayHelper::map(Students::find()->asArray()->all(), 'id', 'fullname'),
                'label' => 'FIO'
            ],
            // [
            //     'attribute' => 'group_id',
            //     'value' => 'group.name',
            //     'filter' => ArrayHelper::map(Groups::find()->asArray()->all(), 'id', 'name'),
            //     'label' => 'Guruhi'
            // ],
            // [
            //     'attribute' => 'teacher_id',
            //     'value' => 'teacher.fullname'
            // ],
            [
                'attribute' => 'subject_id',
                'value' => 'subject.name'
            ],
            [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'mark',
            ],
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
