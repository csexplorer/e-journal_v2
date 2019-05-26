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

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/css/rating.css', [
    'depends' => [yii\bootstrap\BootstrapAsset::className()]
]);

?>
<div class="rating-groups">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <? foreach ($groups as $group) { ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= $group->name ?></h3>

                  <!-- <p>New Orders</p> -->
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?=Url::to(['group-subjects/group-subjects', 'group_id' => $group->id])?>" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
        <? } ?>
    </div>

    
    
       
</div>
