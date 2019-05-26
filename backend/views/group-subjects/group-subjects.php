<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RatingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Subjects';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/rating.css', [
    'depends' => [yii\bootstrap\BootstrapAsset::className()]
]);

?>
<div class="rating-groups">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <? foreach ($subjects as $subject) { ?>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?= $subject->subject->name ?></h3>
                  <p>Teacher Name</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="<?=Url::to(['rating/index', 'group_id' => $subject->group_id, 'subject_id' => $subject->subject->id])?>" class="small-box-footer">
                  Next <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
        <? } ?>
    </div>
</div>
