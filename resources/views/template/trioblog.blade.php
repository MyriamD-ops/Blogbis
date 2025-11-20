// Découper la  template trioblog.blade.php en sections Blade pour une meilleure organisation

//Contenu de à mettre dans le fichier layouts/app2.blade.php


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Blog | Design Moderne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#028090',
                        secondary: '#2D3142',
                        tertiary: '#B8F3FF'
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #028090 0%, #2D3142 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .tag {
            transition: all 0.2s ease;
        }
        .tag:hover {
            background-color: #2D3142 !important;
            color: white;
        }
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: #028090;
            z-index: 9999;
            transition: width 0.3s;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col">
    <!-- Barre de progression -->
    <div class="reading-progress" id="readingProgress"></div>

    <!-- En-tête moderne -->
    <header class="gradient-bg text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <div class="w-10 h-10 rounded-full bg-tertiary flex items-center justify-center">
                        <span class="text-primary font-bold text-xl">N</span>
                    </div>
                    <h1 class="text-2xl font-bold">Nexus<span class="text-tertiary">Blog</span></h1>
                </div>
                
                <nav class="flex flex-wrap justify-center gap-4 md:gap-8">
                    <!-- Remplacer les liens par des routes Laravel -->
                    <a href="{{ route('home') }}" class="nav-link font-medium hover:text-tertiary transition-colors flex items-center">
                        <i class="fas fa-home mr-2"></i> Accueil
                    </a>
                    <a href="{{ route('posts.index') }}" class="nav-link font-medium hover:text-tertiary transition-colors flex items-center">
                        <i class="fas fa-newspaper mr-2"></i> Articles
                    </a>
                    <a href="{{ route('posts.create') }}" class="nav-link font-medium hover:text-tertiary transition-colors flex items-center">
                        <i class="fas fa-pen mr-2"></i> Écrire
                    </a>
                    <!-- Condition pour afficher connexion/déconnexion selon l'état de l'utilisateur -->
                    @auth
                        <a href="#" class="font-medium hover:text-tertiary transition-colors flex items-center">
                            <i class="fas fa-user mr-2"></i> {{ Auth::user()->name }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="font-medium hover:text-tertiary transition-colors flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium hover:text-tertiary transition-colors flex items-center">
                            <i class="fas fa-user mr-2"></i> Connexion
                        </a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="flex-grow">
        <!-- Section Hero -->
        <section id="home" class="gradient-bg text-white py-16 md:py-24">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Partagez vos idées avec le monde</h2>
                <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto text-gray-200">
                    Une plateforme moderne pour publier, découvrir et discuter.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <!-- Lien vers la création d'article (conditionné par l'authentification) -->
                    @auth
                        <a href="{{ route('posts.create') }}" class="bg-tertiary text-primary font-bold px-6 py-3 rounded-lg hover:bg-white transition-colors shadow-lg">
                            <i class="fas fa-pen mr-2"></i> Commencer à écrire
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-tertiary text-primary font-bold px-6 py-3 rounded-lg hover:bg-white transition-colors shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i> Créer un compte
                        </a>
                    @endauth
                    <a href="{{ route('posts.index') }}" class="bg-white text-secondary font-bold px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors shadow-lg">
                        <i class="fas fa-book-open mr-2"></i> Découvrir
                    </a>
                </div>
            </div>
        </section>

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
                                <!-- Afficher la catégorie de l'article -->
                                <span class="text-sm font-medium text-primary">{{ $post->category->name ?? 'Non catégorisé' }}</span>
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
                    
                    <!-- EXEMPLES STATIQUES À SUPPRIMER -->
                    

                    
                </div>

                <!-- 
                PAGINATION LARAVEL
                Remplacer par :
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
                -->
                <div class="text-center mt-12">
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center text-primary font-medium hover:text-secondary transition-colors">
                        Voir tous les articles <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- 
        SECTION DÉTAIL D'ARTICLE
        Cette section sera dans un fichier Blade séparé, par exemple show.blade.php
        -->
        <section id="post-detail" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 max-w-4xl">
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-8">
                        <!-- 
                        AFFICHAGE DES CATÉGORIES/TAGS DE L'ARTICLE
                        Remplacer par une boucle sur les tags/catégories
                        -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            <!-- 
                            @foreach($post->tags as $tag)
                            <span class="tag bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">{{ $tag->name }}</span>
                            @endforeach
                            -->
                            <span class="tag bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">Développement Web</span>
                            <span class="tag bg-tertiary text-primary px-3 py-1 rounded-full text-sm font-medium">Frontend</span>
                            <span class="tag bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">Tendances</span>
                        </div>
                        
                        <!-- Titre de l'article -->
                        <h2 class="text-3xl font-bold text-secondary mb-4">{{ $post->title }}</h2>
                        
                        <!-- Informations sur l'auteur et la date -->
                        <div class="flex items-center text-gray-600 mb-8">
                            <div class="flex items-center mr-6">
                                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold mr-3">
                                    {{ substr($post->user->name, 0, 2) }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">{{ $post->user->name }}</p>
                                    <p class="text-sm">{{ $post->created_at->format('d M Y') }} · {{ $post->reading_time }} min de lecture</p>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <!-- Boutons d'interaction (likes, commentaires, partage) -->
                                <button class="text-gray-500 hover:text-primary transition-colors">
                                    <i class="far fa-heart"></i> <span class="ml-1">{{ $post->likes_count }}</span>
                                </button>
                                <button class="text-gray-500 hover:text-primary transition-colors">
                                    <i class="far fa-comment"></i> <span class="ml-1">{{ $post->comments_count }}</span>
                                </button>
                                <button class="text-gray-500 hover:text-primary transition-colors">
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Contenu de l'article -->
                        <div class="prose max-w-none text-gray-700 mb-8">
                            {{$post->content}}
                        </div>
                        
                        <!-- Section des commentaires -->
                        <div class="border-t border-gray-200 pt-8 mb-8">
                            <h3 class="text-xl font-bold text-secondary mb-6">Commentaires ({{ $post->comments->count() }})</h3>
                            
                            <!-- 
                            BOUCLE POUR LES COMMENTAIRES
                            Remplacer par :
                            @foreach($post->comments as $comment)
                            -->
                            
                            <!-- Commentaire 1 - EXEMPLE STATIQUE -->
                            <div class="bg-gray-50 rounded-xl p-6 mb-6">
                                <div class="flex justify-between items-center mb-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-secondary flex items-center justify-center text-white text-sm font-bold mr-3">
                                            {{ substr($comment->user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $comment->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $comment->created_at->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                    <button class="text-gray-500 hover:text-primary transition-colors">
                                        <i class="far fa-heart"></i> <span class="ml-1">{{ $comment->likes_count }}</span>
                                    </button>
                                </div>
                                <p class="text-gray-700">{{ $comment->content }}</p>
                            </div>
                            
                            <!-- 
                            @endforeach
                            
                            Si aucun commentaire :
                            @if($post->comments->isEmpty())
                            <p class="text-gray-500 text-center py-4">Aucun commentaire pour le moment. Soyez le premier à réagir !</p>
                            @endif
                            -->
                            
                            <!-- Formulaire d'ajout de commentaire -->
                            <!-- Afficher seulement si l'utilisateur est connecté -->
                            @auth
                            <form class="mt-8" action="{{ route('comments.store', $post->id) }}" method="POST">
                                @csrf
                                <h4 class="text-lg font-medium text-secondary mb-4">Ajouter un commentaire</h4>
                                <div class="mb-4">
                                    <label for="comment-content" class="block text-gray-700 mb-2 font-medium">Votre commentaire</label>
                                    <textarea id="comment-content" name="content" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Partagez votre opinion..."></textarea>
                                    @error('content')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-secondary transition-colors font-medium">
                                    Publier le commentaire
                                </button>
                            </form>
                            @else
                            <div class="mt-8 text-center">
                                <p class="text-gray-600 mb-4">Vous devez être connecté pour poster un commentaire.</p>
                                <a href="{{ route('login') }}" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition-colors">
                                    Se connecter
                                </a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </article>
                
                <div class="text-center mt-8">
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center text-primary font-medium hover:text-secondary transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Retour aux articles
                    </a>
                </div>
            </div>
        </section>

        <!-- 
        SECTION CRÉATION D'ARTICLE
        Cette section sera dans un fichier Blade séparé, par exemple create.blade.php
        -->
        <section id="create" class="py-16 bg-white">
            <div class="container mx-auto px-4 max-w-3xl">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-secondary mb-4">Publier un nouvel article</h2>
                    <p class="text-gray-600">Partagez vos connaissances et expériences avec la communauté</p>
                </div>
                
                <!-- Formulaire de création d'article -->
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
                        <label for="post-category" class="block text-gray-700 mb-2 font-medium">Catégorie</label>
                        <select id="post-category" name="category_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">Sélectionnez une catégorie</option>
                            <!-- 
                            BOUCLE POUR LES CATÉGORIES
                            @foreach($categories as $category)
                            -->
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            <!-- 
                            @endforeach
                            -->
                        </select>
                        @error('category_id')
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
                    
                    <div class="mb-6">
                        <label for="post-tags" class="block text-gray-700 mb-2 font-medium">Tags</label>
                        <input type="text" id="post-tags" name="tags" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Séparer les tags par des virgules" value="{{ old('tags') }}">
                        <p class="text-sm text-gray-500 mt-1">Exemple: développement, web, tendances</p>
                        @error('tags')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-col sm:flex-row justify-between gap-4">
                        <a href="{{ route('posts.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 transition-colors font-medium text-center">
                            Annuler
                        </a>
                        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-secondary transition-colors font-medium">
                            <i class="fas fa-paper-plane mr-2"></i> Publier l'article
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Pied de page -->
    <footer class="bg-secondary text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 rounded-full bg-tertiary flex items-center justify-center">
                            <span class="text-primary font-bold text-xl">N</span>
                        </div>
                        <h2 class="text-2xl font-bold">Nexus<span class="text-tertiary">Blog</span></h2>
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">
                        Une plateforme moderne pour partager vos idées, découvrir de nouveaux contenus et connecter avec une communauté de passionnés.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-tertiary transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-tertiary transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-tertiary transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Navigation</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-tertiary transition-colors">Accueil</a></li>
                        <li><a href="{{ route('posts.index') }}" class="text-gray-300 hover:text-tertiary transition-colors">Articles</a></li>
                        <li><a href="{{ route('posts.create') }}" class="text-gray-300 hover:text-tertiary transition-colors">Écrire</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-tertiary transition-colors">À propos</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Catégories</h3>
                    <ul class="space-y-2">
                        <!-- 
                        BOUCLE POUR LES CATÉGORIES POPULAIRES
                        @foreach($popular_categories as $category)
                        -->
                        <li><a href="{{ route('categories.show', $category->slug) }}" class="text-gray-300 hover:text-tertiary transition-colors">{{ $category->name }}</a></li>
                        <!-- 
                        @endforeach
                        -->
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© {{ date('Y') }} NexusBlog. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Script pour la navigation et fonctionnalités -->
    <script>
        // Navigation entre les pages
        function showPage(pageId) {
            // Masquer toutes les pages
            document.querySelectorAll('main > section').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Afficher la page demandée
            document.getElementById(pageId).classList.remove('hidden');
            
            // Mettre à jour la navigation active
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('text-tertiary');
            });
            
            // Mettre à jour l'URL (simulation)
            window.history.pushState({}, '', `#${pageId}`);
            
            // Scroll vers le haut
            window.scrollTo(0, 0);
        }
        
        // Barre de progression de lecture
        function updateProgressBar() {
            const winHeight = window.innerHeight;
            const docHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset;
            const progress = (scrollTop / (docHeight - winHeight)) * 100;
            document.getElementById('readingProgress').style.width = progress + '%';
        }
        
        // Au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            // Afficher la page d'accueil par défaut
            const hash = window.location.hash.substring(1);
            if (hash && document.getElementById(hash)) {
                showPage(hash);
            } else {
                showPage('home');
            }
            
            // Gérer les clics sur les liens de navigation
            document.querySelectorAll('a[href^="#"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const href = this.getAttribute('href').substring(1);
                    if (document.getElementById(href)) {
                        showPage(href);
                    }
                });
            });
            
            // Initialiser la barre de progression
            window.addEventListener('scroll', updateProgressBar);
            updateProgressBar();
            
            // Animation d'entrée pour les articles
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('article').forEach(article => {
                article.style.opacity = '0';
                article.style.transform = 'translateY(20px)';
                article.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(article);
            });
        });
    </script>
</body>
</html>