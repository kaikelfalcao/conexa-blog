<div class="w-1/2 mx-auto">
    <h1 class="text-gray-900 font-bold text-4xl text-center mb-4">
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
        <a class="text-orange-400 hover:text-orange-200" href="/post/?categoria=<?= $post['categoria'] ?>"> <?= $post['categoria'] ?></a>
      </span>
        <span class="text-sm text-gray-600 ml-2">
        <span class="text-sm text-gray-600 mr-2">•</span>
        Por <a class="text-orange-400 hover:text-orange-200" href="/post/?autor=<?= $post["autor"] ?>"><?php echo $post["autor"]; ?></a>
      </span>

        <div class="relative inline-block text-left ml-4">
            <div x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class=" inline-flex items-center px-2 bg-orange-400 text-white rounded-md hover:bg-orange-200 hover:text-white focus:bg-orange-200 focus:text-white">
                    Ações
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 ml-2 -mr-1 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="open" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="/post/edit?id=<?= $post['id']?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Editar</a>
                        <a href="/post/delete?id=<?= $post['id']?>"" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Deletar</a>
                    </div>
                </div>
            </div>
        </div>
</div>

    <div class="mt-4 text-sm w-[85%] mx-auto text-base leading-8 my-5">
        <?= $post['corpo'] ?>
    </div>

    <section class="mt-16 w-[85%] mx-auto">
        <div class="bg-white border rounded-lg p-6">
            <h2 class="text-lg font-bold text-gray-900">Comentários (<?php echo empty($post['comentarios']) ? 0 : count($post['comentarios']); ?>)</h2>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'comentario-form',
                'enableAjaxValidation'=>false,
                'action' => Yii::app()->createUrl('comentario/store'),
            )); ?>

            <div class="mt-4 py-2 mb-4 bg-white rounded-lg rounded-t-lg">
                <div class="mb-4">
                    <?php echo $form->labelEx($model,'nome'); ?>
                    <?php echo $form->textField($model,'nome',array('class'=>'w-full rounded border border-gray-300 bg-white py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200')); ?>
                </div>
                <?php echo $form->hiddenField($model,'idPost', array('value' => $post['id'])); ?>
                <div class="mb-4">
                    <?php echo $form->textArea($model,'corpo',array('required' => 'true','class'=>'h-32 w-full resize-none rounded border border-gray-300 bg-white py-1 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200',"placeholder"=>"Participe da Comunidade, digite algo !")); ?>
                </div>
                <?php if($erros = Yii::app()->user->getFlash('error')): ?>
                    <?php foreach ($erros as $erro): ?>
                        <span class="text-xs text-red-500 mt-10">
                            <?= $erro[0] ?>
                        </span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="flex justify-between mt-4 border-gray-200">
                <?php echo CHtml::submitButton('Comentar', array('class'=>'bg-orange-400 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-orange-600')); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </section>
    <section id="comentarios">
        <?php if($post["comentarios"]) : ?>
            <?php foreach ($post["comentarios"] as $comentario): ?>
                <article class="mt-6 mb-6 w-[85%] mx-auto rounded-lg shadow-xl">
                    <div class="bg-white shadow-md rounded-xl p-6 flex flex-col">
                        <header class="flex items-center mb-4">
                            <img src="https://i.pravatar.cc/150?u=<?=$comentario['username'] ?>" class="w-12 h-12 rounded-full mr-4">
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
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>

<?php echo $this->renderPartial('/components/flash-message'); ?>

