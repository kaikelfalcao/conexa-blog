<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'post-form',
    'enableAjaxValidation'=>false,
    'action' => Yii::app()->createUrl('post/store'),
    'htmlOptions' => array('class' => 'bg-white px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto')
));

$categoriasModel = new CategoriasModel();
$categorias = $categoriasModel->getCategoriasForm();

?>

<div class="mb-4">
    <?php echo $form->labelEx($model,'titulo'); ?>
    <?php echo $form->textField($model,'titulo',array('required' =>'true', 'class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500', 'size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->error($model,'titulo'); ?>
</div>

<div class="mb-4">
    <?php echo $form->labelEx($model,'resumo'); ?>
    <?php echo $form->textArea($model,'resumo',array('required' =>'true','class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500', 'rows'=>3)); ?>
    <?php echo $form->error($model,'resumo'); ?>
</div>

<div class="mb-4">
    <?php echo $form->labelEx($model,'categoria'); ?>
    <?php echo $form->dropDownList($model,'categoria', CHtml::listData($categorias, 'id', 'nome'), array('required' =>'true','class'=>'w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500', 'empty' => 'Selecione a categoria')); ?>
    <?php echo $form->error($model,'categoria'); ?>
</div>

<div class="mb-4">
    <?php echo $form->labelEx($model,'autor'); ?>
    <?php echo $form->textField($model,'autor',array('required' =>'true','class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500', 'size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->error($model,'autor'); ?>
</div>

<div class="mb-4">
    <?php echo $form->labelEx($model,'corpo'); ?>
    <?php echo $form->textArea($model,'corpo',array('required' =>'true','class'=>'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500', 'rows'=>10)); ?>
    <?php echo $form->error($model,'corpo'); ?>
</div>

<div class="flex items-center justify-between">
    <?php echo CHtml::submitButton('Enviar', array('class'=>'bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline')); ?>
</div>

<?php $this->endWidget(); ?>
