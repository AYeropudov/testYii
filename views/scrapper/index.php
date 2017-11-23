<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23.11.17
 * Time: 9:02
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?=Html::encode($message)?>
<?php
$form = ActiveForm::begin([
    'id'=>'scrapping-form',
    'options' => ['class' => 'form-inline'],
    'method' => 'POST',
    'action' => '/scrapper/scrap/'
]);
?>
<?=$form->field($model, 'url')->textInput()->label('Ссылка для парсинга')?>
<div class="from-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?=Html::submitButton('Scrap this',['class'=>'btn btn-success'])?>
    </div>
</div>
<?php ActiveForm::end();?>
