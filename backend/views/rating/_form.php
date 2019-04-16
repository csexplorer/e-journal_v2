<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Students;
use backend\models\Teachers;
use backend\models\Subjects;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Rating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Students::find()->all(), 'id', 'fullname'),
        'language' => 'en',
        'options' => [
            'placeholder' => 'Select a student ...',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'teacher_id')->dropDownList(
        ArrayHelper::map(Teachers::find()->all(), 'id', 'fullname'),
        [
            'prompt' => 'Select teacher',
            'onchange' => '
                $.post("index.php?r=subject-teachers/list&teacher_id="+$(this).val(), function(data) {
                    $("select#rating-subject_id").html(data);
                    })
            ',
        ]
    ) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(
        ArrayHelper::map(Subjects::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Subject']
    ) ?>

    <?= $form->field($model, 'mark')->textInput() ?>

    <?= $form->field($model, 'date')->widget(
        DatePicker::className(), [
            'inline' => false,
//                'template' => '<div></div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
