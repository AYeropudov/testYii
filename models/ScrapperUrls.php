<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23.11.17
 * Time: 9:59
 */

namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class ScrapperUrls
 * @package app\models
 * @property integer $id
 * @property string $url
 * @property string $created_at
 */

class ScrapperUrls extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return 'scrapping_urls';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'created_at' => 'Created At',
        ];
    }
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['created_at'], 'safe'],
            [['url'], 'string', 'max' => 500],
            [['url'], 'unique'],
        ];
    }
}