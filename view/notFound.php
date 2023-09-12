<?php require base_path('view/partial/header.php') ?>

<div class="min-h-full">

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Error
                <?= $code ?>
            </h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <h1>
                <?= $error["err"] ?>
            </h1>
            <p>
                <a href="/">Go back home.</a>
            </p>
        </div>
    </main>
</div>
<?php require base_path('view/partial/footer.php') ?>