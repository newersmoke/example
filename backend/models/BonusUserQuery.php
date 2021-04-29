<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[BonusUser]].
 *
 * @see BonusUser
 */
class BonusUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BonusUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BonusUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
