<?php

namespace app\modules\library\models;

/**
 * This is the ActiveQuery class for [[Bookauthors]].
 *
 * @see Bookauthors
 */
class BookauthorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Bookauthors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Bookauthors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
