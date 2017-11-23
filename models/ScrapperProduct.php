<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scrapper_products".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $title
 * @property string $sku
 * @property double $price
 * @property integer $url_id
 *
 * @property ScrapperProduct $url
 * @property ScrapperProduct[] $scrapperProducts
 */
class ScrapperProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scrapper_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['price'], 'number'],
            [['url_id'], 'integer'],
            [['title', 'sku'], 'string', 'max' => 500],
            [['url_id'], 'exist', 'skipOnError' => true, 'targetClass' => ScrapperProduct::className(), 'targetAttribute' => ['url_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'title' => 'Title',
            'sku' => 'Sku',
            'price' => 'Price',
            'url_id' => 'Url ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrl()
    {
        return $this->hasOne(ScrapperProduct::className(), ['id' => 'url_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScrapperProducts()
    {
        return $this->hasMany(ScrapperProduct::className(), ['url_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ScrapperProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScrapperProductQuery(get_called_class());
    }
}
