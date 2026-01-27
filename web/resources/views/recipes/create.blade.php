@extends('layouts.app')

@section('title', 'Publier une recette')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Partagez votre Talent</h1>
            <p class="text-lg text-gray-500">Remplissez ce formulaire pour ajouter votre chef-d'œuvre à la collection.</p>
        </div>

        <form action="{{ url('/recipes') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Section 1: General Info -->
            <div class="bg-white rounded-3xl shadow-lg p-8 md:p-10 border border-gray-100">
                <div class="flex items-center gap-4 mb-8 border-b border-gray-100 pb-6">
                    <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold text-xl">1</div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Informations de base</h2>
                        <p class="text-sm text-gray-500">Donnez envie avec un titre accrocheur et une belle photo.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-y-8 gap-x-8 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Titre de la recette</label>
                        <input type="text" name="title" id="title" required class="block w-full border-gray-300 rounded-xl shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-lg py-3 px-4" placeholder="ex: Tarte aux pommes de Grand-Mère">
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-bold text-gray-700 mb-2">Catégorie</label>
                        <select id="category" name="category" class="block w-full border-gray-300 rounded-xl shadow-sm focus:ring-primary-500 focus:border-primary-500 py-3 px-4">
                            <option value="entree">🥗 Entrée</option>
                            <option value="plat">🍗 Plat Principal</option>
                            <option value="dessert">🍰 Dessert</option>
                            <option value="boisson">🍹 Boisson</option>
                        </select>
                    </div>

                    <div>
                        <label for="difficulty" class="block text-sm font-bold text-gray-700 mb-2">Difficulté</label>
                        <select id="difficulty" name="difficulty" class="block w-full border-gray-300 rounded-xl shadow-sm focus:ring-primary-500 focus:border-primary-500 py-3 px-4">
                            <option value="easy">Facile</option>
                            <option value="medium">Moyen</option>
                            <option value="hard">Difficile</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="4" class="block w-full border-gray-300 rounded-xl shadow-sm focus:ring-primary-500 focus:border-primary-500 py-3 px-4" placeholder="Racontez l'histoire de ce plat..."></textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Photo du plat</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-2xl hover:bg-gray-50 transition-colors cursor-pointer group">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-primary-500 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                        <span>Télécharger une image</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG jusqu'à 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Ingredients -->
            <div class="bg-white rounded-3xl shadow-lg p-8 md:p-10 border border-gray-100">
                <div class="flex items-center gap-4 mb-8 border-b border-gray-100 pb-6">
                    <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold text-xl">2</div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Ingrédients</h2>
                        <p class="text-sm text-gray-500">Listez tout ce qu'il faut pour réussir la recette.</p>
                    </div>
                </div>

                <div class="space-y-4" id="ingredients-list">
                    <div class="flex gap-4 items-center">
                        <div class="flex-grow relative">
                            <input type="text" name="ingredients[]" class="block w-full border-gray-300 rounded-xl shadow-sm focus:ring-primary-500 focus:border-primary-500 py-3 px-4 pl-10" placeholder="ex: 200g de farine">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-400">•</span>
                            </div>
                        </div>
                        <button type="button" class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                    <div class="flex gap-4 items-center">
                        <div class="flex-grow relative">
                            <input type="text" name="ingredients[]" class="block w-full border-gray-300 rounded-xl shadow-sm focus:ring-primary-500 focus:border-primary-500 py-3 px-4 pl-10" placeholder="ex: 3 oeufs">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-400">•</span>
                            </div>
                        </div>
                        <button type="button" class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>
                
                <button type="button" class="mt-6 flex items-center gap-2 text-primary-600 font-bold hover:text-primary-700 transition-colors">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                    Ajouter un ingrédient
                </button>
            </div>

            <!-- Section 3: Steps -->
            <div class="bg-white rounded-3xl shadow-lg p-8 md:p-10 border border-gray-100">
                <div class="flex items-center gap-4 mb-8 border-b border-gray-100 pb-6">
                    <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold text-xl">3</div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Préparation</h2>
                        <p class="text-sm text-gray-500">Décrivez les étapes pas à pas.</p>
                    </div>
                </div>

                <div class="space-y-6" id="steps-list">
                    <div class="bg-gray-50 p-6 rounded-2xl relative border border-gray-100 group hover:border-primary-200 transition-colors">
                        <span class="absolute top-4 left-4 bg-primary-100 text-primary-700 text-xs font-bold px-2 py-1 rounded-lg">Étape 1</span>
                        <textarea name="steps[]" rows="3" class="mt-8 block w-full border-gray-200 rounded-xl shadow-sm focus:ring-primary-500 focus:border-primary-500 p-4" placeholder="Préchauffer le four..."></textarea>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl relative border border-gray-100 group hover:border-primary-200 transition-colors">
                        <span class="absolute top-4 left-4 bg-primary-100 text-primary-700 text-xs font-bold px-2 py-1 rounded-lg">Étape 2</span>
                        <textarea name="steps[]" rows="3" class="mt-8 block w-full border-gray-200 rounded-xl shadow-sm focus:ring-primary-500 focus:border-primary-500 p-4" placeholder="Mélanger la farine et..."></textarea>
                    </div>
                </div>
                
                <button type="button" class="mt-6 flex items-center gap-2 text-primary-600 font-bold hover:text-primary-700 transition-colors">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                    Ajouter une étape
                </button>
            </div>

            <!-- Submit -->
            <div class="flex justify-end pt-6 pb-12">
                <button type="button" class="bg-white py-4 px-8 border border-gray-300 rounded-2xl shadow-sm text-base font-bold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 mr-4 transition-all">
                    Annuler
                </button>
                <button type="submit" class="inline-flex justify-center py-4 px-8 border border-transparent shadow-lg text-base font-bold rounded-2xl text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transform hover:-translate-y-1 transition-all">
                    Publier la recette
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
