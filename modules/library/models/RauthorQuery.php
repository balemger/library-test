<?php

namespace app\modules\library\models;

/**
 * This is the ActiveQuery class for [[Rauthor]].
 *
 * @see Rauthor
 */
class RauthorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Rauthor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Rauthor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
