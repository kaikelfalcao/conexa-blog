<h1 class="text-xl font-bold text-gray-800 text-center">
    <?= $post['titulo'] ?>
</h1>

<div class="flex items-center justify-center">
  <span class="text-sm text-gray-600 mr-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
    </svg>
      <?= $post['dataDePostagem'] ?>
  </span>
    <span class="text-sm text-gray-600 mr-2">•</span>
    <span class="text-sm text-gray-600">
    <?= $post['categoria'] ?>
  </span>
    <span class="text-sm text-gray-600 ml-2">
    <span class="text-sm text-gray-600 mr-2">•</span>
    Por <?= $post['autor'] ?>
  </span>
</div>

<div class="mt-4 text-sm container w-[75%] mx-auto">
    <?= $post['corpo'] ?>
</div>
