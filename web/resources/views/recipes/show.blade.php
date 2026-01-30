@extends('layouts.app')

@section('title', 'Poulet Rôti aux Herbes de Provence')

@section('content')
<div class="bg-white min-h-screen pb-12">
    <!-- Immersive Header -->
    <div class="relative h-[60vh] min-h-[500px]">
        <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" alt="Plat">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
        
        <div class="absolute bottom-0 left-0 w-full p-8 pb-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3 mb-4 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <span class="bg-primary-600 text-white px-4 py-1.5 rounded-full text-sm font-bold shadow-lg shadow-primary-600/30">{{ $category->name }}</span>
                </div>
                
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight max-w-4xl animate-fade-in-up" style="animation-delay: 0.2s;">
                    {{ $recipe->title }}
                </h1>
                
                <div class="flex flex-wrap items-center text-white/90 gap-6 md:gap-10 text-lg font-medium animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex items-center gap-3">
                        <img class="w-10 h-10 rounded-full border-2 border-white/50" src="https://ui-avatars.com/api/{{ $user->name }}" alt="Chef">
                        <span>Par <span class="font-bold text-white">{{ $user->name }}</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 mb-10 border border-gray-100">
                    <!-- Actions Bar -->
                    <div class="flex justify-between items-center mb-8 pb-8 border-b border-gray-100">
                        <div class="flex space-x-4">
                            <button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-red-50 text-red-600 font-bold hover:bg-red-100 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                                Sauvegarder
                            </button>
                        </div>
                        <button class="text-gray-400 hover:text-gray-900 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                        </button>
                    </div>

                    <!-- Description -->
                    <div class="mb-12">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">À propos de cette recette</h2>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            {{ $recipe->description }}
                        </p>
                    </div>

                    <!-- Ingredients -->
                    <div class="mb-12">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="bg-primary-100 text-primary-600 p-2 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg></span>
                            Ingrédients
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        @foreach ($recipe->ingredients as $in)
                                        <div class="flex items-center p-4 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="h-2 w-2 bg-primary-500 rounded-full mr-4"></div>
                                <span class="font-bold text-gray-900 w-24">1</span>
                                <span class="text-gray-600">{{$in}}</span>
                            </div>
                        @endforeach
                
                        </div>
                    </div>

                    <!-- Steps -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                            <span class="bg-primary-100 text-primary-600 p-2 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg></span>
                            Préparation
                        </h2>
                        <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-200 before:to-transparent">

                            @foreach ($recipe->steps as  $st)
                                                                <div class="relative flex items-start group">
                                <div class="absolute left-0 top-0 ml-5 -translate-x-1/2 flex h-10 w-10 items-center justify-center rounded-full border-4 border-white bg-primary-100 group-hover:bg-primary-600 transition-colors">
                                    <span class="text-primary-600 font-bold group-hover:text-white">1</span>
                                </div>
                                <div class="ml-16 pl-4">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $st }}</h3>
                                </div>
                            </div>
                            @endforeach

                          
         
                        </div>
                    </div>
                </div>

                <!-- Comments -->
                <div class="bg-white rounded-3xl shadow-lg p-8 md:p-10 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Discussions (3)</h2>
                    
                    <!-- Comment Form -->
                    <div class="flex gap-4 mb-10">
                        <img class="h-12 w-12 rounded-full border border-gray-200" src="https://ui-avatars.com/api/?name=User&background=random" alt="User">
                        <div class="flex-grow">
                            <form class="relative">
                                <textarea id="comment" name="comment" rows="3" class="block w-full border-2 border-gray-100 rounded-2xl p-4 focus:ring-0 focus:border-primary-500 focus:bg-gray-50 transition-colors resize-none" placeholder="Partagez votre avis ou posez une question..."></textarea>
                                <div class="absolute bottom-2 right-2">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-bold rounded-xl text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                                        Publier
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Comment List -->
                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full border border-gray-200" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=facearea&facepad=2&w=100&h=100" alt="">
                            </div>
                            <div>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-sm font-bold text-gray-900">Sophie L.</span>
                                    <span class="text-xs text-gray-400">Il y a 2 jours</span>
                                </div>
                                <p class="mt-2 text-gray-700 bg-gray-50 p-4 rounded-r-2xl rounded-bl-2xl">Délicieux ! J'ai ajouté un peu de citron dans la marinade, c'était parfait.</p>
                                <button class="text-xs text-gray-500 font-medium mt-2 hover:text-primary-600">Répondre</button>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full border border-gray-200" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=facearea&facepad=2&w=100&h=100" alt="">
                            </div>
                            <div>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-sm font-bold text-gray-900">Marc D.</span>
                                    <span class="text-xs text-gray-400">Il y a 1 semaine</span>
                                </div>
                                <p class="mt-2 text-gray-700 bg-gray-50 p-4 rounded-r-2xl rounded-bl-2xl">Très bonne recette, simple et efficace. Toute la famille a adoré.</p>
                                <button class="text-xs text-gray-500 font-medium mt-2 hover:text-primary-600">Répondre</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3 space-y-8">
                <!-- Author Info -->
                <div class="bg-white p-6 shadow-lg rounded-3xl border border-gray-100 text-center sticky top-24">
                    <div class="relative w-24 h-24 mx-auto mb-4">
                        <img class="w-full h-full rounded-full object-cover border-4 border-white shadow-md" src="https://ui-avatars.com/api/{{ $user->name }}" alt="Author">
                        <div class="absolute bottom-0 right-0 bg-green-500 w-6 h-6 rounded-full border-4 border-white"></div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">{{ $user->name }}</h3>
                    
                    <button class="w-full mt-3 bg-white border-2 border-gray-200 text-gray-700 py-3 rounded-xl font-bold hover:bg-gray-50 transition-colors">
                        Voir le profil
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
