<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= lang('index_t.metaTitle') ?><?= $this->endSection() ?>

<?= $this->section('meta_tags') ?>
    <meta name="description" content="<?= lang('index_t.metaDescription') ?>">
    <meta name="keywords" content="<?= lang('index_t.metaKeywords') ?>">
    <meta name="author" content="Raven SAS">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://camiloraven.github.io/raven_page/">
    <meta property="og:title" content="<?= lang('index_t.metaTitle') ?>">
    <meta property="og:description" content="<?= lang('index_t.metaOgDescription') ?>"> 
    <meta property="og:image" content="/img/sc_hero.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="592">
    <meta property="og:image:type" content="image/jpeg">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ravensas">
    <meta name="twitter:title" content="<?= lang('index_t.metaTitle') ?>">
    <meta name="twitter:description" content="<?= lang('index_t.metaTwitterDescription') ?>">
    <meta name="twitter:image" content="/img/sc_hero.jpg">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <section class="relative h-[100vh] w-full flex items-start overflow-hidden bg-black -mt-24">
        <div class="absolute inset-0 z-0">
            <img alt="Raven Hero Image" 
                class="w-full h-full object-cover object-right lg:object-center opacity-60" 
                src="/img/hero_image.jpg" 
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
                
                <h1 class="font-display text-[10vw] sm:text-5xl md:text-4xl lg:text-5xl font-extrabold mb-8 leading-[0.95] sm:leading-none uppercase tracking-tighter">
                    <?= lang('index_t.heroTitleLine1') ?><br/>
                    <?= lang('index_t.heroTitleLine2') ?><br/>
                    <?= lang('index_t.heroTitleLine3') ?>
                </h1>

                <p class="text-lg sm:text-2xl md:text-3xl text-gray-200 font-light leading-relaxed mb-12 border-l-4 border-white/50 pl-6 lg:pl-8 max-w-2xl">
                    <?= lang('index_t.heroSubtitle') ?>
                </p>
                
                <div class="flex flex-col sm:flex-row flex-wrap gap-6">
                    <a class="bg-white text-black px-10 py-5 font-bold uppercase tracking-widest hover:bg-gray-200 transition-all text-sm text-center" href="#offering"> <?= lang('index_t.heroExploreBtn') ?> </a>
                    <a class="border border-white/50 text-white px-10 py-5 font-bold uppercase tracking-widest hover:bg-white hover:text-black transition-all text-sm backdrop-blur-sm text-center" href="#about"><?= lang('index_t.heroWhoBtn') ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full flex flex-col justify-center py-24 bg-white dark:bg-background-dark" id="about">
        <div class="max-w-[1920px] mx-auto px-8 md:px-16 lg:px-32 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-start">
                
                <div class="lg:col-span-4">
                    <span class="text-accent-gray dark:text-gray-500 font-bold uppercase tracking-[0.3em] text-sm block mb-6"><?= lang('index_t.aboutLabel') ?></span>
                    <h2 class="text-3xl md:text-4xl font-display font-medium mb-8 dark:text-gray-200 leading-tight text-gray-800">
                        <?= lang('index_t.aboutTitleL1') ?> <br class="hidden lg:block"><?= lang('index_t.aboutTitleL2') ?> 
                    </h2>
                    <div class="w-20 h-1.5 bg-primary dark:bg-white mb-8"></div>
                </div>

                <div class="lg:col-span-8 space-y-10 text-xl md:text-2xl text-gray-600 dark:text-gray-400 leading-relaxed font-light">
                    
                    <p class="max-w-3xl">
                        <?= lang('index_t.aboutParagraph1') ?>
                    </p>

                    <p class="max-w-3xl">
                        <?= lang('index_t.aboutParagraph2') ?>
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-12 border-t border-gray-100 dark:border-gray-800 pt-12">
                        <div class="max-w-xs">
                            <p class="text-xs font-bold uppercase tracking-widest text-accent-gray mb-4"><?= lang('index_t.aboutModelTitle') ?></p>
                            <p class="text-lg leading-snug"><?= lang('index_t.aboutModelText') ?></p>
                        </div>
                        <div class="max-w-xs">
                            <p class="text-xs font-bold uppercase tracking-widest text-accent-gray mb-4"><?= lang('index_t.aboutPhilosophyTitle') ?></p>
                            <p class="text-lg leading-snug"><?= lang('index_t.aboutPhilosophyText') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full flex flex-col justify-center py-20 bg-gray-50 dark:bg-black/20 overflow-hidden relative" id="offering">
        <div class="max-w-[1920px] mx-auto px-8 md:px-16 lg:px-32 w-full relative z-10">
            <div class="flex flex-col lg:flex-row items-start justify-between gap-12 lg:gap-20">
                <div class="w-full lg:w-4/12 relative">
                    <div class="relative z-10">
                        <span class="text-accent-gray dark:text-gray-500 font-bold uppercase tracking-[0.3em] text-sm block mb-6"><?= lang('index_t.solutionsLabel') ?></span>
                        <h2 class="text-3xl font-display font-medium dark:text-gray-200 leading-snug text-gray-800"><?= lang('index_t.solutionsTitle') ?></h2>
                        <div class="w-20 h-1.5 bg-primary dark:bg-white mt-8 mb-16"></div>
                    </div>
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 opacity-[0.05] dark:opacity-[0.4] scale-150 pointer-events-none lg:relative lg:mt-0 lg:mr-0 lg:opacity-100 lg:scale-100 lg:flex lg:items-center lg:justify-center lg:w-[340px] lg:h-[340px]">
                        <svg class="w-[300px] h-[280px] lg:w-full lg:h-full text-gray-900 dark:text-white lg:text-gray-300 lg:dark:text-gray-500" fill="none" viewBox="0 0 300 280">
                            <path class="opacity-80 dark:opacity-100 triangle-path" d="M150 30 L270 240 L30 240 Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"></path>                        
                            <path class="opacity-30 dark:opacity-60" d="M150 45 L255 225 L45 225 Z" stroke="currentColor" stroke-dasharray="6 6" stroke-linejoin="round" stroke-width="1"></path>
                        </svg>
                        <div class="hidden lg:block absolute top-0 left-1/2 -translate-x-1/2 -translate-y-6 text-center">
                            <span class="text-xs font-display font-bold text-gray-900 dark:text-white uppercase tracking-widest whitespace-nowrap"><?= lang('index_t.oilGasTitle') ?></span>
                        </div>
                        <div class="hidden lg:block absolute bottom-6 left-0 -translate-x-6 text-right">
                            <span class="text-xs font-display font-bold text-gray-900 dark:text-white uppercase tracking-widest block leading-tight"><?= lang('index_t.projectTitle') ?></span>
                        </div>
                        <div class="hidden lg:block absolute bottom-6 right-0 translate-x-6 text-left">
                            <span class="text-xs font-display font-bold text-gray-900 dark:text-white uppercase tracking-widest block leading-tight"><?= lang('index_t.dataScienceTitle') ?></span>
                        </div>
                        <div class="hidden lg:flex absolute inset-0 items-center justify-center pointer-events-none">
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-full border border-gray-100 dark:border-gray-600 shadow-sm flex items-center justify-center w-16 h-16">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-gray-700 dark:text-white">
                                    <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 01.359.852L12.982 9.75h7.268a.75.75 0 01.548 1.262l-10.5 11.25a.75.75 0 01-1.272-.71l1.992-7.302H3.75a.75.75 0 01-.548-1.262l10.5-11.25a.75.75 0 01.913-.143z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-8/12 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-2 gap-y-12 gap-x-8 lg:gap-x-12 border-l-0 lg:border-l border-gray-200 dark:border-gray-800 lg:pl-16 relative z-10">
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-6 h-[2px] bg-primary dark:bg-white"></span>
                            <h3 class="font-display font-bold text-lg uppercase tracking-widest text-primary dark:text-white"><?= lang('index_t.oilGasTitle') ?></h3>
                        </div>
                        <ul class="space-y-4 text-base md:text-lg text-gray-600 dark:text-gray-400 font-light leading-relaxed">
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.oilGasItem1') ?></p></li>
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.oilGasItem2') ?></p></li>
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.oilGasItem3') ?></p></li>
                        </ul>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-6 h-[2px] bg-primary dark:bg-white"></span>
                            <h3 class="font-display font-bold text-lg uppercase tracking-widest text-primary dark:text-white"><?= lang('index_t.projectTitle') ?></h3>
                        </div>
                        <ul class="space-y-4 text-base md:text-lg text-gray-600 dark:text-gray-400 font-light leading-relaxed">
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.projectItem1') ?></p></li>
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.projectItem2') ?></p></li>
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.projectItem3') ?></p></li>
                        </ul>
                    </div>
                    <div class="space-y-6 md:col-span-1 lg:col-span-1 xl:col-span-1">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-6 h-[2px] bg-primary dark:bg-white"></span>
                            <h3 class="font-display font-bold text-lg uppercase tracking-widest text-primary dark:text-white"><?= lang('index_t.dataScienceTitle') ?></h3>
                        </div>
                        <ul class="space-y-4 text-base md:text-lg text-gray-600 dark:text-gray-400 font-light leading-relaxed">
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.dataItem1') ?></p></li>
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.dataItem2') ?></p></li>
                            <li class="flex gap-4 items-start"><span class="material-symbols-outlined text-[18px] mt-1 text-accent-gray">check</span><p><?= lang('index_t.dataItem3') ?></p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ratio-16-9 w-full flex flex-col justify-center py-20 bg-gray-50 dark:bg-black/40" id="synthetic-data">
        <div class="max-w-[1920px] mx-auto px-8 md:px-16 lg:px-32 w-full">
            <div class="mb-20">
                <span class="text-accent-gray dark:text-gray-500 font-bold uppercase tracking-[0.3em] text-sm block mb-6"><?= lang('index_t.coreLabel') ?></span>
                <h2 class="text-2xl md:text-3xl font-display font-medium dark:text-gray-200 leading-snug text-gray-800"><?= lang('index_t.coreTitle') ?></h2>
                <div class="w-20 h-1.5 bg-primary dark:bg-white mt-8"></div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="p-16 bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 hover:shadow-2xl transition-all group h-full flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-6 mb-10">
                            <span class="material-symbols-outlined text-5xl group-hover:scale-110 transition-transform dark:text-white">target</span>
                            <h4 class="text-3xl font-bold uppercase dark:text-white"><?= lang('index_t.objectiveTitle') ?></h4>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-2xl leading-relaxed mb-10 font-light">
                            <?= lang('index_t.objectiveText') ?>
                        </p>
                    </div>
                    <div class="flex items-center gap-4 text-base text-accent-gray mt-auto">
                        <span class="w-16 h-[2px] bg-accent-gray"></span>
                        <span class="font-medium tracking-wide uppercase text-sm"><?= lang('index_t.objectiveFooter') ?></span>
                    </div>
                </div>
                
                <div class="p-16 bg-primary text-white border border-primary hover:shadow-2xl transition-all group h-full flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-6 mb-10">
                            <span class="material-symbols-outlined text-5xl group-hover:scale-110 transition-transform">auto_graph</span>
                            <h4 class="text-3xl font-bold uppercase"><?= lang('index_t.businessTitle') ?></h4>
                        </div>
                        <ul class="space-y-10">
                            <li class="flex gap-8">
                                <span class="text-white/30 font-display text-5xl font-bold">01</span>
                                <div>
                                    <p class="text-white text-2xl font-medium mb-2 uppercase"><?= lang('index_t.businessItem1Title') ?></p>
                                    <p class="text-white/70 font-light text-lg"><?= lang('index_t.businessItem1Text') ?></p>
                                </div>
                            </li>
                            <li class="flex gap-8">
                                <span class="text-white/30 font-display text-5xl font-bold">02</span>
                                <div>
                                    <p class="text-white text-2xl font-medium mb-2 uppercase"><?= lang('index_t.businessItem2Title') ?></p>
                                    <p class="text-white/70 font-light text-lg"><?= lang('index_t.businessItem2Text') ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>