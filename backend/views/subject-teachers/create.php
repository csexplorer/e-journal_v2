<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectTeachers */

$this->title = 'Create Subject Teachers';
$this->params['breadcrumbs'][] = ['label' => 'Subject Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-teachers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
