<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Groups;
use backend\models\Students;
use backend\models\Teachers;
use backend\models\Subjects;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_id')->dropDownList(
    	ArrayHelper::map(Groups::find()->all(), 'id', 'name'),
    	['prompt' => 'Select Group']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
