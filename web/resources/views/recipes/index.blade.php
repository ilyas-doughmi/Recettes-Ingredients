@extends('layouts.app')

@section('title', 'Toutes les Recettes')

@section('content')
<div class="bg-gray-50 min-h-screen pb-20">
    <!-- Header with Search -->
    <div class="bg-white border-b border-gray-200 pt-12 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">La Bibliothèque des Saveurs</h1>
                <p class="text-lg text-gray-500 mb-8">Trouvez l'inspiration parmi des centaines de recettes partagées par notre communauté.</p>
                
                <form action="../../storage/app/public{{ url('/recipes') }}" method="GET" class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" class="block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10 transition-all duration-300 text-lg" placeholder="Que voulez-vous cuisiner aujourd'hui ?" value="{{ request('search') }}">
                    <button type="submit" class="absolute inset-y-2 right-2 px-6 bg-primary-600 text-white rounded-xl font-bold hover:bg-primary-700 transition-colors">
                        Rechercher
                    </button>
                </form>

                <!-- Filter Chips -->
                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    @foreach ($categories as $cat )
                    <a href="categorie={{ $cat->name }}" class="px-5 py-2 rounded-full text-sm font-bold transition-all duration-200 {{ request()->has('categorie') ? 'bg-primary-600 text-white shadow-lg shadow-primary-500/30' : 'bg-white text-gray-600 border border-gray-200 hover:border-primary-300 hover:text-primary-600' }}">
                        {{ $cat->name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Results Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-xl font-bold text-gray-900">
                @if(request('search'))
                    Résultats pour "{{ request('search') }}"
                @elseif(request('category'))
                    Catégorie : {{ ucfirst(request('category')) }}
                @else
                    Recettes Populaires
                @endif
            </h2>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">Trier par:</span>
                <select class="border-none bg-transparent text-sm font-bold text-gray-900 focus:ring-0 cursor-pointer">
                    <option>Plus récents</option>
                    <option>Mieux notés</option>
                    <option>Plus commentés</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Repeat this block for each recipe -->
            @foreach ($recettes as $recet)
            <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-primary-100 flex flex-col h-full">
                <div class="relative h-64 overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $recet->image ? asset('recipes/' . ltrim(preg_replace('/^recipes\//', '', $recet->image)) ) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80' }}" alt="Recette Image">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-xs font-bold shadow-sm">
                        ⏱️ 20 min
                    </div>
                    
                    <button class="absolute bottom-4 right-4 bg-white p-2 rounded-full shadow-lg text-gray-400 hover:text-red-500 transform translate-y-10 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-green-600 bg-green-100 px-3 py-1 rounded-full">Sain</span>
                        <div class="flex items-center text-gray-400 text-xs font-bold">
                            ★ {{ $recet->difficulte }}
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors">
                        <a href="{{ url('/recipes/' . $recet->id) }}">{{ $recet->title }}</a>
                    </h3>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-2 flex-grow">
                        {{ $recet->description }}
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-50 mt-auto">
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-medium text-gray-600">Par {{ $recet->user->name ?? 'Inconnu' }}</span>
                        </div>
                        <span class="text-xs text-gray-400 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            12
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-16 flex justify-center">
            <nav class="flex items-center space-x-2">
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 hover:border-gray-300 transition-colors">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary-600 text-white font-bold shadow-lg shadow-primary-500/30">1</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 font-medium hover:bg-gray-50 hover:border-gray-300 transition-colors">2</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 font-medium hover:bg-gray-50 hover:border-gray-300 transition-colors">3</a>
                <span class="text-gray-400">...</span>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 font-medium hover:bg-gray-50 hover:border-gray-300 transition-colors">12</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 hover:border-gray-300 transition-colors">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </nav>
        </div>
    </div>
</div>
@endsection
