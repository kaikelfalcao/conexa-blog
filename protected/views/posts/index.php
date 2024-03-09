<header class="max-w-xl mx-auto text-center">
    <h1 class="text-4xl">
        Ultimas postagens da <span class="text-orange-500">Conexa</span>
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4 mb-4">
        <!--  Category -->
            <div
            x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }"
            x-on:keydown.escape.prevent.stop="close($refs.button)"
            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
            x-id="['dropdown-button']"
            class="relative"
        >
            <!-- Button -->
            <button
                x-ref="button"
                x-on:click="toggle()"
                :aria-expanded="open"
                :aria-controls="$id('dropdown-button')"
                type="button"
                class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow"
            >
                Categorias

                <!-- Heroicon: chevron-down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Panel -->
            <div
                x-ref="panel"
                x-show="open"
                x-transition.origin.top.left
                x-on:click.outside="close($refs.button)"
                :id="$id('dropdown-button')"
                style="display: none;"
                class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
            >
                <a href="/index.php/posts" class="flex gap-2 first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50">
                    Todos
                </a>
                <?php foreach ($categorias as $categoria): ?>
                <a href="?categoria=<?php
                $params = $_GET;
                unset($params['categoria']);
                echo $categoria . "&" . http_build_query($params)
                ?> "
                   class="flex gap-2 first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50">
                    <?php echo $categoria; ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</header>

<div>
<?php if (empty($posts)) : ?>

<p class="font-semibold text-center mt-10 mb-4"> Nenhum post encontrado, volte aqui mais tarde !</p>

<?php endif; ?>

<?php foreach ($posts as $post): ?>
<section class="bg-white rounded-lg shadow-md mb-8">
    <header class="py-4 px-6 border-b border-gray-200">
        <h2 class="text-xl font-bold text-gray-800">
            <?= $post["titulo"]; ?>
        </h2>
        <div class="flex items-center mt-2">
      <span class="text-sm text-gray-600 mr-2">
        <?= $post["categoria"]; ?>
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
        Por <a href="?autor=<?= $post["autor"] ?>"><?php echo $post["autor"]; ?></a>
      </span>
        </div>
    </header>
    <div class="py-6 px-6">
        <?= $post["resumo"]; ?>
    </div>
    <footer class="py-4 px-6 border-t border-gray-200">
        <a href="/posts/show?id=<?= $post["id"] ?>" class="text-sm font-medium text-blue-600 hover:underline">
            Ler mais...
        </a>
    </footer>
</section>
<?php endforeach; ?>


