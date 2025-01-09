<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class=" <?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
                        <a href="/training_plans" class="<?= $_SERVER['REQUEST_URI'] === '/training_plans' ? 'bg-gray-900 text-white' : 'text-gray-300' ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Training plans</a>
                        <a href="/add_new_training" class="<?= $_SERVER['REQUEST_URI'] === '/add_new_training' ? 'bg-gray-900 text-white' : 'text-gray-300' ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Add new training</a>
                        <a href="/training_history" class="<?= $_SERVER['REQUEST_URI'] === '/training_history' ? 'bg-gray-900 text-white' : 'text-gray-300' ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Training history</a>
                        <a href="/goals" class="<?= $_SERVER['REQUEST_URI'] === '/goals' ? 'bg-gray-900 text-white' : 'text-gray-300' ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Goals</a>


                        <?php if (!empty($_SESSION)) :?>
                        <a href="/log_out" class="<?= $_SERVER['REQUEST_URI'] === '/log_out' ? 'bg-gray-900 text-white' : 'text-gray-300' ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log out</a>
                        <?php else : ?>
                        <a href="/login" class="<?= $_SERVER['REQUEST_URI'] === '/login' ? 'bg-gray-900 text-white' : 'text-gray-300' ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
