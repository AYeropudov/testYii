<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scrapping_urls".
 *
 * @property integer $id
 * @property string $url
 * @property string $created_at
 */
class ScrappingUrls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scrapping_urls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['created_at'], 'safe'],
            [['url'], 'string', 'max' => 500],
            [['url'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @inheritdoc
     * @return ScrappingUrlsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScrappingUrlsQuery(get_called_class());
    }
}
