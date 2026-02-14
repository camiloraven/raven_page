<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<article class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-sm">
    <header class="mb-6">
        <h1 class="text-4xl font-bold text-gray-900 mb-2"><?= esc($post['title']) ?></h1>
        <div class="text-sm text-gray-500">
            Publicado el <?= date('d M, Y', strtotime($post['created_at'])) ?>
        </div>
    </header>

    <div class="prose lg:prose-xl text-gray-700 leading-relaxed">
        <?= nl2br(esc($post['content'])) ?>
    </div>

    <div class="mt-8 pt-8 border-t border-gray-100">
        <a href="/blog" class="text-blue-600 hover:underline">← Volver al listado</a>
    </div>
</article>

<?= $this->endSection() ?>