@extends('layouts.app2')

@section('title', 'Accueil - Nexus Blog')

@section('content')

<form class="bg-gray-50 rounded-2xl shadow-md p-8" action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="post-title" class="block text-gray-700 mb-2 font-medium">Titre de l'article</label>
                        <input type="text" id="post-title" name="title" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Donnez un titre accrocheur à votre article" value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    
                    <div class="mb-6">
                        <label for="post-content" class="block text-gray-700 mb-2 font-medium">Contenu</label>
                        <textarea id="post-content" name="content" rows="12" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Rédigez votre article ici...">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    
                    <div class="flex flex-col sm:flex-row justify-between gap-4">
                        <a href="{{ route('posts.update') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 transition-colors font-medium text-center">
                            Annuler
                        </a>
                        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-secondary transition-colors font-medium">
                            <i class="fas fa-paper-plane mr-2"></i> Publier l'article
                        </button>
                    </div>
                </form>
            </div>
             <form action ="{{ route('post.update', $post->id) }}" method="PATCH" class="inline">
                                @csrf
                                @method('UPDATE')
                                                             
                         
                      </form>   
        </section>
    </main>

@endsection 