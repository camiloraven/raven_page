<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Default Title if not set by view -->
        <title><?= $this->renderSection('title') ?></title>
        
        <!-- Individual Page Meta Tags (Description, Keywords, OG, etc.) -->
        <?= $this->renderSection('meta_tags') ?>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

        <link rel="apple-touch-icon" sizes="180x180" href="/icons/180x180.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/icons/32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/icons/16x16.png">
        <link rel="shortcut icon" href="/icons/favicon.ico">
        <meta name="msapplication-TileColor" content="#0a0a0a">
        <meta name="theme-color" content="#0a0a0a">

        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            primary: "#111111",
                            "background-light": "#ffffff",
                            "background-dark": "#0a0a0a",
                            "accent-gray": "#666666"
                        },
                        fontFamily: {
                            sans: ["Inter", "sans-serif"],
                            display: ["Montserrat", "sans-serif"],
                        }
                    },
                },
            };
        </script>
        
        <style type="text/tailwindcss">
            @layer utilities {
                .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
                .dropdown:hover .dropdown-menu { display: block; }
                /* Solo el Hero mantiene la proporción cinematográfica */
                @media (min-width: 1024px) {
                    .hero-16-9 { min-height: 56.25vw; }
                }
            }
        </style>
    </head>

    <body class="bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100 antialiased transition-colors duration-300 pt-24">
        <nav class="fixed top-0 left-0 w-full z-50 bg-white/90 dark:bg-black/90 backdrop-blur-md border-b border-gray-100 dark:border-gray-800">
            <div class="max-w-[1920px] mx-auto px-8 md:px-16 lg:px-32 h-19 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="/" class="flex items-center gap-4">
                        <div class="relative h-12">
                            <img alt="Logo RAVEN" class="h-12 w-auto dark:hidden" src="/img/logo-light.jpg" onerror="this.src='https://placehold.co/40x40/000000/FFFFFF?text=R'"/>
                            <img alt="Logo RAVEN" class="h-12 w-auto hidden dark:block" src="/img/logo-dark.jpg" onerror="this.src='https://placehold.co/40x40/FFFFFF/000000?text=R'"/>
                        </div>
                        <span class="font-display font-extrabold text-3xl tracking-tighter uppercase">Raven</span>
                    </a>
                </div>
                <div class="flex items-center gap-6 lg:gap-12">            
                    <div class="hidden md:flex items-center gap-12 text-sm font-bold uppercase tracking-widest">
                        <a class="hover:text-accent-gray transition-colors" href="/#about"><?= lang('navbar_t.whoWeAre') ?></a>
                        <div class="relative dropdown group">
                            <button class="flex items-center gap-1 hover:text-accent-gray transition-colors uppercase tracking-widest font-bold">
                                <?= lang('navbar_t.services') ?> <span class="material-symbols-outlined text-sm">expand_more</span>
                            </button>
                            <div class="dropdown-menu hidden absolute top-full left-0 w-48 bg-white dark:bg-black border border-gray-100 dark:border-gray-800 shadow-xl py-4">
                                <a class="block px-6 py-2 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors" href="/#offering"><?= lang('navbar_t.consultancy') ?></a>
                                <a class="block px-6 py-2 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors" href="/#synthetic-data"><?= lang('navbar_t.syntheticData') ?></a>
                            </div>
                        </div>
                        <a class="hover:text-accent-gray transition-colors" href="/#contact"><?= lang('navbar_t.contactUs') ?></a>
                        <a class="px-6 py-3 bg-primary text-white hover:bg-gray-800 transition-all rounded-sm" href="<?= base_url(service('request')->getLocale() . '/blog') ?>"><?= lang('navbar_t.blog') ?></a>
                        <?php if (session()->get('isLoggedIn')): ?>
                            <a href="<?= base_url(service('request')->getLocale() . '/blog/create') ?>" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-3 font-bold uppercase tracking-widest text-xs transition-all duration-300">
                                <?= lang('navbar_t.newPost') ?>
                            </a>
                        <?php endif; ?>
                        <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-colors flex items-center justify-center" 
                            onclick="document.documentElement.classList.toggle('dark')">
                            <span class="material-symbols-outlined block dark:hidden text-2xl">dark_mode</span>
                            <span class="material-symbols-outlined hidden dark:block text-2xl">light_mode</span>
                        </button>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 text-gray-900 dark:text-white" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <span class="material-symbols-outlined text-3xl">menu</span>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Overlay -->
            <div id="mobile-menu" class="hidden fixed top-20 left-0 w-full bg-white/90 dark:bg-black/90 backdrop-blur-md border-b border-gray-100 dark:border-gray-800 p-8 flex flex-col gap-6 shadow-xl md:hidden h-[calc(100vh-5rem)] overflow-y-auto z-40">
                <a class="block w-full text-xl font-bold uppercase tracking-widest text-gray-900 dark:text-white hover:text-accent-gray transition-colors" href="/#about" onclick="document.getElementById('mobile-menu').classList.add('hidden')"><?= lang('navbar_t.whoWeAre') ?></a>
                
                <div class="flex flex-col gap-4">
                    <span class="block w-full text-xl font-bold uppercase tracking-widest text-gray-900 dark:text-white"><?= lang('navbar_t.services') ?></span>
                    <a class="pl-4 block w-full text-xl font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors" href="/#offering" onclick="document.getElementById('mobile-menu').classList.add('hidden')"><?= lang('navbar_t.consultancy') ?></a>
                    <a class="pl-4 block w-full text-xl font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors" href="/#synthetic-data" onclick="document.getElementById('mobile-menu').classList.add('hidden')"><?= lang('navbar_t.syntheticData') ?></a>
                </div>

                <a class="block w-full text-xl font-bold uppercase tracking-widest text-gray-900 dark:text-white hover:text-accent-gray transition-colors" href="/#contact" onclick="document.getElementById('mobile-menu').classList.add('hidden')"><?= lang('navbar_t.contactUs') ?></a>
                <a class="block w-full text-xl font-bold uppercase tracking-widest text-gray-900 dark:text-white hover:text-accent-gray transition-colors" href="/blog" onclick="document.getElementById('mobile-menu').classList.add('hidden')"><?= lang('navbar_t.blog') ?></a>

                <div class="h-[1px] bg-gray-100 dark:bg-gray-800 my-2"></div>

                <div class="flex justify-center w-full py-4">
                    <button class="p-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-full transition-colors flex items-center justify-center" 
                        onclick="document.documentElement.classList.toggle('dark')">
                        <span class="material-symbols-outlined block dark:hidden text-3xl">dark_mode</span>
                        <span class="material-symbols-outlined hidden dark:block text-3xl">light_mode</span>
                    </button>
                </div>

                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url(service('request')->getLocale() . '/blog/create') ?>" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-4 font-bold uppercase tracking-widest text-center transition-all duration-300 mt-4 rounded-sm">
                        <?= lang('navbar_t.newPost') ?>
                    </a>
                <?php endif; ?>
            </div>
        </nav>    

        
        <main class="w-full">
            <?= $this->renderSection('content') ?>
        </main>

        <footer class="pt-24 pb-12 bg-white dark:bg-background-dark border-t border-gray-100 dark:border-gray-800" id="contact">
            <div class="max-w-[1920px] mx-auto px-8 md:px-16 lg:px-32">
                
                <div class="flex flex-col lg:flex-row justify-between items-center lg:items-start gap-12 mb-24">
                    
                    <div class="flex flex-col md:flex-row items-center gap-6 text-center md:text-left">
                        <div class="relative h-16 w-auto">
                            <img alt="Logo RAVEN" class="h-16 w-auto dark:hidden" src="/img/logo-light.jpg" onerror="this.src='https://placehold.co/64x64/000000/FFFFFF?text=R'"/>
                            <img alt="Logo RAVEN" class="h-16 w-auto hidden dark:block" src="/img/logo-dark.jpg" onerror="this.src='https://placehold.co/64x64/FFFFFF/000000?text=R'"/>
                        </div>
                        <div class="hidden md:block h-12 w-[1px] bg-gray-300 dark:bg-gray-700"></div>
                        <div class="space-y-1">
                            <span class="font-display font-extrabold text-2xl tracking-tighter uppercase block text-primary dark:text-white">Raven</span>
                            <p class="text-xs tracking-[0.2em] text-accent-gray dark:text-gray-400 font-bold uppercase">Intelligence. Vision. Adaptability.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-16 w-full lg:w-auto">
                        <a class="group flex items-center justify-center lg:justify-start gap-5" href="mailto:info@ravensas.com">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900 group-hover:bg-primary group-hover:text-white rounded-full transition-all duration-300">
                                <span class="material-symbols-outlined text-2xl block">mail</span>
                            </div>
                            <div class="text-left">
                                <p class="text-[10px] uppercase tracking-widest text-accent-gray font-bold mb-1">Email</p>
                                <p class="text-lg font-medium text-gray-900 dark:text-white group-hover:text-accent-gray transition-colors">info@ravensas.com</p>
                            </div>
                        </a>
                        <a class="group flex items-center justify-center lg:justify-start gap-5" href="tel:+573150642655">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900 group-hover:bg-primary group-hover:text-white rounded-full transition-all duration-300">
                                <span class="material-symbols-outlined text-2xl block">call</span>
                            </div>
                            <div class="text-left">
                                <p class="text-[10px] uppercase tracking-widest text-accent-gray font-bold mb-1">Contact</p>
                                <p class="text-lg font-medium text-gray-900 dark:text-white group-hover:text-accent-gray transition-colors">+57 3150642655</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="pt-8 border-t border-gray-100 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
                    <p class="text-[10px] text-accent-gray uppercase tracking-[0.2em] font-medium">
                        © <?= date('Y') ?> RAVEN SAS. All rights reserved.
                    </p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">
                        January 2026 Edition
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>