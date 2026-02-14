<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Últimas Noticias</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php if (!empty($posts) && is_array($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            <?= esc($post['title']) ?>
                        </h3>
                        <p class="text-gray-600 mb-4 h-20 overflow-hidden">
                             <?= esc($post['meta_description'] ?: mb_strimwidth(strip_tags($post['content']), 0, 120, "...")) ?>
                        </p>
                        <div class="flex justify-between items-center text-sm text-gray-500 mt-4">
                            <span><?= date('d M, Y', strtotime($post['created_at'])) ?></span>
                            <a href="/blog/<?= esc($post['slug']) ?>" class="text-blue-500 hover:text-blue-700 font-semibold">Leer más →</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-2 text-center py-10 bg-white rounded shadow">
                <p class="text-gray-600 text-lg">No hay artículos publicados aún.</p>
            </div>
        <?php endif; ?>
    </div>

<?= $this->endSection() ?>