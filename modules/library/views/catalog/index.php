<?php

use app\modules\library\models\Rbook;
use app\modules\library\models\Rauthor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbook-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'booklabel',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->booklabel,['book/'.$data->bookcode]);
                },
            ],
            [
                'attribute' => 'authors',
                'label' => 'Авторы',
                'format' => 'raw',
                'content'=>function($data){
                    $authors_links = '';
                    foreach ($data->bookauthors as $bookauthor) {
                        $authors_links = $authors_links.(Html::a($bookauthor->author->authorlabel,['author/'.$bookauthor->author->authorcode])).'<br>';
                    }
                    return $authors_links;
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
