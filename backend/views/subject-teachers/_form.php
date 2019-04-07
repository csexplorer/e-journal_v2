<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Subjects;
use backend\models\Teachers;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectTeachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-teachers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_id')->dropDownList(
    		ArrayHelper::map(Subjects::find()->all(), 'id', 'name'),
    		[
    			'prompt' => 'Select Subject',
    		]
    ) ?>

    <?= $form->field($model, 'teacher_id')->dropDownList(
    		ArrayHelper::map(Teachers::find()->all(), 'id', 'fullname'),
    		[
    			'prompt' => 'Select Teacher',
    		]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
