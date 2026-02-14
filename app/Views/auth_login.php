<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="max-w-md mx-auto bg-white p-8 border rounded shadow-lg mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center">Acceso Restringido</h2>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="/login/auth" method="post">
        <?= csrf_field() ?>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Contraseña</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700">
            Entrar
        </button>
    </form>
</div>
<?= $this->endSection() ?>