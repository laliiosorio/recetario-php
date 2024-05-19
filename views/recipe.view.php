<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main class="min-h-dvh md:flex justify-center items-center">
    <?php if (!empty($recipe)) : ?>
    <article class="bg-[#fff] md:my-[5rem] md:py-8 pb-8 md:rounded-xl md:max-w-screen-md">
        <picture>
            <img src="<?php echo $recipe['image']; ?>" alt="<?php echo $recipe['name']; ?>" width="1312" height="600"
                class="md:max-w-[90%] md:mx-auto md:rounded-xl" />
        </picture>
        <div class="px-8 font-outfit text-wenge-brown">
            <div class="flex items-center justify-between mt-4 mb-4">
                <h1 class="font-fancy text-4xl text-green-400">
                    <?php echo $recipe['name']; ?>
                </h1>
                <div class="h-fit mt-4 mr-4 bg-green-400 text-white rounded-full pt-1 pb-1 pl-4 pr-5 text-xs uppercase">
                    <span><?php echo ucfirst($recipe['difficulty_level']); ?></span>
                </div>
            </div>
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

                <div class="text-green-700 flex justify-self-end items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M2 0a2 2 0 00-2 2v16a2 2 0 002 2h16a2 2 0 002-2V2a2 2 0 00-2-2H2zm1 4a1 1 0 011-1h12a1 1 0 011 1v1H2V4zm0 4h16v10H2V8zm4-4a1 1 0 00-1 1v2a1 1 0 002 0V9a1 1 0 00-1-1zm6 0a1 1 0 00-1 1v2a1 1 0 002 0V9a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-500"><?php echo date('d/m/Y', strtotime($recipe['publish_date'])); ?></span>
                </div>
            </div>
            <div class="mt-8">
                <h3 class="font-fancy text-2xl text-nutmeg">Ingredientes</h3>
                <ul class="list-disc marker:text-nutmeg mt-4 ml-6 text-dge-brown marker:align-middle">
                    <?php foreach (explode(', ', $recipe['ingredients']) as $ingredient) : ?>
                    <li class="pl-4"><?php echo $ingredient; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="mt-8">
                <h3 class="font-fancy text-2xl text-nutmeg">Preparación</h3>
                <ol class="marker:text-nutmeg marker:font-semibold marker:font-outfit list-decimal mt-4 ml-6">
                    <?php $instructions = explode('. ', $recipe['instructions']); ?>
                    <?php foreach ($instructions as $instruction) : ?>
                    <li class="pl-4"><?php echo $instruction; ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </article>
    <?php else : ?>
    <div class="text-center mt-8">
        <p class="text-xl font-semibold text-red-600">No se encontró la receta.</p>
    </div>
    <?php endif; ?>
</main>

<?php require('partials/footer.php') ?>