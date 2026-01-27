<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recettes & Ingrédients - @yield('title', 'Bienvenue')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['"Outfit"', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                            950: '#431407',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.5s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen antialiased selection:bg-primary-500 selection:text-white">

    <!-- Navigation -->
    <nav class="glass-nav sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="group flex items-center gap-2">
                            <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-primary-500/30 transform group-hover:rotate-12 transition-transform duration-300">
                                R&I
                            </div>
                            <span class="text-2xl font-bold text-gray-900 tracking-tight group-hover:text-primary-600 transition-colors">Recettes<span class="text-primary-600">&</span>Ingrédients</span>
                        </a>
                    </div>
                    <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                        <a href="{{ url('/') }}" class="border-transparent text-gray-500 hover:text-primary-600 inline-flex items-center px-1 pt-1 border-b-2 font-medium transition-all duration-200 {{ request()->is('/') ? 'border-primary-500 text-gray-900' : 'hover:border-primary-300' }}">
                            Accueil
                        </a>
                        <a href="{{ url('/recipes') }}" class="border-transparent text-gray-500 hover:text-primary-600 inline-flex items-center px-1 pt-1 border-b-2 font-medium transition-all duration-200 {{ request()->is('recipes*') && !request()->is('recipes/create') ? 'border-primary-500 text-gray-900' : 'hover:border-primary-300' }}">
                            Recettes
                        </a>
                        <a href="{{ url('/recipes/create') }}" class="border-transparent text-gray-500 hover:text-primary-600 inline-flex items-center px-1 pt-1 border-b-2 font-medium transition-all duration-200 {{ request()->is('recipes/create') ? 'border-primary-500 text-gray-900' : 'hover:border-primary-300' }}">
                            Publier
                        </a>
                    </div>
                </div>
                @guest
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                    <a href="{{ url('/login') }}" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Connexion</a>
                    <a href="{{ url('/register') }}" class="bg-primary-600 text-white hover:bg-primary-700 px-5 py-2.5 rounded-xl font-medium shadow-lg shadow-primary-500/30 hover:shadow-primary-500/50 transform hover:-translate-y-0.5 transition-all duration-200">
                        Inscription
                    </a>
                </div>
                @endguest

                @auth
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                    <a href="{{ url('/profile') }}" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Profile</a>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-primary-600 font-medium transition-colors cursor-pointer">
                            Logout
                        </button>
                    </form>                    
                </div>

                @endauth
                
                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="sm:hidden hidden bg-white/95 backdrop-blur-sm border-t" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ url('/') }}" class="bg-primary-50 border-primary-500 text-primary-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Accueil</a>
                <a href="{{ url('/recipes') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Recettes</a>
                <a href="{{ url('/recipes/create') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Publier</a>
                <a href="{{ url('/login') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Connexion</a>
                <a href="{{ url('/register') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Inscription</a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-auto border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 mb-6">
                        <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center text-white font-bold shadow-lg">R&I</div>
                        <span class="text-xl font-bold tracking-tight">Recettes<span class="text-primary-500">&</span>Ingrédients</span>
                    </a>
                    <p class="text-gray-400 leading-relaxed max-w-sm">
                        La plateforme collaborative ultime pour les passionnés de gastronomie. Partagez, découvrez et cuisinez les meilleures recettes du monde entier.
                    </p>
                    <div class="mt-6 flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary-500 transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary-500 transition-colors">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772 4.902 4.902 0 011.772-1.153c.636-.247 1.363-.416 2.427-.465 1.067-.047 1.409-.06 3.809-.06h.63zm1.673 5.378-1.25 1.25-1.25-1.25-.988.988 1.25 1.25-1.25 1.25.988.988 1.25-1.25 1.25 1.25.988-.988-1.25-1.25 1.25-1.25-.988-.988zM12 7a5 5 0 100 10 5 5 0 000-10z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary-500 transition-colors">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase mb-4">Explorer</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Accueil</a></li>
                        <li><a href="{{ url('/recipes') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Toutes les recettes</a></li>
                        <li><a href="{{ url('/recipes?category=entrees') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Entrées</a></li>
                        <li><a href="{{ url('/recipes?category=plats') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Plats principaux</a></li>
                        <li><a href="{{ url('/recipes?category=desserts') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Desserts</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-200 tracking-wider uppercase mb-4">Communauté</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/login') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Se connecter</a></li>
                        <li><a href="{{ url('/register') }}" class="text-gray-400 hover:text-primary-400 transition-colors">S'inscrire</a></li>
                        <li><a href="{{ url('/recipes/create') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Proposer une recette</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-400 transition-colors">Guide du contributeur</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">&copy; 2026 Recettes & Ingrédients. Fait avec passion pour la cuisine.</p>
                <div class="flex space-x-6 mt-4 md:mt-0 text-sm text-gray-500">
                    <a href="#" class="hover:text-white transition-colors">Confidentialité</a>
                    <a href="#" class="hover:text-white transition-colors">Conditions</a>
                    <a href="#" class="hover:text-white transition-colors">Cookies</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script>
        // Script for mobile menu
        const btn = document.querySelector('button[aria-controls="mobile-menu"]');
        const menu = document.getElementById('mobile-menu');
        
        if(btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
