<?php 

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   	<?= Html::encode($this->title) ?>
  </h1>
  <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]);
  ?>
</section>

