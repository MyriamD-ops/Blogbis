@extends('layouts.app2')

@section('title', $post['title'])

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto max-w-4xl">
        <article class="bg-white rounded-2xl shadow-lg p-8">
            
            

            <!-- Titre -->
            <h2 class="text-3xl font-bold text-secondary mb-4">{{ $post['title'] }}</h2>

            <!-- Auteur -->
            <div class="flex items-center text-gray-600 mb-8">
                <div class="flex items-center mr-6">
                    <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold mr-3">
                        {{$post->user->name}}
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">{{ $post['author'] }}</p>
                        <p class="text-sm">{{ $post['date'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Contenu -->
            <div class="prose max-w-none text-gray-700 mb-8">
                {!! $post['content'] !!}
            </div>

            <!-- Commentaires -->
            <div class="border-t border-gray-200 pt-8 mb-8">
                <h3 class="text-xl font-bold text-secondary mb-6">Commentaires ({{ count($comments) }})</h3>
                
                @foreach($comments as $comment)
                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-secondary flex items-center justify-center text-white text-sm font-bold mr-3">
                                    {{ substr($comment['author'],0,2) }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">{{ $comment['author'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $comment['date'] }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700">{{ $comment['content'] }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Formulaire -->
            <form method="POST" action="{{ route('comments.store', $post['id']) }}">
                @csrf
                <h4 class="text-lg font-medium text-secondary mb-4">Ajouter un commentaire</h4>
                <div class="mb-4">
                    <label for="comment-content" class="block text-gray-700 mb-2">Commentaire</label>
                    <textarea id="comment-content" name="content" rows="4" class="w-full px-4 py-3 border rounded-lg"></textarea>
                </div>
                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-secondary">
                    Publier le commentaire
                </button>
            </form>
        </article>
    </div>
</section>
@endsection


<!-- Section Articles récents -->
        <section id="posts" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-secondary mb-4">Articles récents</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Découvrez les dernières publications de notre communauté</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- 
                    BOUCLE LARAVEL POUR LES ARTICLES
                    Remplacer cette section par :
                    
                    @foreach($posts as $post)
                    -->
                    
                    <!-- Article 1 - EXEMPLE STATIQUE À REMPLACER -->
                    <article class="bg-gray-50 rounded-xl overflow-hidden shadow-md card-hover border border-gray-200">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                         
                                <!-- Afficher la date de création formatée -->
                                <span class="text-xs text-gray-500">{{ $post->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-secondary mb-3">
                                <!-- Lien vers l'article détaillé -->
                                <a href="{{ route('posts.show', $post->id) }}" class="hover:text-primary transition-colors">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <!-- Afficher un extrait du contenu -->
                            <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 120) }}</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <!-- Avatar et nom de l'auteur -->
                                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold mr-2">
                                        {{ substr($post->user->name, 0, 2) }}
                                    </div>
                                    <span class="text-sm text-gray-700">{{ $post->user->name }}</span>
                                </div>
                                <!-- Lien vers l'article complet -->
                                <a href="{{ route('posts.show', $post->id) }}" class="text-primary hover:text-secondary text-sm font-medium flex items-center">
                                    Lire <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                    
                    <!-- 
                    @endforeach
                    
                    Si aucun article :
                    @if($posts->isEmpty())
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Aucun article publié pour le moment.</p>
                        <a href="{{ route('posts.create') }}" class="inline-block mt-4 bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition-colors">
                            Publier le premier article
                        </a>
                    </div>
                    @endif
                    -->