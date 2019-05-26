<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GroupSubjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\backend\models\Groups::find()->all(), 'id', 'name'),
            [
                    'prompt' => 'Select Group'
            ]
    ) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\backend\models\Subjects::find()->all(), 'id', 'name'),
            ['prompt' => 'Select Subject']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
