<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Students;
use backend\models\Groups;
use backend\models\Teachers;
use backend\models\Subjects;
use yii\helpers\Url;
use yii\web\View;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RatingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ratings';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/rating.css', [
    'depends' => [yii\bootstrap\BootstrapAsset::className()]
]);

?>
<div class="rating-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'group_id', [
                'options' => [
                    'tag' => 'div',
                    'class' => 'col-md-2',
                ]
            ])->dropDownList(
                ArrayHelper::map(Groups::find()->all(), 'id', 'name'),
                [
                        'prompt' => 'Select Group',
                ]
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
                    'class' => 'col-md-4'
                ]
            ])->dropDownList(
                ArrayHelper::map(Teachers::find()->all(), 'id', 'fullname'),
                ['prompt' => 'Select Teacher']
            ) ?>
            <div class="col-md-2">
                <?= $form->field($model, 'date')->widget(
                    DatePicker::className(), [
                        'inline' => false,
                        // 'template' => '<div></div>',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-m-d'
                        ]
                    ]
                ); ?>
            </div>

            <div class="col-md-2">
                <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>&nbsp; Search', ['class' => 'btn btn-success btn-block']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>

    <? if ($isPost) { ?>

    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center"><strong><em><?= $ratingSearchParams[0] ?></em></strong> guruhi talabalarining <strong><em><?= $ratingSearchParams[1] ?></em></strong> sanasida <strong><em><?= $ratingSearchParams[2] ?></em></strong> fanidan olgan baholari: </h4>
        </div>
    </div>

<? } ?>

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
                'filter' => ArrayHelper::map(Students::find()->where(['group_id' => $groupId])->asArray()->all(), 'id', 'fullname'),
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
            // [
            //     'attribute' => 'subject_id',
            //     'value' => 'subject.name'
            // ],
            [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'mark',
            ],
            // 'date',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="btn-group-justified">
                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp; Create Groups', ['groups/create'], ['class' => 'btn btn-danger']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp; Create Subjects', ['subjects/create'], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp; Create Teachers', ['teachers/create'], ['class' => 'btn btn-warning']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp; Create Students', ['students/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp; Create Subject Teachers', ['subject-teachers/create'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
