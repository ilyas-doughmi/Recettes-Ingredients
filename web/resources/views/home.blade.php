@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-white">
        <div class="absolute inset-0 z-0">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary-100 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute top-20 left-20 w-72 h-72 bg-orange-50 rounded-full blur-3xl opacity-50"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pt-10 pb-20 lg:pt-20 lg:pb-28">
            <div class="lg:grid lg:grid-cols-12 lg:gap-16 items-center">
                <div class="lg:col-span-6 text-center lg:text-left animate-fade-in-up">
                    <span class="inline-block py-1 px-3 rounded-full bg-primary-100 text-primary-700 text-sm font-semibold tracking-wide uppercase mb-6">
                        La communauté culinaire #1
                    </span>
                    <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
                        Cuisinez avec <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-primary-400">Passion</span> et Partagez
                    </h1>
                    <p class="mt-4 text-xl text-gray-500 mb-10 leading-relaxed">
                        Rejoignez des milliers de passionnés. Découvrez des recettes uniques, partagez vos secrets et devenez le chef que vous avez toujours rêvé d'être.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ url('/recipes') }}" class="px-8 py-4 bg-primary-600 text-white rounded-2xl font-bold text-lg shadow-lg shadow-primary-500/30 hover:bg-primary-700 hover:shadow-primary-500/50 transform hover:-translate-y-1 transition-all duration-300">
                            Explorer les recettes
                        </a>
                        <a href="{{ url('/register') }}" class="px-8 py-4 bg-white text-gray-900 border border-gray-200 rounded-2xl font-bold text-lg hover:bg-gray-50 hover:border-gray-300 transition-all duration-300">
                            Rejoindre gratuitement
                        </a>
                    </div>
                    
                    <div class="mt-12 flex items-center justify-center lg:justify-start gap-6 text-gray-400">
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&h=100" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=100&h=100" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&h=100" alt="User">
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-600">+2k</div>
                        </div>
                        <p class="text-sm font-medium"><span class="text-gray-900 font-bold">2,000+</span> cuisiniers actifs</p>
                    </div>
                </div>
                
                <div class="lg:col-span-6 mt-16 lg:mt-0 relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-primary-500/20 animate-float">
                        <img src="https://images.unsplash.com/photo-1546793665-c74683f339c1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZWF0fGVufDB8fDB8fHww" alt="Cooking" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-8">
                            <div class="bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-lg max-w-xs transform translate-y-4 lg:translate-y-0 lg:-translate-x-8 lg:absolute lg:bottom-12 lg:left-0">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded-lg">Tendance</span>
                                    <div class="flex text-yellow-400 text-xs">★★★★★</div>
                                </div>
                                <p class="font-bold text-gray-900 text-lg">Salade César Revisitée</p>
                                <p class="text-xs text-gray-500 mt-1">Par Chef Damien • 25 min</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Decorative elements -->
                    <div class="absolute -top-12 -right-12 w-24 h-24 bg-yellow-400 rounded-full opacity-20 blur-xl animate-pulse"></div>
                    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-primary-500 rounded-full opacity-20 blur-xl animate-pulse delay-700"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipe of the Day -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-4">La Star du Jour</h2>
                <p class="text-gray-500 text-lg">Chaque jour, une nouvelle inspiration sélectionnée par nos experts pour éveiller vos papilles.</p>
            </div>

            <div class="relative bg-white rounded-3xl shadow-xl overflow-hidden lg:grid lg:grid-cols-2 lg:min-h-[500px]">
                <div class="relative h-64 lg:h-full">
                    <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="Recette du jour">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-bold text-primary-600 shadow-sm">
                        🏆 Recette du Jour
                    </div>
                </div>
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="bg-orange-100 text-orange-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Plat Principal</span>
                        <span class="text-gray-400 text-sm">•</span>
                        <span class="text-gray-500 text-sm font-medium">1h 30min</span>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">Poulet Rôti aux Herbes de Provence</h3>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Un classique indémodable, ce poulet rôti est mariné avec des herbes fraîches et de l'huile d'olive pour une peau croustillante et une chair tendre. Le secret réside dans la marinade lente...
                    </p>
                    
                    <div class="flex items-center justify-between mt-auto">
                        <div class="flex items-center gap-3">
                            <img class="w-12 h-12 rounded-full border-2 border-primary-100" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?auto=format&fit=facearea&facepad=2&w=100&h=100" alt="Chef">
                            <div>
                                <p class="text-sm font-bold text-gray-900">Chef Martin</p>
                                <p class="text-xs text-gray-500">125 recettes</p>
                            </div>
                        </div>
                        <a href="{{ url('/recipes/1') }}" class="group inline-flex items-center gap-2 text-primary-600 font-bold hover:text-primary-700 transition-colors">
                            Voir la recette
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Explorez par Envie</h2>
                    <p class="mt-2 text-gray-500">Trouvez le plat parfait pour chaque occasion.</p>
                </div>
                <a href="{{ url('/recipes') }}" class="hidden md:inline-flex items-center font-medium text-primary-600 hover:text-primary-700">
                    Tout voir <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Category Card -->
                <a href="{{ url('/recipes?category=entrees') }}" class="group relative h-64 rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Entrées" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-white text-xl font-bold group-hover:text-primary-200 transition-colors">Entrées</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">Pour bien commencer</p>
                    </div>
                </a>

                <a href="{{ url('/recipes?category=plats') }}" class="group relative h-64 rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Plats" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-white text-xl font-bold group-hover:text-primary-200 transition-colors">Plats</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">Le cœur du repas</p>
                    </div>
                </a>

                <a href="{{ url('/recipes?category=desserts') }}" class="group relative h-64 rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Desserts" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-white text-xl font-bold group-hover:text-primary-200 transition-colors">Desserts</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">Douceurs sucrées</p>
                    </div>
                </a>

                <a href="{{ url('/recipes?category=boissons') }}" class="group relative h-64 rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Boissons" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                        <h3 class="text-white text-xl font-bold group-hover:text-primary-200 transition-colors">Boissons</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">Rafraîchissements</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Recipes -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-12">Dernières Pépites</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-primary-100 flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Toast">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-xs font-bold shadow-sm">
                            ⏱️ 15 min
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-green-600 bg-green-100 px-3 py-1 rounded-full">Entrée</span>
                            <div class="flex items-center text-yellow-400 text-xs font-bold">
                                ★ 4.8
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors">
                            <a href="{{ url('/recipes/2') }}">Toast Avocat & Oeuf Mollet</a>
                        </h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2 flex-grow">
                            Un petit-déjeuner sain et rapide, plein de protéines et de bonnes graisses pour bien démarrer la journée.
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-50 mt-auto">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-gray-200"></div>
                                <span class="text-xs font-medium text-gray-600">Alice D.</span>
                            </div>
                            <span class="text-xs text-gray-400">Il y a 2h</span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-primary-100 flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Pesto">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-xs font-bold shadow-sm">
                            ⏱️ 25 min
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-primary-600 bg-primary-100 px-3 py-1 rounded-full">Plat</span>
                            <div class="flex items-center text-yellow-400 text-xs font-bold">
                                ★ 4.5
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors">
                            <a href="{{ url('/recipes/3') }}">Pâtes au Pesto Maison</a>
                        </h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2 flex-grow">
                            Rien ne vaut un pesto fait maison avec du basilic frais du jardin, des pignons torréfiés et du bon parmesan.
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-50 mt-auto">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-gray-200"></div>
                                <span class="text-xs font-medium text-gray-600">Marc P.</span>
                            </div>
                            <span class="text-xs text-gray-400">Il y a 5h</span>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-primary-100 flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Cheesecake">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-xs font-bold shadow-sm">
                            ⏱️ 1h 10
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-pink-600 bg-pink-100 px-3 py-1 rounded-full">Dessert</span>
                            <div class="flex items-center text-yellow-400 text-xs font-bold">
                                ★ 4.9
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors">
                            <a href="{{ url('/recipes/4') }}">Cheesecake aux Fruits Rouges</a>
                        </h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2 flex-grow">
                            Un dessert onctueux et fruité pour finir le repas en beauté. Base biscuitée croustillante et crème légère.
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-50 mt-auto">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-gray-200"></div>
                                <span class="text-xs font-medium text-gray-600">Sophie L.</span>
                            </div>
                            <span class="text-xs text-gray-400">Hier</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ url('/recipes') }}" class="inline-block px-8 py-3 border-2 border-primary-100 text-primary-700 font-bold rounded-2xl hover:bg-primary-50 hover:border-primary-200 transition-all duration-300">
                    Découvrir toutes les recettes
                </a>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="relative py-20 bg-primary-600 overflow-hidden">
        <div class="absolute inset-0 opacity-10 pattern-dots"></div>
        <div class="max-w-4xl mx-auto px-4 relative z-10 text-center text-white">
            <h2 class="text-4xl font-extrabold mb-6">Prêt à partager vos créations ?</h2>
            <p class="text-xl text-primary-100 mb-10">Rejoignez notre communauté aujourd'hui et inspirez des milliers de cuisiniers à travers le monde.</p>
            <a href="{{ url('/recipes/create') }}" class="inline-block bg-white text-primary-600 px-10 py-4 rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl hover:bg-gray-50 transform hover:-translate-y-1 transition-all duration-300">
                Publier ma première recette
            </a>
        </div>
    </section>
@endsection
