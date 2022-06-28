<?php

namespace app\modules\library\models;

/**
 * This is the ActiveQuery class for [[Rbook]].
 *
 * @see Rbook
 */
class RbookQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Rbook[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Rbook|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
