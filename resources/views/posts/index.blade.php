@extends('layouts.app2')

@section('title', 'Accueil - Nexus Blog')

@section('content')

<section class="py-16 bg-gray-50">
    <div class="container mx-auto max-w-6xl px-4">
        <h2 class="text-4xl font-bold text-secondary mb-8 text-center">Tous les Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($posts as $post)
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-secondary mb-4">{{ $post->title }}</h3>
                        <p class="text-gray-700 mb-6">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="text-primary font-medium hover:text-secondary transition-colors">
                            Lire la suite &rarr;
                        </a>
                    </div>
                </article>
            @empty
                <p class="text-center col-span-3 text-gray-600">Pas d'articles disponibles pour le moment.</p>
            @endforelse
        </div>
    </div>
</section>  
@endsection 




