<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "rauthor".
 *
 * @property int $authorid ID
 * @property string $authorcode Уникальный код автора
 * @property string $authorlabel Имя автора
 * @property string $authorlife Биография автора
 * @property string $authorDOB Дата рождения автора
 * @property string|null $authorDOD Дата смерти автора
 *
 * @property Bookauthors[] $bookauthors
 */
class Rauthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rauthor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['authorcode', 'authorlabel', 'authorlife', 'authorDOB'], 'required'],
            [['authorDOB', 'authorDOD'], 'safe'],
            [['authorcode'], 'string', 'max' => 6],
            [['authorlabel'], 'string', 'max' => 255],
            [['authorlife'], 'string', 'max' => 510],
            [['authorcode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'authorid' => 'ID',
            'authorcode' => 'Уникальный код автора',
            'authorlabel' => 'Имя автора',
            'authorlife' => 'Биография автора',
            'authorDOB' => 'Дата рождения автора',
            'authorDOD' => 'Дата смерти автора',
        ];
    }

    /**
     * Gets query for [[Bookauthors]].
     *
     * @return \yii\db\ActiveQuery|BookauthorsQuery
     */
    public function getBookauthors()
    {
        return $this->hasMany(Bookauthors::className(), ['authorid' => 'authorid'])->with('book');
    }

    /**
     * {@inheritdoc}
     * @return RauthorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RauthorQuery(get_called_class());
    }
}
