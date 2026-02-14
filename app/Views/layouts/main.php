<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($meta_title ?? 'Blog de Raven - Tecnología y Datos') ?></title>
    <meta name="description" content="<?= esc($meta_description ?? 'Blog oficial de Raven sobre desarrollo web y data science.') ?>">
    <meta name="keywords" content="<?= esc($keywords ?? 'tecnología, desarrollo, python, datos') ?>">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen font-sans">
    <nav class="bg-gray-900 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/blog" class="text-2xl font-bold tracking-tight text-blue-400">Raven<span class="text-white">Blog</span></a>
            <?php if (session()->get('isLoggedIn')): ?>
            <a href="/blog/crear" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-sm font-semibold transition">
                + Nuevo Post
            </a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8 flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg-gray-800 text-gray-400 py-6 text-center mt-auto">
        <p>&copy; <?= date('Y') ?> Raven Company. Todos los derechos reservados.</p>
    </footer>

</body>
</html>