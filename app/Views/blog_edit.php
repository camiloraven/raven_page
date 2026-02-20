<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit: <?= esc($post['title']) ?> | Raven SAS<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-gray-50 dark:bg-black/20 py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        
        <div class="mb-10 text-center">
            <span class="text-accent-gray dark:text-gray-500 font-bold uppercase tracking-[0.3em] text-sm block mb-4">Content Management</span>
            <h2 class="text-3xl md:text-4xl font-display font-medium dark:text-gray-200 leading-tight text-gray-800">
                Edit Article
            </h2>
            <div class="w-16 h-1 bg-primary dark:bg-white mx-auto mt-6"></div>
        </div>

        <div class="bg-white dark:bg-black border border-gray-100 dark:border-gray-800 shadow-xl overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-gray-500 to-primary dark:from-white dark:via-gray-500 dark:to-white opacity-20"></div>
            
            <div class="p-8 md:p-12">
                <?php if (isset($validation)): ?>
                    <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 mb-8">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <span class="material-symbols-outlined text-red-500">error</span>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm text-red-700 dark:text-red-400">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Current image preview -->
                <?php if (!empty($post['image'])): ?>
                    <div class="mb-8 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-800">
                        <img 
                            src="/uploads/blog/<?= esc($post['image']) ?>" 
                            alt="<?= esc($post['title']) ?>" 
                            class="w-full h-48 object-cover"
                        >
                        <div class="bg-gray-50 dark:bg-gray-900 px-4 py-2">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Current featured image</span>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url(service('request')->getLocale() . '/blog/update/' . $post['id']) ?>" method="post" enctype="multipart/form-data" class="space-y-8">
                    <?= csrf_field() ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400">
                                Main Title <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="title" 
                                class="w-full bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:border-primary dark:focus:border-white transition-colors"
                                value="<?= old('title', esc($post['title'])) ?>"
                                required
                                placeholder="Article headline"
                            >
                        </div>

                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary dark:text-white">
                                SEO Title
                            </label>
                            <input 
                                type="text" 
                                name="meta_title" 
                                class="w-full bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:border-primary dark:focus:border-white transition-colors"
                                value="<?= old('meta_title', esc($post['meta_title'])) ?>"
                                placeholder="Optimized title for Google"
                            >
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400">
                            Replace Featured Image <span class="text-xs font-normal normal-case tracking-normal text-gray-400">(leave empty to keep current)</span>
                        </label>
                        <div class="relative group">
                            <input type="file" name="image" class="w-full bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:border-primary dark:focus:border-white transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white hover:file:bg-gray-800 cursor-pointer"accept="image/*">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-primary dark:text-white">
                            Meta Description (SEO)
                        </label>
                        <textarea name="meta_description" class="w-full bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:border-primary dark:focus:border-white transition-colors h-24 resize-none"placeholder="Brief summary for search engines..."><?= old('meta_description', esc($post['meta_description'])) ?></textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400">
                            Keywords
                        </label>
                        <input type="text" name="keywords" class="w-full bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:border-primary dark:focus:border-white transition-colors"value="<?= old('keywords', esc($post['keywords'])) ?>"placeholder="Comma separated: oil, gas, data, ai">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400">
                            Article Content <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content" class="w-full bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:border-primary dark:focus:border-white transition-colors h-96 font-mono text-sm"requiredplaceholder="Write your article in HTML format..."><?= old('content', $post['content']) ?></textarea>
                        <p class="text-xs text-gray-400 text-right">HTML formatting supported</p>
                    </div>

                    <div class="pt-6 border-t border-gray-100 dark:border-gray-800 flex items-center justify-end gap-4">
                        <a href="<?= base_url(service('request')->getLocale() . '/blog/' . esc($post['slug'])) ?>" class="px-8 py-3 bg-transparent border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300 font-bold uppercase tracking-widest text-xs hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="px-8 py-3 bg-primary text-white font-bold uppercase tracking-widest text-xs hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl">
                            Update Article
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
