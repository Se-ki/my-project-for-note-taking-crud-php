<?php require base_path('view/partial/header.php') ?>

<div class="min-h-full">
    <?php require base_path("view/partial/nav.php") ?>
    <main>
        <?php if ($checkRole == 2) : ?>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <p>Welcome Admin,
                    <?= $_SESSION['user']['email'] ?? "Guest" ?>
                </p>
            </div>
        <?php else : ?>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <p>Welcome,
                    <?= $_SESSION['user']['email'] ?? "Guest" ?>
                </p>
            </div>
        <?php endif ?>
    </main>
</div>

<?php require base_path('view/partial/footer.php') ?>