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
                    </div>

                </div>
                <div class="grid grid-cols-3 gap-8 py-8 border-t border-gray-100 max-w-2xl">
                    <div class="text-center md:text-left">
                        <span class="block text-3xl font-extrabold text-gray-900">{{ $recettes->count() }}</span>
                        <span class="text-sm text-gray-500 font-medium">Recettes publiées</span>
                    </div>
                    <div class="text-center md:text-left">
                        <span class="block text-3xl font-extrabold text-gray-900">{{ $comments->count() }}</span>
                        <span class="text-sm text-gray-500 font-medium">Commentaires</span>
                    </div>
                    <div class="text-center md:text-left">
                        <span class="block text-3xl font-extrabold text-gray-900">{{ $favorites->count() }}</span>
                        <span class="text-sm text-gray-500 font-medium">Favoris</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12" x-data="{ activeTab: 'recipes' }">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="space-y-6">
            

                    <div class="bg-gradient-to-br from-primary-500 to-orange-600 rounded-3xl shadow-lg p-6 text-white text-center">
                        <h3 class="text-xl font-bold mb-2">Devenez Premium</h3>
                        <p class="text-primary-100 mb-6 text-sm">Accédez à des statistiques avancées.</p>
                        <button class="w-full py-3 bg-white text-primary-600 font-bold rounded-xl shadow-lg hover:bg-primary-50 transition-colors">
                            En savoir plus
                        </button>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">
                    <!-- My Recipes Tab -->
                    <div x-show="activeTab === 'recipes'" x-cloak>
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Mes Recettes</h2>
                            <div class="relative">
                                <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border-none bg-white rounded-xl shadow-sm focus:ring-2 focus:ring-primary-500 text-sm">
                                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            </div>
                        </div>

                        <div class="space-y-4">
                            @forelse ($recettes as $recette)
                                <div class="bg-white rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow flex gap-4 border border-gray-100">
                                    <img class="w-24 h-24 rounded-xl object-cover" 
                                         src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" 
                                         alt="Recette">
                                    
                                    <div class="flex-grow flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between items-start">
                                                <h3 class="text-lg font-bold text-gray-900 hover:text-primary-600 cursor-pointer">
                                                    {{ $recette->title }}
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
                                                {{ $recette->description }}
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-4 text-sm text-gray-400 mt-2">
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

                    <!-- Favorites Tab -->
                    <div x-show="activeTab === 'favorites'" x-cloak>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Mes Favoris</h2>
                        <div class="space-y-4">
                            @forelse ($favorites as $favorite)
                                <div class="bg-white rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow flex gap-4 border border-gray-100">
                                    <img class="w-24 h-24 rounded-xl object-cover" 
                                         src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" 
                                         alt="Recette">
                                    
                                    <div class="flex-grow flex flex-col justify-between">
                                        <div>
                                            <a href="{{ url('/recipes/' . $favorite->id) }}" class="text-lg font-bold text-gray-900 hover:text-primary-600">
                                                {{ $favorite->title }}
                                            </a>
                                            <p class="text-sm text-gray-500 line-clamp-1 mt-1">
                                                {{ $favorite->description }}
                                            </p>
                                        </div>
                                        <div class="flex justify-between items-center mt-2">
                                            <span class="text-sm text-gray-400 flex items-center gap-1">
                                                <img class="w-5 h-5 rounded-full" src="https://ui-avatars.com/api/{{ $favorite->user->name ?? 'User' }}" alt="">
                                                {{ $favorite->user->name ?? 'Chef' }}
                                            </span>
                                            
                                            <form action="{{ route('recipes.like', $favorite->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-red-500 hover:text-red-700 p-2">
                                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-10 bg-white rounded-2xl border border-dashed border-gray-300">
                                    <p class="text-gray-500 mb-4">Vous n'avez pas encore de favoris.</p>
                                    <a href="/recipes" class="text-primary-600 font-bold hover:underline">Explorer les recettes</a>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Comments Tab -->
                    <div x-show="activeTab === 'comments'" x-cloak>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Mes Commentaires</h2>
                        <div class="space-y-4">
                            @forelse ($comments as $comment)
                                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                                    <div class="flex justify-between items-start mb-3">
                                        <span class="text-sm text-gray-400">Sur <a href="{{ url('/recipes/' . $comment->recipe->id) }}" class="font-bold text-primary-600 hover:underline">{{ $comment->recipe->title }}</a></span>
                                        <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-700 bg-gray-50 p-4 rounded-xl">
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                            @empty
                                <div class="text-center py-10 bg-white rounded-2xl border border-dashed border-gray-300">
                                    <p class="text-gray-500 mb-4">Vous n'avez pas encore posté de commentaires.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection