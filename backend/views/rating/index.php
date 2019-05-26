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

	<? if (!empty($ratingSearchParams)) { ?>
        <hr style="border: 1px solid red;">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center rating-search-params"><strong><em><?= $ratingSearchParams[0] ?></em></strong> guruhi talabalarining
                    <strong><em><?= $ratingSearchParams[1] ?></em></strong> fanidan olgan baholari: </h3>
            </div>
        </div>
        <hr style="border: 1px solid red;">
    <? } ?>

    <div class="row">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'teacher_id', [
            'options' => [
                'tag' => 'div',
                'class' => 'col-md-4 col-md-offset-2'
            ]
        ])->dropDownList(
            ArrayHelper::map(Teachers::find()->all(), 'id', 'fullname'),
            ['prompt' => 'Select Teacher']
        ) ?>

        <?= $form->field($model, 'date', [
            'options' => [
                'tag' => 'div',
                'class' => 'col-md-4'
            ]
        ])->widget(DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
             // modify template for custom rendering
            'template' => '{input}{addon}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
        ]);?>

        <div class="col-md-2">
            <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>&nbsp; Search', ['class' => 'btn btn-success btn-block']) ?>
        </div>
        <?php ActiveForm::end(); ?>
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