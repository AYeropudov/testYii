<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23.11.17
 * Time: 9:00
 */

namespace app\controllers;


use app\models\ScrapperForm;
use app\models\ScrapperProduct;
use app\models\ScrapperUrls;
use keltstr\simplehtmldom\SimpleHTMLDom;
use yii\db\Exception;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class ScrapperController extends Controller
{
    public function actionIndex(){
        $formModel  = new ScrapperForm();
        return $this->render('index', ['message' => 'test', 'model'=>$formModel]);
    }

    public function actionScrap()
    {
        $model = new ScrapperForm();
        if ($model->load(\Yii::$app->request->post())){
            $url = ScrapperUrls::find()->where(['url'=>$model->getUrl()])->exists();
            if ($url) {
                $url = ScrapperUrls::findOne(['url'=>$model->getUrl()]);
            } else {
                $url->url=$model->getUrl();
            }
            if ($url->isNewRecord){
               if(!$url->save()){
                   return $this->goBack();
               }
            }
            /** @var ScrapperProduct $product */
            if($product = $this->startScrap($url)) {
                if ($product->save()) {
                    return $this->render('scrap',
                        ['message' => 'Scrap result', 'url' => $model->getUrl(), 'product' => $product]);
                } else{
                    return $this->render('scrap',
                        ['message' => 'Scrap result', 'url' => $model->getUrl(), 'product' => []]);
                }
            } else{
                return $this->render('scrap',
                    ['message' => 'Scrap result', 'url' => $model->getUrl(), 'product' => []]);
            }

        }
        return $this->goBack();
    }

    /**
     * @param ScrapperUrls $url
     * @return ScrapperProduct|bool
     */
    protected function startScrap($url){
        $_content = file_get_contents($url->url);
       $page_source = SimpleHTMLDom::str_get_html($_content);
       try{
           $product_price_el = $page_source->find("span.price-value");
           $product_id_el = $page_source->find('span.codeToOrder');
           $product_title_el = $page_source->find("h1[itemprop='name']");

           return $this->prepareProduct([
               'price' => floatval(str_replace(' ', '', $product_price_el[0]->plaintext)),
               'sku' => $product_id_el[0]->plaintext,
               'title' => trim($product_title_el[0]->plaintext),
               'url_id' => $url->getPrimaryKey()
           ]);
       } catch (\Exception $e){
           return false;
       }
    }

    /**
     * @param array $arr
     * @return ScrapperProduct
     */
    protected function prepareProduct($arr){
        $newProduct = new ScrapperProduct();

        foreach ($arr as $key=>$value){
            if ($value) {
                $newProduct->setAttribute($key, $value);
            }
        }
        return $newProduct;
    }
}