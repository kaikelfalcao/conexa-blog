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

<div class="mt-4 text-sm container w-[75%] mx-auto">
    <?= $post['corpo'] ?>
</div>

<div class="bg-white rounded-lg shadow p-6 mt-14">
    <form method="POST" action="/comentarios/store">
        <div class="mt-4">
      <textarea
          name="corpo"
          id="corpo"
          placeholder="Participe da Comunidade, digite algo !"
          class="border border-gray-400 p-2 w-full resize-none focus:ring-blue-500 focus:border-blue-500"
      ></textarea>
        </div>

        <div class="flex justify-between mt-6 pt-6 border-t border-gray-200">
            <div class="flex items-center">
                <label for="nome" class="mr-2 text-sm font-medium">Nome (opcional):</label>
                <input type="text" name="nome" id="nome" class="border border-gray-400 p-2 rounded focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Comentar</button>
        </div>
    </form>
</div>


