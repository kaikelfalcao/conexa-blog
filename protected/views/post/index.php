<div class="flex flex-col justify-center items-center bg-white">
    <header class="mx-auto text-center mt-2">
        <span class="font-semibold text-lg text-primary block text-orange-400"
        >Blog</span>
        <h3
            class="font-semibold text-3xl mb-4"
        >Nossas Postagens</h3>
        <p class="text-base text-body-color">
            Ultimas postagens de diversos temas sobre o que está acontecendo.
        </p>

        <div x-data="{ open: false }" class="relative inline-flex mt-6 mb-4 mr-10">
            <button @click="open = !open" class=" inline-flex px-2 py-2 bg-orange-400 text-white rounded-md hover:bg-orange-200 hover:text-white focus:bg-orange-200 focus:text-white">
                Categorias
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 ml-2 -mr-1 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="/post" class="block px-4 py-2 text-bold text-sm text-gray-700 hover:bg-gray-100 hover:text-orange-400">Todos</a>
                    <?php foreach ($categorias as $categoria): ?>
                        <a href="?categoria=<?= $categoria['categoria'] . "&" . http_build_query(array_diff_key($_GET, ['categoria' => ''])); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-orange-400" role="menuitem">
                            <?= $categoria['categoria'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <a href="/post/create" class="inline-flex items-center px-4 py-2 bg-orange-400 text-white rounded-md hover:bg-orange-200 hover:text-white focus:bg-orange-200 focus:text-white">
            Criar Post
        </a>

    </header>

    <div class="mt-4" id="posts">
    <?php if (empty($posts)) : ?>

    <p class="font-semibold text-center mt-10"> Nenhum post encontrado, <a href="/" class="text-orange-400 hover:text-orange-200">Volte para todos os Posts</a></p>

    <?php endif; ?>
        <section class="flex flex-col flex-wrap mx-auto mb-6">
        <?php foreach ($posts as $post): ?>
            <div class="flex flex-row bg-white shadow-2xl text-gray-100 mt-6 mb-6">
                <a href="/post/show?id=<?= $post["id"] ?>">
                    <img class="rounded-l-lg h-full w-full" src="https://picsum.photos/id/<?=$post['id']?>/300/200" alt="" />
                </a>
                <main>
                    <div class="max-w-4xl px-10 py-6 mx-auto rounded-lg">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
                                </svg>
                                <?php
                                    $formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'America/Sao_Paulo', IntlDateFormatter::GREGORIAN);
                                    echo $formatter->format(new DateTime($post["dataDePostagem"]));
                                ?>
                            </span>
                            <a rel="noopener noreferrer"
                               href="?categoria=<?= $post["categoria"] ?>"
                               class="px-2 py-1 font-bold rounded bg-orange-400 text-white hover:bg-orange-200"
                            ><?= $post["categoria"] ?></a>
                        </div>
                        <div class="mt-3">
                            <a rel="noopener noreferrer"
                               href="/post/show?id=<?= $post["id"] ?>"
                               class="text-2xl font-bold text-orange-400 hover:underline"
                            ><?= $post["titulo"]; ?></a>
                            <p class="mt-2 text-black"
                            ><?= $post["resumo"] ?></p>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <a rel="noopener noreferrer" href="/post/show?id=<?= $post["id"] ?>" class="hover:underline pt-2 pb-6 space-x-2 text-orange-400 inline-flex items-center justify-center">
                                <span>Ler mais</span>
                            </a>
                            <div class="flex inline-flex items-center">
                                <a rel="noopener noreferrer" href="?autor=<?= $post["autor"] ?>" class="flex items-center text-orange-300">
                                    <img src="https://i.pravatar.cc/150?u=<?=$post['autor'] ?>" alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full ">
                                    <span class="hover:underline text-black"><?= $post["autor"] ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <?php endforeach; ?>
        </section>

    </div>

    <?php echo $this->renderPartial('/components/flash-message'); ?>


