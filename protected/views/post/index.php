<header class="max-w-xl mx-auto text-center">
    <span class="font-semibold text-lg text-primary block text-orange-400"
    > Conexa
   </span>
    <h3
        class="font-semibold text-3xl mb-4"
    > Nossas Postagens Recentes
    </h3>
    <p class="text-base text-body-color">
        There are many variations of passages of Lorem Ipsum available
        but the majority have suffered alteration in some form.
    </p>

    <div x-data="{ open: false }" class="relative inline-flex mt-4 mb-4 mr-10">
        <button @click="open = !open" class=" inline-flex px-2 py-2 bg-orange-400 text-white rounded-md hover:bg-orange-200 hover:text-white focus:bg-orange-200 focus:text-white">
            Categorias
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 ml-2 -mr-1 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <a href="/post" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Todos</a>
                <?php foreach ($categorias as $categoria): ?>
                    <a href="?categoria=<?= $categoria['categoria'] . "&" . http_build_query(array_diff_key($_GET, ['categoria' => ''])); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                        <?= $categoria['categoria'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <a href="/post/create" class="inline-flex items-center px-4 py-2 bg-orange-400 text-white font-bold rounded-md hover:bg-orange-200 hover:text-white focus:bg-orange-200 focus:text-white">
        Criar Post
    </a>

</header>

<div>
<?php if (empty($posts)) : ?>

<p class="font-semibold text-center mt-10 mb-4"> Nenhum post encontrado, volte aqui mais tarde !</p>

<?php endif; ?>

<?php foreach ($posts as $post): ?>
<section class="bg-white rounded-lg shadow mb-8" id="comentarios">
    <header class="py-4 px-6 border-b border-gray-200">
        <h2 class="text-xl font-bold text-gray-800">
            <?= $post["titulo"]; ?>
        </h2>
        <div class="flex items-center mt-2">
      <span class="text-sm text-gray-600 mr-2">
        <a href="?categoria=<?= $post["categoria"] ?>"> <?= $post["categoria"]; ?></a>
      </span>
            <span class="text-sm text-gray-600 mr-2">•</span>
            <span class="text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
            </svg>
        <?php
        $formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'America/Sao_Paulo', IntlDateFormatter::GREGORIAN);

        echo $formatter->format(new DateTime($post["dataDePostagem"]));
        ?>
      </span>
      <span class="text-sm text-gray-600 ml-2">
          <span class="text-sm text-gray-600 mr-2">•</span>
        Por <a href="?autor=<?= $post["autor"] ?>"><?php echo $post["autor"]; ?></a>
      </span>
        </div>
    </header>
    <div class="py-6 px-6">
        <?= $post["resumo"]; ?>
    </div>
    <footer class="py-4 px-6 border-t border-gray-200">
        <a href="/post/show?id=<?= $post["id"] ?>" class="text-orange-400 hover:text-orange-300">
            Ler mais
        </a>
    </footer>
</section>
<?php endforeach; ?>


