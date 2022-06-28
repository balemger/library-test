<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\Rauthor */

$this->title = $model->authorlabel;
$this->params['breadcrumbs'][] = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rauthor-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'authorcode',
            'authorlabel',
            'authorlife',
            'authorDOB',
            'authorDOD',
            [
                'attribute'=>'bookauthors',
                'label' => 'Книги автора',
                'format' => 'raw',
                'value'=>function($data){
                    $books_links = '';
                    foreach ($data->getBookauthors()->limit(5)->all() as $bookauthor) {
                        $books_links = $books_links.(Html::a($bookauthor->book->booklabel,['book/'.$bookauthor->book->bookcode])).'<br>';
                    }
                    return $books_links;
                }
            ],
        ],
    ]) ?>

</div>
