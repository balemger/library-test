<?php

namespace app\modules\library\models;

use Yii;
use app\modules\library\models\Rauthors;

/**
 * This is the model class for table "rbook".
 *
 * @property int $bookid ID
 * @property string $bookcode Уникальный код книги
 * @property string $booklabel Название книги
 * @property string $booknotes Описание книги
 * @property string $bookimage Картинка книги
 *
 * @property Bookauthors[] $bookauthors
 */
class Rbook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rbook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bookcode', 'booklabel', 'booknotes', 'bookimage'], 'required'],
            [['bookcode'], 'string', 'max' => 6],
            [['booklabel', 'bookimage'], 'string', 'max' => 255],
            [['booknotes'], 'string', 'max' => 510],
            [['bookcode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bookid' => 'ID',
            'bookcode' => 'Уникальный код книги',
            'booklabel' => 'Название книги',
            'booknotes' => 'Описание книги',
            'bookimage' => 'Картинка книги',
        ];
    }

    /**
     * Gets query for [[Bookauthors]].
     *
     * @return \yii\db\ActiveQuery|BookauthorsQuery
     */
    public function getBookauthors()
    {
        return $this->hasMany(Bookauthors::className(), ['bookid' => 'bookid'])->with('author');
    }

    /**
     * {@inheritdoc}
     * @return RbookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RbookQuery(get_called_class());
    }
}
