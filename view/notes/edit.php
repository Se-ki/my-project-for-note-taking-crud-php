<?php require base_path('view/partial/header.php') ?>

<div class="min-h-full">

    <?php require base_path("view/partial/nav.php") ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
            <form action="" method="POST">
                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Update Body</label>
                    <div class="mt-2">
                        <textarea id="about" name="body" placeholder="Here's an idea for a note..." rows="3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body'] ?? "" ?></textarea>
                        <p class="text-red-500">
                            <?= $errors['body'] ?? "" ?>
                        </p>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <input type="hidden" name="_method" value="PATCH">

                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end">
                    <a href="/notes"
                        class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </form>

        </div>
    </main>
</div>
<?php require base_path('view/partial/footer.php') ?>