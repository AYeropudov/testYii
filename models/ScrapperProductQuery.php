<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ScrapperProduct]].
 *
 * @see ScrapperProduct
 */
class ScrapperProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ScrapperProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ScrapperProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
