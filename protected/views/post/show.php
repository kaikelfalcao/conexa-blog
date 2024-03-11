<h1 class="text-xl font-bold text-gray-800 text-center">
    <?= $post['titulo'] ?>
</h1>

<div class="flex items-center justify-center">
  <span class="text-sm text-gray-600 mr-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
    </svg>
      <?php
      $formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'America/Sao_Paulo', IntlDateFormatter::GREGORIAN);

      echo $formatter->format(new DateTime($post["dataDePostagem"]));
      ?>
  </span>
    <span class="text-sm text-gray-600 mr-2">•</span>
    <span class="text-sm text-gray-600">
    <a href="?categoria=<?= $post['categoria'] ?>"> <?= $post['categoria'] ?></a>
  </span>
    <span class="text-sm text-gray-600 ml-2">
    <span class="text-sm text-gray-600 mr-2">•</span>
    Por <a href="?autor=<?= $post["autor"] ?>"><?php echo $post["autor"]; ?></a>
  </span>
</div>

<div class="mt-4 text-sm w-[75%] mx-auto">
    <?= $post['corpo'] ?>
</div>

<section class="mt-12 w-[85%] mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Comentários (<?php echo empty($post['comentarios']) ? 0 : count($post['comentarios']); ?>)</h2>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'comentario-form',
            'enableAjaxValidation'=>false,
            'action' => Yii::app()->createUrl('comentario/store'),
        )); ?>

        <div class="mt-4 py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg">
            <?php echo $form->labelEx($model,'nome'); ?>
            <?php echo $form->textField($model,'nome',array('class'=>'border border-gray-400 rounded focus:ring-blue-500 focus:border-blue-500')); ?>

            <?php echo $form->hiddenField($model,'idPost', array('value' => $post['id'])); ?>

            <?php echo $form->textArea($model,'corpo',array('required' => 'true','class'=>'mt-6 px-0 w-full text-sm text-gray-900 border border-radius min-h-20 focus:ring-0',"placeholder"=>"Participe da Comunidade, digite algo !")); ?>

            <?php if($erros = Yii::app()->user->getFlash('error')): ?>
                <?php foreach ($erros as $erro): ?>
                    <span class="text-xs text-red-500 mt-10">
                        <?= $erro[0] ?>
                    </span>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="flex justify-between mt-4 border-t border-gray-200">
            <?php echo CHtml::submitButton('Comentar', array('class'=>'bg-orange-400 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-orange-600')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>

    <?php if($post["comentarios"]) : ?>
        <?php foreach ($post["comentarios"] as $comentario): ?>
            <div class="bg-white shadow-md rounded-xl p-6 flex flex-col mt-4">
                <header class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/150?u=<?=$post['id']?>" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h3 class="font-bold text-lg"><?=$comentario['username'] ?></h3>
                        <time class="text-gray-500 text-sm">
                            <?php
                            $formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'America/Sao_Paulo', IntlDateFormatter::GREGORIAN);
                            echo $formatter->format(new DateTime($comentario["dataDeCriacao"]));
                            ?>
                        </time>
                    </div>
                </header>
                <p class="text-gray-700"><?=$comentario['texto'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>


