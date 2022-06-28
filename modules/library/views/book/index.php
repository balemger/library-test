<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\Rbook */

$this->title = $model->booklabel;
$this->params['breadcrumbs'][] = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rbook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bookcode',
            'booklabel',
            'booknotes',
            [
                'attribute'=>'bookimage',
                'value'=>$model->bookimage,
                'format' => ['image',['width'=>'150','height'=>'150']],
            ],
            [
                'attribute'=>'bookauthors',
                'label' => 'Авторы',
                'format' => 'raw',
                'value'=>function($data){
                    $authors_links = '';
                    foreach ($data->bookauthors as $bookauthor) {
                        $authors_links = $authors_links.(Html::a($bookauthor->author->authorlabel,['author/'.$bookauthor->author->authorcode])).'<br>';
                    }
                    return $authors_links;
                }
            ],
        ],
    ]) ?>

</div>
