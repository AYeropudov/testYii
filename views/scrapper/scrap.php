<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23.11.17
 * Time: 9:02
 */
use yii\helpers\Html;
?>

<h1><?=Html::encode($message)?></h1>
<?=Html::encode($url)?>
<p><?=Html::encode($product->price)?></p>

<p><?=Html::encode($product->sku)?></p>
<p><?=Html::encode($product->title)?></p>
