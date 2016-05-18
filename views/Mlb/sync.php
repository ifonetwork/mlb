<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

if (Yii::$app->session->hasFlash("success")) {
    echo "<div class='alert alert-success'>".Yii::$app->session->getFlash('success')."</div>";
}

if (Yii::$app->session->hasFlash("error")) {
    echo "<div class='alert alert-warning'>".Yii::$app->session->getFlash('error')."</div>";
}

?>

<p class="bg-info well"> Click below for start parsing</p>


<?php
$form = ActiveForm::begin();

 
echo $form->field($model, 'name')->hiddenInput(['value' => 'captca'])->label(false);

echo Html::submitButton("Begin updaing Information", ['class' => 'btn btn-success']);

ActiveForm::end();
?>