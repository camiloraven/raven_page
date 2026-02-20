<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= lang('login_t.metaTitle') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-black/40 py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white dark:bg-black border border-gray-100 dark:border-gray-800 p-10 shadow-2xl relative overflow-hidden">
        
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-primary/5 dark:bg-white/5 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-24 h-24 bg-primary/5 dark:bg-white/5 rounded-full blur-2xl"></div>

        <div>
            <h2 class="mt-6 text-center text-3xl font-display font-bold text-gray-900 dark:text-white uppercase tracking-widest">
                <?= lang('login_t.pageTitle') ?>
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                <?= lang('login_t.pageSubtitle') ?>
            </p>
            <div class="w-12 h-1 bg-primary dark:bg-white mx-auto mt-6"></div>
        </div>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <span class="material-symbols-outlined text-red-500">error</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700 dark:text-red-400">
                            <?= session()->getFlashdata('error') ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form class="mt-8 space-y-6" action="<?= base_url(service('request')->getLocale() . '/login/auth') ?>" method="post">
            <?= csrf_field() ?>
            <div class="space-y-5">
                <div>
                    <label for="email-address" class="block text-xs font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2"><?= lang('login_t.emailLabel') ?></label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required 
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 placeholder-gray-400 text-gray-900 dark:text-white dark:bg-black/50 focus:outline-none focus:ring-1 focus:ring-primary dark:focus:ring-white focus:border-primary dark:focus:border-white focus:z-10 sm:text-sm transition-colors" 
                        placeholder="<?= lang('login_t.emailPlaceholder') ?>">
                </div>
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2"><?= lang('login_t.passwordLabel') ?></label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 dark:border-gray-700 placeholder-gray-400 text-gray-900 dark:text-white dark:bg-black/50 focus:outline-none focus:ring-1 focus:ring-primary dark:focus:ring-white focus:border-primary dark:focus:border-white focus:z-10 sm:text-sm transition-colors" 
                        placeholder="<?= lang('login_t.passwordPlaceholder') ?>">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold uppercase tracking-widest text-white bg-primary hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <span class="material-symbols-outlined text-gray-500 group-hover:text-gray-400 transition-colors">lock</span>
                    </span>
                    <?= lang('login_t.signInButton') ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>