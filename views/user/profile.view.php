<?php require 'views/partials/head.php' ?>
<?php require 'views/partials/nav.php' ?>

<main class="h-screen w-full flex items-center py-16">
    <div class="w-full flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
        <div class="hidden lg:block lg:w-1/2 bg-cover" style="background-image:url('img/poke.webp')">
        </div>
        <div class="w-full p-8 lg:w-1/2">
            <p class="text-2xl font-semibold text-gray-700 text-center">Holi!</p>
            <h2 class="text-3xl font-bold text-gray-700 text-center"><?= htmlspecialchars($user['username']) ?></h2>

            <form action="profile" method="POST">
                <div class="mt-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($user['nombre']) ?>" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" required />
                </div>

                <div class="mt-4">
                    <label for="apellidos" class="block text-gray-700 text-sm font-bold mb-2">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" value="<?= htmlspecialchars($user['apellidos']) ?>" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" required />
                </div>

                <div class="mt-4">
                    <div class="flex justify-between">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    </div>
                    <input type="password" id="password" name="password" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" />
                </div>

                <div class="mt-4">
                    <div class="flex justify-between">
                        <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm
                            Password</label>
                    </div>
                    <input type="password" name="confirm_password" id="confirm_password" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" />
                </div>

                <div class="mt-4">
                    <?php if ($error) : ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline"><?php echo $error; ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if ($success) : ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline"><?php echo $success; ?></span>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="mt-8">
                    <button type="submit" class="bg-green-400 text-white font-bold py-2 px-4 w-full rounded hover:bg-green-700">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require 'views/partials/footer.php' ?>