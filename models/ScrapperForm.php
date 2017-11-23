<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23.11.17
 * Time: 9:14
 */

namespace app\models;


use yii\base\Model;

class ScrapperForm extends Model
{
    protected $url;

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function rules()
    {
        return [[['url'], 'required']];
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

}