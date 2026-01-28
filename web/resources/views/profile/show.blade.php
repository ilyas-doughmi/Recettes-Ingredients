@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
    <div class="bg-gray-50 min-h-screen pb-20">
        <div class="bg-white shadow-lg border-b border-gray-100">
            <div class="h-48 bg-gradient-to-r from-primary-600 to-orange-400"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="-mt-16 flex flex-col md:flex-row items-end md:items-end gap-6 pb-6">
                    <div class="relative group">
                        <img class="h-32 w-32 rounded-3xl ring-4 ring-white shadow-xl object-cover" src="https://i.pinimg.com/736x/e0/7c/60/e07c603a29b52fea4e78ed1419f49f19.jpg" alt="Avatar">
                        <button class="absolute bottom-2 right-2 bg-white p-1.5 rounded-lg shadow-sm text-gray-500 hover:text-primary-600 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </button>
                    </div>
                    
                    <div class="mt-[30px] flex-grow text-center md:text-left mb-2">
                        <h1 class="text-3xl font-extrabold text-gray-900">{{ Auth::user()->name }}</h1>
                        <p class="text-gray-500 font-medium">Passionné de cuisine • Membre depuis {{ Auth::user()->created_at->format('M Y') }}</p>
                    </div>

                    <div class="flex gap-3 mb-2 w-full md:w-auto">
                        <button class="flex-1 md:flex-none px-6 py-3 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-colors shadow-sm">
                            Modifier le profil
                        </button>
                        <button class="flex-1 md:flex-none px-6 py-3 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-700 transition-colors shadow-lg shadow-primary-500/30">
                            + Nouvelle recette
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-8 py-8 border-t border-gray-100 max-w-2xl">
                    <div class="text-center md:text-left">
                        <span class="block text-3xl font-extrabold text-gray-900">{{ Auth::user()->recipes->count() }}</span>
                        <span class="text-sm text-gray-500 font-medium">Recettes publiées</span>
                    </div>
                    <div class="text-center md:text-left">
                        <span class="block text-3xl font-extrabold text-gray-900">48</span>
                        <span class="text-sm text-gray-500 font-medium">Commentaires</span>
                    </div>
                    <div class="text-center md:text-left">
                        <span class="block text-3xl font-extrabold text-gray-900">156</span>
                        <span class="text-sm text-gray-500 font-medium">J'aime reçus</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="space-y-6">
                    <nav class="bg-white rounded-3xl shadow-lg p-4">
                        <a href="#" class="flex items-center gap-3 px-4 py-3 bg-primary-50 text-primary-700 rounded-xl font-bold mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                            Mes Recettes
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium mb-2 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                            Favoris
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                            Commentaires
                        </a>
                    </nav>

                    <div class="bg-gradient-to-br from-primary-500 to-orange-600 rounded-3xl shadow-lg p-6 text-white text-center">
                        <h3 class="text-xl font-bold mb-2">Devenez Premium</h3>
                        <p class="text-primary-100 mb-6 text-sm">Accédez à des statistiques avancées.</p>
                        <button class="w-full py-3 bg-white text-primary-600 font-bold rounded-xl shadow-lg hover:bg-primary-50 transition-colors">
                            En savoir plus
                        </button>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-2xl font-bold text-gray-900">Mes Recettes</h2>
                        <div class="relative">
                            <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border-none bg-white rounded-xl shadow-sm focus:ring-2 focus:ring-primary-500 text-sm">
                            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </div>
                    </div>

                    <div class="space-y-4">
                        
                        @forelse (Auth::user()->recipes as $recette)
                            <div class="bg-white rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow flex gap-4 border border-gray-100">
                                <img class="w-24 h-24 rounded-xl object-cover" 
                                     src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" 
                                     alt="Recette">
                                
                                <div class="flex-grow flex flex-col justify-between">
                                    <div>
                                        <div class="flex justify-between items-start">
                                            <h3 class="text-lg font-bold text-gray-900 hover:text-primary-600 cursor-pointer">
                                                {{ $recette->title ?? 'Recette #' . $recette->id }}
                                            </h3>
                                            
                                            <div class="flex gap-2">
                                                <a href="{{ url('/recettes/' . $recette->id . '/edit') }}" class="p-2 text-gray-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                                </a>
                                                
                                                <form action="{{ url('/recettes/' . $recette->id) }}" method="POST" onsubmit="return confirm('Supprimer cette recette ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-500 line-clamp-1 mt-1">
                                            {{ $recette->comment }}
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-4 text-sm text-gray-400 mt-2">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg> 
                                            245 vues
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg> 
                                            12 likes
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg> 
                                            {{ $recette->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-10 bg-white rounded-2xl border border-dashed border-gray-300">
                                <p class="text-gray-500 mb-4">Vous n'avez pas encore publié de recette.</p>
                                <a href="/recettes/create" class="text-primary-600 font-bold hover:underline">Créer ma première recette</a>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection