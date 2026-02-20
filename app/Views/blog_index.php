<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= lang('blog_t.metaTitle') ?><?= $this->endSection() ?>

<?= $this->section('meta_tags') ?>
    <meta name="description" content="<?= lang('blog_t.metaDescription') ?>">
    <meta name="keywords" content="<?= lang('blog_t.metaKeywords') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <section class="relative w-full overflow-hidden bg-black -mt-24 flex items-center min-h-[50vh] lg:min-h-0" style="aspect-ratio: 16/3.7;">
        <div class="absolute inset-0 z-0">
            <img alt="Raven Hero Image" 
                class="w-full h-full object-cover object-center opacity-60" 
                src="/img/hero_blog.jpg" 
                onerror="this.src='https://placehold.co/1920x1080/111111/333333?text=Hero+Image'"/>
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative z-10 max-w-[1920px] mx-auto px-8 md:px-16 lg:px-32 w-full pt-20">
            <div class="max-w-4xl text-white">
                <img src="/img/logo-dark.jpg" 
                    alt="Raven Logo" 
                    class="h-28 md:h-36 w-auto mb-8 object-contain" 
                    onerror="this.style.display='none'"/>
                <div class="w-24 h-1 bg-white mb-10"></div>
                <p class="text-base sm:text-lg md:text-xl text-gray-200 font-light leading-relaxed mb-12 border-l-4 border-white/50 pl-6 lg:pl-8 max-w-2xl">
                    <?= lang('blog_t.heroSubtitle') ?>
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-[1920px] mx-auto px-8 md:px-16 lg:px-32 py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-700 dark:text-gray-300"><?= lang('blog_t.lastPosts') ?></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php if (!empty($posts) && is_array($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <a href="<?= base_url(service('request')->getLocale() . '/blog/' . esc($post['slug'])) ?>" class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col h-full border border-gray-100 dark:border-gray-700">
                        
                        <div class="aspect-video w-full overflow-hidden bg-gray-100 dark:bg-gray-900 relative">
                            <?php if (!empty($post['image'])): ?>
                                <img 
                                    src="<?= base_url('uploads/blog/' . esc($post['image'])) ?>" 
                                    alt="<?= esc($post['title']) ?>" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                >
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-400 dark:text-gray-600">
                                    <span class="material-symbols-outlined text-5xl">image</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300 mb-3 line-clamp-2 group-hover:text-black dark:group-hover:text-white transition-colors">
                                <?= esc($post['title']) ?>
                            </h3>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100 dark:border-gray-700 flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">calendar_today</span>
                                    <span><?= date('d M, Y', strtotime($post['created_at'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-4 text-center py-10 bg-white dark:bg-gray-800 rounded shadow">
                    <p class="text-gray-600 dark:text-gray-400 text-lg"><?= lang('blog_t.noPosts') ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?= $this->endSection() ?>