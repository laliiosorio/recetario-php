<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <h1>Signup</h1>
    <?php if ($error) : ?>
    <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="/signup" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Signup</button>
    </form>
</main>

<?php require base_path('views/partials/footer.php') ?>