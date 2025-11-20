<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trio Blog | Design Moderne</title>
     
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
         <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Trio<span class="text-tertiary">Blog</span></h1>
        <div class="flex items-center space-x-4">
               
        <nav class="flex gap-6">
            <a href="{{ route('home') }}" class="hover:text-tertiary">Accueil</a>
            <a href="{{ route('posts.index') }}" class="hover:text-tertiary">Articles</a>
            <a href="{{ route('create') }}" class="hover:text-tertiary">Écrire</a>
        </nav>
    </div>
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
    
</header>