<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Nuevo Artículo SEO</h2>

    <?php if (isset($validation)): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="/blog/guardar" method="post">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">
                    Título Principal
                </label>
                <input 
                    type="text" 
                    name="title" 
                    class="w-full border p-2 rounded"
                    value="<?= old('title') ?>"
                    required
                >
            </div>

            <div>
                <label class="block text-blue-600 font-bold mb-2">
                    Meta Title (Google)
                </label>
                <input 
                    type="text" 
                    name="meta_title" 
                    class="w-full border p-2 rounded border-blue-200"
                    value="<?= old('meta_title') ?>"
                    placeholder="Opcional: Título optimizado"
                >
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-blue-600 font-bold mb-2">
                Meta Description (SEO)
            </label>
            <textarea 
                name="meta_description" 
                class="w-full border p-2 rounded h-20 border-blue-200"
                placeholder="Resumen corto que aparecerá en Google..."
            ><?= old('meta_description') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-600 text-sm mb-2">
                Keywords (separadas por coma)
            </label>
            <input 
                type="text" 
                name="keywords" 
                class="w-full border p-2 rounded"
                value="<?= old('keywords') ?>"
                placeholder="python, tutorial, data science"
            >
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">
                Contenido del Artículo
            </label>
            <textarea 
                name="content" 
                class="w-full border p-2 rounded h-64"
                required
            ><?= old('content') ?></textarea>
        </div>

        <button 
            type="submit" 
            class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700"
        >
            Publicar
        </button>
    </form>
</div>

<?= $this->endSection() ?>
