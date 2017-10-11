<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Forsale1 */

$this->title = Yii::t('app', 'Create Forsale1');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Forsale1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forsale1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
