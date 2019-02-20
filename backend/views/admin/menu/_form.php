<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\admin\Menu;
use backend\models\admin\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\admin\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="menu-form">
        <?php $form = ActiveForm::begin([
            'id'=>$model->formName(),
            'enableAjaxValidation'=>true,
            'validationUrl'=>Url::toRoute(Yii::$app->controller->id.'/validation'),
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'parent')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Menu::find()->all(),'id','name') ,
                    'options' => ['placeholder' => 'Select a parent'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'route')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(AuthItem::find()->all(),'name','name') ,
                    'options' => ['placeholder' => 'Select a route'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'order')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'data')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
<?php

$js = <<<JS
$('form#{$model->formName()}').on('beforeSubmit',function(e){
         var \$form = $(this);
         $.post(
             \$form.attr('action'),// serialize yii2 form
             \$form.serialize()
         )
         .done(function(result){
             if (result.code == 200){
                 console.log(result.code)
                 closeForm();
                 $.pjax.reload({container:"#menu-grid",async:false});
             } 
         })
         .fail(function(){
             console.log("server error");
         });
         return false;
 });
JS;
$this->registerJs($js);

