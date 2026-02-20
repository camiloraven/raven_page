<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($post['title']) ?><?= $this->endSection() ?>

<?= $this->section('meta_tags') ?>
    <meta name="description" content="<?= esc($post['meta_description'] ?: mb_strimwidth(strip_tags($post['content']), 0, 150, "...")) ?>">
    <!-- OG Tags for Post -->
    <meta property="og:title" content="<?= esc($post['title']) ?>">
    <meta property="og:description" content="<?= esc($post['meta_description'] ?: mb_strimwidth(strip_tags($post['content']), 0, 150, "...")) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<article class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-sm">
    <header class="mb-6">
        <h1 class="text-4xl font-bold text-gray-900 mb-2"><?= esc($post['title']) ?></h1>
        <div class="text-sm text-gray-500 mb-6">
            Publicado el <?= date('d M, Y', strtotime($post['created_at'])) ?>
        </div>
        <div class="mb-8 rounded-lg overflow-hidden shadow-sm">
            <img src="/uploads/blog/<?= esc($post['image']) ?>" alt="<?= esc($post['title']) ?>" class="w-full h-auto object-cover">
            <?php if (session()->get('isLoggedIn')): ?>
                <div class="bg-gray-100 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 px-4 py-2 flex items-center justify-between">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400">
                        <span class="material-symbols-outlined text-sm align-middle mr-1">lock</span>                            
                        Solo el admin puede ver este mensaje
                    </span>
                <div class="flex items-center gap-3">
                <a href="<?= base_url(service('request')->getLocale() . '/blog/edit/' . $post['id']) ?>" class="p-1 text-gray-500 hover:text-primary dark:hover:text-white transition-colors" title="Editar">
                    <span class="material-symbols-outlined text-lg">edit</span>
                </a>
                <button class="p-1 text-gray-500 hover:text-red-500 transition-colors" title="Eliminar" onclick="if(confirm('¿Estás seguro de que deseas eliminar este artículo? Esta acción no se puede deshacer.')){document.getElementById('delete-form').submit()}">
                    <span class="material-symbols-outlined text-lg">delete</span>
                </button>
                <form id="delete-form" action="<?= base_url(service('request')->getLocale() . '/blog/delete/' . $post['id']) ?>" method="post" class="hidden">
                    <?= csrf_field() ?>
                </form>
            </div>
            </div>
            <?php endif; ?>
        </div>
    </header>
    
    <div class="prose lg:prose-xl dark:prose-invert mx-auto">
        <?= $post['content'] ?>
    </div>

    <div class="mt-8 pt-8 border-t border-gray-100">
        <a href="href="<?= base_url(service('request')->getLocale() . '/blog') ?>" class="text-blue-600 hover:underline">← Volver al listado</a>
        
    </div>
</article>

<?= $this->endSection() ?>