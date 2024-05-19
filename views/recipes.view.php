<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-4">Recetas</h1>

    <!-- Filtros -->
    <form action="/recetario-php/recipes" method="GET" class="flex flex-col my-10 p-6 bg-white rounded-md">
        <div class="flex items-center justify-between">
            <!-- Opciones de ordenamiento -->
            <div class="flex items-center gap-2">
                <label for="orderBy" class="font-bold">Ordenado por:</label>
                <select name="orderBy" id="orderBy">
                    <option value="">Selecciona una opción</option>
                    <option value="name">Name</option>
                    <option value="preparation_time">Preparation Time</option>
                    <!-- Agregar más opciones de ordenamiento según tus necesidades -->
                </select>
            </div>
            <div class="flex items-center gap-2">
                <label for="orderDirection" class="font-bold">Dirección orden:</label>
                <select name="orderDirection" id="orderDirection">
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <!-- Opciones de filtrado -->
                <label for="category" class="font-bold">Categoria:</label>
                <select name="category" id="category">
                    <option value="">Selecciona una opción</option>
                    <?php foreach ($categories as $categoryOption) : ?>
                    <option value="<?php echo $categoryOption; ?>"><?php echo ucfirst($categoryOption); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <label for="difficulty" class="font-bold">Difficultad:</label>
                <select name="difficulty" id="difficulty">
                    <option value="">Selecciona una opción</option>
                    <?php foreach ($difficultyLevels as $difficultyOption) : ?>
                    <option value="<?php echo $difficultyOption; ?>"><?php echo ucfirst($difficultyOption); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>

        <button type="submit"
            class="text-green-700 bg-green-400 w-28 py-1 px-3 text-center rounded-md mt-5 self-end">Apply
            Filters</button>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($recipes as $recipe) : ?>
        <?php
            $instruction_words = str_word_count($recipe['instructions'], 1);
            $instruction_preview = implode(' ', array_slice($instruction_words, 0, 30));
            ?>
        <a href="/recetario-php/recipe?id=<?php echo $recipe['id']; ?>" class="hover:shadow-lg">
            <div class="bg-white rounded-md overflow-hidden relative shadow-md">
                <div>
                    <img class="w-full h-48 object-cover" src="<?php echo $recipe['image']; ?>"
                        alt="<?php echo $recipe['name']; ?>">
                </div>
                <div class="p-4">
                    <h2 class="text-2xl text-green-400"><?php echo $recipe['name']; ?></h2>
                    <div class="flex justify-between mt-4 mb-4 text-gray-500">
                        <div class="flex items-center text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="ml-1 text-lg"><?php echo $recipe['preparation_time']; ?>m</span>
                        </div>
                        <div class="flex items-center">
                            <span
                                class="ml-1 text-lg font-bold text-green-700"><?php echo ucfirst($recipe['category']); ?></span>
                        </div>
                    </div>
                    <p class="mb-4 text-gray-500 h-24"><?php echo $instruction_preview; ?>...</p>
                    <div class="text-green-700 flex justify-self-end items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M2 0a2 2 0 00-2 2v16a2 2 0 002 2h16a2 2 0 002-2V2a2 2 0 00-2-2H2zm1 4a1 1 0 011-1h12a1 1 0 011 1v1H2V4zm0 4h16v10H2V8zm4-4a1 1 0 00-1 1v2a1 1 0 002 0V9a1 1 0 00-1-1zm6 0a1 1 0 00-1 1v2a1 1 0 002 0V9a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <span
                            class="text-gray-500"><?php echo date('d/m/Y', strtotime($recipe['publish_date'])); ?></span>
                    </div>
                </div>
                <div
                    class="absolute top-0 right-0 mt-4 mr-4 bg-green-400 text-white rounded-full pt-1 pb-1 pl-4 pr-5 text-xs uppercase">
                    <span><?php echo ucfirst($recipe['difficulty_level']); ?></span>
                </div>
            </div>
        </a>
        <?php endforeach; ?>

    </div>

    <!-- Paginación -->
    <div class="w-64 mx-auto flex items-center">
        <div class="w-full flex items-center justify-between my-12">
            <a href="?page=<?php echo $page - 1; ?>"
                class="<?= $page > 1 ? 'text-green-700 bg-green-400' : 'pointer-events-none bg-gray-200 text-gray-400' ?> w-28 py-1 px-3 text-center rounded-md">&larr;
                Anterior</a>
            <a href="?page=<?php echo $page + 1; ?>"
                class="<?= $page < $totalPages ? 'text-green-700 bg-green-400' : 'pointer-events-none bg-gray-200 text-gray-400' ?> w-28 py-1 px-3 text-center rounded-md">Siguiente
                &rarr;</a>
        </div>
    </div>
</main>

<?php require('partials/footer.php') ?>