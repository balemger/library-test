<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "bookauthors".
 *
 * @property int $bookid Ссылка на книгу
 * @property int $authorid Ссылка на автора
 *
 * @property Rauthor $author
 * @property Rbook $book
 */
class Bookauthors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookauthors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bookid', 'authorid'], 'required'],
            [['bookid', 'authorid'], 'integer'],
            [['bookid'], 'exist', 'skipOnError' => true, 'targetClass' => Rbook::className(), 'targetAttribute' => ['bookid' => 'bookid']],
            [['authorid'], 'exist', 'skipOnError' => true, 'targetClass' => Rauthor::className(), 'targetAttribute' => ['authorid' => 'authorid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bookid' => 'Ссылка на книгу',
            'authorid' => 'Ссылка на автора',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery|RauthorQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Rauthor::className(), ['authorid' => 'authorid']);
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery|RbookQuery
     */
    public function getBook()
    {
        return $this->hasOne(Rbook::className(), ['bookid' => 'bookid']);
    }

    /**
     * {@inheritdoc}
     * @return BookauthorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BookauthorsQuery(get_called_class());
    }
}
