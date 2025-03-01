<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing - Solution professionnelle de gestion de tickets</title>
    <meta name="description" content="Système avancé de gestion de tickets pour le suivi professionnel des problèmes logiciels">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        card: '0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03)',
                        feature: '0 4px 20px rgba(0, 0, 0, 0.07)',
                    }
                }
            }
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-hero {
            background: linear-gradient(135deg, #0ea5e9 0%, #075985 100%);
        }
        .blob-shape {
            border-radius: 71% 29% 41% 59% / 59% 51% 49% 41%;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .dot-pattern {
            background-image: radial-gradient(circle, #e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }
        @keyframes fade-in {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out forwards;
    }
    @keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.footer-anim {
    animation: fadeInUp 1s ease-out;
}

.icon-anim {
    opacity: 0;
    transform: scale(0.8);
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.icon-anim:hover {
    transform: scale(1.2);
}

.icon-anim.animated {
    opacity: 1;
    transform: scale(1);
}
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}

.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
.delay-500 { animation-delay: 0.5s; }
.delay-700 { animation-delay: 0.7s; }

    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <div class="flex items-center">
                        <i class="fas fa-ticket-alt text-primary-600 text-2xl mr-2"></i>
                        <span class="text-primary-700 text-xl font-bold tracking-tight">Ticketing</span>
                    </div>
                </div>
                <div class="hidden md:ml-10 md:flex md:space-x-8">
                    <a href="#features" class="text-gray-600 hover:text-primary-600 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                        Fonctionnalités
                    </a>
                    <a href="#témoignages" class="text-gray-600 hover:text-primary-600 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                        Témoignages
                    </a>
                    <a href="#pricing" class="text-gray-600 hover:text-primary-600 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                        Tarifs
                    </a>
                    <a href="#contact" class="text-gray-600 hover:text-primary-600 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                        Contact
                    </a>
                </div>
            </div>
            <div class="flex items-center">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-5 py-2.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors duration-200">
                            Connexion
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 shadow-sm transition-colors duration-200">
                                Essai gratuit
                            </a>
                        @endif
                        <button type="button" class="ml-2 md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500">
                            <i class="fas fa-bars"></i>
                        </button>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section class="relative overflow-hidden">
    <div class="absolute inset-0 z-0 dot-pattern opacity-70 animate-fadeIn"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-center">
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left z-10 animate-slideInLeft">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-primary-50 border border-primary-100 mb-6 animate-pulse">
                    <span class="text-xs font-semibold text-primary-700 uppercase tracking-wide">
                        <i class="fas fa-rocket mr-1"></i> Nouvelle version 2.5
                    </span>
                </div>
                <h1 class="animate-fadeInUp">
                    <span class="block text-3xl tracking-tight font-extrabold sm:text-4xl xl:text-5xl">
                        <span class="block text-gray-900 leading-tight">Une gestion de tickets</span>
                        <span class="block text-primary-600 mt-1">à la hauteur de vos ambitions</span>
                    </span>
                </h1>
                <p class="mt-5 text-base text-gray-500 sm:text-lg lg:text-base xl:text-lg leading-relaxed animate-fadeInUp delay-100">
                    Notre plateforme complète vous permet de gérer efficacement les demandes d'assistance, de suivre précisément les problèmes techniques et d'améliorer considérablement la communication entre vos équipes et vos clients.
                </p>
                <div class="mt-8 sm:flex sm:justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-4 animate-fadeInUp delay-200">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-lg text-white bg-primary-600 hover:bg-primary-700 transition-transform transform hover:scale-105 duration-200">
                        <span class="mr-2">Commencer gratuitement</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                    <a href="#demo" class="w-full sm:w-auto flex items-center justify-center px-6 py-3 border border-gray-200 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-transform transform hover:scale-105 duration-200">
                        <i class="fas fa-play text-primary-600 mr-2"></i>
                        Voir la démo
                    </a>
                </div>
                <div class="mt-8 flex items-center text-gray-500 text-sm animate-fadeInUp delay-300">
                    <div class="flex -space-x-2 mr-3">
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white animate-bounce" src="{{ asset(path: 'storage/images/cegedem.png') }}" alt="">
                       
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white animate-bounce delay-200" src="{{ asset(path: 'storage/images/yieled.jpg') }}" alt="">
                         <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white animate-bounce delay-100" src="{{ asset(path: 'storage/images/capg.png') }}" alt="">
                    </div>
                    <div>
                        <span class="font-medium text-gray-900">+2500</span> entreprises satisfaites
                    </div>
                </div>
            </div>
            <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-span-6 relative animate-slideInRight">
                <div class="relative mx-auto w-full lg:max-w-lg">
                    <div class="absolute top-0 left-0 w-full h-full bg-primary-600 opacity-10 blob-shape transform -translate-x-6 -translate-y-6 animate-pulse"></div>
                    <div class="bg-white rounded-xl shadow-card p-4 transform rotate-1 hover:rotate-0 transition-transform duration-300">
                        <div class="bg-gray-50 rounded-lg overflow-hidden">
                            <div class="h-4 bg-gray-100 flex items-center px-2 mb-1">
                                <div class="flex space-x-1">
                                    <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                </div>
                            </div>
                            <img class="w-full h-auto rounded-b-lg shadow-sm animate-fadeIn" src="{{ asset(path: 'storage/images/hero-bg.png') }}" alt="Ticketing Dashboard" />
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 p-3 bg-white rounded-lg shadow-lg animate-fadeInUp delay-400">
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-600 animate-bounce">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">Résolution rapide</div>
                                <div class="text-xs text-gray-500">+40% d'efficacité</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Stats Section -->
    <section class="relative overflow-hidden bg-white py-12 border-t border-b border-gray-100">
    <div class="absolute inset-0 z-0 dot-pattern opacity-50 animate-fadeIn"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-5 md:grid-cols-4 animate-fadeInUp">
            <div class="flex flex-col items-center p-5 transition-transform transform hover:scale-105">
                <div class="text-primary-600 mb-2 animate-bounce">
                    <i class="fas fa-ticket-alt text-3xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900">15M+</div>
                <div class="text-sm text-gray-500 text-center mt-1">Tickets gérés</div>
            </div>
            
            <div class="flex flex-col items-center p-5 transition-transform transform hover:scale-105">
                <div class="text-primary-600 mb-2 animate-bounce delay-100">
                    <i class="fas fa-building text-3xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900">2.5K+</div>
                <div class="text-sm text-gray-500 text-center mt-1">Entreprises</div>
            </div>
            
            <div class="flex flex-col items-center p-5 transition-transform transform hover:scale-105">
                <div class="text-primary-600 mb-2 animate-bounce delay-200">
                    <i class="fas fa-clock text-3xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900">-45%</div>
                <div class="text-sm text-gray-500 text-center mt-1">Temps de résolution</div>
            </div>
            
            <div class="flex flex-col items-center p-5 transition-transform transform hover:scale-105">
                <div class="text-primary-600 mb-2 animate-bounce delay-300">
                    <i class="fas fa-star text-3xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900">4.8/5</div>
                <div class="text-sm text-gray-500 text-center mt-1">Satisfaction client</div>
            </div>
        </div>
    </div>
</section>


    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-primary-50 mb-3 animate-fade-in-up">
                <span class="text-xs font-semibold text-primary-700">
                    Fonctionnalités
                </span>
            </div>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl animate-fade-in-up delay-100">
                Un système complet pour votre service client
            </h2>
            <p class="mt-4 text-xl text-gray-500 animate-fade-in-up delay-200">
                Découvrez comment notre plateforme transforme la gestion des demandes d'assistance et améliore la satisfaction client.
            </p>
        </div>

        <div class="mt-16">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Feature Card 1 -->
                <div class="bg-white rounded-xl p-8 border border-gray-100 shadow-feature transition-all duration-300 transform hover:scale-105 hover:border-primary-100 opacity-0 animate-fade-in-up delay-300">
                    <div class="flex items-center justify-center h-14 w-14 rounded-full bg-primary-100 text-primary-600 mb-6">
                        <i class="fas fa-ticket-alt text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">Gestion intelligente des tickets</h3>
                        <p class="mt-4 text-base text-gray-500 leading-relaxed">
                            Organisez et priorisez automatiquement les tickets selon leur urgence. Notre système d'IA détecte les problèmes similaires et suggère des solutions éprouvées.
                        </p>
                        <div class="mt-5">
                            <a href="#" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                                En savoir plus <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-white rounded-xl p-8 border border-gray-100 shadow-feature transition-all duration-300 transform hover:scale-105 hover:border-primary-100 opacity-0 animate-fade-in-up delay-500">
                    <div class="flex items-center justify-center h-14 w-14 rounded-full bg-primary-100 text-primary-600 mb-6">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">Gestion avancée des accès</h3>
                        <p class="mt-4 text-base text-gray-500 leading-relaxed">
                            Définissez des permissions granulaires pour chaque rôle. Créez des groupes personnalisés et attribuez exactement les droits nécessaires à chaque membre de l'équipe.
                        </p>
                        <div class="mt-5">
                            <a href="#" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                                En savoir plus <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-white rounded-xl p-8 border border-gray-100 shadow-feature transition-all duration-300 transform hover:scale-105 hover:border-primary-100 opacity-0 animate-fade-in-up delay-700">
                    <div class="flex items-center justify-center h-14 w-14 rounded-full bg-primary-100 text-primary-600 mb-6">
                        <i class="fas fa-comments text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">Communication centralisée</h3>
                        <p class="mt-4 text-base text-gray-500 leading-relaxed">
                            Intégrez tous vos canaux de communication en un seul endroit. E-mails, chat, appels — tous les échanges sont enregistrés et liés au ticket correspondant.
                        </p>
                        <div class="mt-5">
                            <a href="#" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                                En savoir plus <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>



<!--Workflow -->

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-primary-50 mb-3">
                <span class="text-xs font-semibold text-primary-700">
                    Workflow
                </span>
            </div>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl animate__animated animate__fadeInUp">
                Un processus fluide et transparent
            </h2>
            <p class="mt-4 text-xl text-gray-500 animate__animated animate__fadeInUp animate__delay-1s">
                Suivez chaque demande de sa création à sa résolution grâce à notre processus optimisé
            </p>
        </div>

        <div class="relative animate__animated animate__fadeIn animate__delay-2s">
            <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                        <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r transition-all duration-500 transform hover:scale-105 hover:shadow-xl animate__animated animate__fadeInUp">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                Création automatisée
                            </dt>
                            <dd class="order-1 text-5xl font-extrabold text-primary-600">
                                <i class="fas fa-plus-circle"></i>
                            </dd>
                        </div>
                        <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r transition-all duration-500 transform hover:scale-105 hover:shadow-xl animate__animated animate__fadeInUp animate__delay-1s">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                Traitement intelligent
                            </dt>
                            <dd class="order-1 text-5xl font-extrabold text-primary-600">
                                <i class="fas fa-cogs"></i>
                            </dd>
                        </div>
                        <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l transition-all duration-500 transform hover:scale-105 hover:shadow-xl animate__animated animate__fadeInUp animate__delay-2s">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                Résolution rapide
                            </dt>
                            <dd class="order-1 text-5xl font-extrabold text-primary-600">
                                <i class="fas fa-check-circle"></i>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition-all duration-500 transform hover:scale-105 hover:shadow-xl animate__animated animate__fadeInUp animate__delay-3s">
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center text-primary-600 font-bold text-xl mb-4">1</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Création du ticket</h3>
                <p class="text-gray-500">Le client soumet une demande via le portail web, l'email ou l'intégration API</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition-all duration-500 transform hover:scale-105 hover:shadow-xl animate__animated animate__fadeInUp animate__delay-4s">
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center text-primary-600 font-bold text-xl mb-4">2</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Assignation automatique</h3>
                <p class="text-gray-500">Le système analyse le contenu et assigne le ticket à l'agent le plus qualifié</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition-all duration-500 transform hover:scale-105 hover:shadow-xl animate__animated animate__fadeInUp animate__delay-5s">
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center text-primary-600 font-bold text-xl mb-4">3</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Résolution collaborative</h3>
                <p class="text-gray-500">Les équipes travaillent ensemble pour résoudre le problème efficacement</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition-all duration-500 transform hover:scale-105 hover:shadow-xl animate__animated animate__fadeInUp animate__delay-6s">
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center text-primary-600 font-bold text-xl mb-4">4</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Validation et feedback</h3>
                <p class="text-gray-500">Le client confirme la résolution et fournit une évaluation de la qualité</p>
            </div>
        </div>
    </div>
</section>



    <!-- Testimonials Section -->
    <section id="témoignages" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-primary-50 mb-3">
                <span class="text-xs font-semibold text-primary-700">Témoignages</span>
            </div>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Ce que nos clients disent</h2>
            <p class="mt-4 text-xl text-gray-500">Découvrez comment Ticketing transforme le support client des entreprises comme la vôtre</p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Premier témoignage -->
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 transform transition duration-500 hover:scale-105">
                <div class="flex items-center mb-6 text-primary-500">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                </div>
                <blockquote class="text-gray-700 mb-6">"Depuis que nous avons adopté Ticketing, notre temps de résolution a diminué de 40%. L'interface intuitive et les automatisations nous font gagner un temps précieux."</blockquote>
                <div class="flex items-center">
                    <img class="h-12 w-12 rounded-full" src="{{ asset(path: 'storage/images/thomas.jpg') }}" alt="Photo de Thomas Dupont">
                    <div class="ml-4">
                        <div class="font-medium text-gray-900">Thomas Dupont</div>
                        <div class="text-gray-500 text-sm">Directeur IT, Solaris Technologies</div>
                    </div>
                </div>
            </div>

            <!-- Deuxième témoignage -->
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 transform transition duration-500 hover:scale-105">
                <div class="flex items-center mb-6 text-primary-500">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i>
                </div>
                <blockquote class="text-gray-700 mb-6">"Ticketing nous a permis de mieux organiser nos demandes clients et d'améliorer notre satisfaction client de 30%. Un outil indispensable !"</blockquote>
                <div class="flex items-center">
                    <img class="h-12 w-12 rounded-full" src="{{ asset(path: 'storage/images/sophie.jpg') }}" alt="Photo de Sophie Martin">
                    <div class="ml-4">
                        <div class="font-medium text-gray-900">Sophie Martin</div>
                        <div class="text-gray-500 text-sm">Responsable Service Client, TechCorp</div>
                    </div>
                </div>
            </div>

            <!-- Troisième témoignage -->
            <div data-aos="fade-up" data-aos-delay="300" class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 transform transition duration-500 hover:scale-105">
                <div class="flex items-center mb-6 text-primary-500">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i>
                </div>
                <blockquote class="text-gray-700 mb-6">"Une solution qui nous a fait gagner un temps précieux en simplifiant la gestion de nos tickets. Notre équipe est plus efficace et les clients plus satisfaits."</blockquote>
                <div class="flex items-center">
                    <img class="h-12 w-12 rounded-full" src="{{ asset(path: 'storage/images/julien.jpg') }}" alt="Photo de Julien Lefevre">
                    <div class="ml-4">
                        <div class="font-medium text-gray-900">Julien Lefevre</div>
                        <div class="text-gray-500 text-sm">CEO, StartUpX</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Tarifs -->
<section id="pricing" class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center animate-fade-in">
        <div class="inline-flex items-center px-3 py-1 rounded-full bg-primary-50 mb-3 opacity-0 translate-y-10 transition-all duration-700 delay-200 animate-fade-in">
            <span class="text-xs font-semibold mb-4 text-primary-700">Tarifs</span>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl opacity-0 translate-y-10 transition-all duration-700 delay-300 animate-fade-in">
            Nos Tarifs
        </h2>
        <p class="mt-4 text-lg text-gray-600 opacity-0 translate-y-10 transition-all duration-700 delay-400 animate-fade-in">
            Choisissez le plan qui convient le mieux à votre entreprise.
        </p>

        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Plan Gratuit -->
            <div class="bg-white rounded-lg shadow-md p-8 border border-gray-200 opacity-0 translate-y-10 transition-all duration-700 delay-500 animate-fade-in hover:scale-105 transition-transform">
                <h3 class="text-xl font-semibold text-gray-900">Gratuit</h3>
                <p class="mt-2 text-gray-600">Idéal pour découvrir notre plateforme.</p>
                <div class="mt-4 text-4xl font-bold text-primary-600">0€</div>
                <p class="text-gray-500">par mois</p>
                <ul class="mt-6 space-y-3 text-gray-600">
                    <li>✅ 5 tickets par mois</li>
                    <li>✅ Accès de base</li>
                    <li>✅ Support communautaire</li>
                </ul>
                <a href="#" class="mt-6 inline-block w-full text-center px-6 py-3 bg-primary-600 text-white font-medium rounded-lg shadow-md hover:bg-primary-700 transition">Commencer</a>
            </div>

            <!-- Plan Professionnel -->
            <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200 ring-2 ring-primary-500 opacity-0 translate-y-10 transition-all duration-700 delay-600 animate-fade-in hover:scale-105 transition-transform">
                <h3 class="text-xl font-semibold text-gray-900">Professionnel</h3>
                <p class="mt-2 text-gray-600">Parfait pour les entreprises en croissance.</p>
                <div class="mt-4 text-4xl font-bold text-primary-600">29€</div>
                <p class="text-gray-500">par mois</p>
                <ul class="mt-6 space-y-3 text-gray-600">
                    <li>✅ Tickets illimités</li>
                    <li>✅ Support prioritaire</li>
                    <li>✅ Tableaux de bord avancés</li>
                    <li>✅ Intégration Slack</li>
                </ul>
                <a href="#" class="mt-6 inline-block w-full text-center px-6 py-3 bg-primary-600 text-white font-medium rounded-lg shadow-md hover:bg-primary-700 transition">Essai gratuit</a>
            </div>

            <!-- Plan Entreprise -->
            <div class="bg-white rounded-lg shadow-md p-8 border border-gray-200 opacity-0 translate-y-10 transition-all duration-700 delay-700 animate-fade-in hover:scale-105 transition-transform">
                <h3 class="text-xl font-semibold text-gray-900">Entreprise</h3>
                <p class="mt-2 text-gray-600">Solution complète pour grandes équipes.</p>
                <div class="mt-4 text-4xl font-bold text-primary-600">99€</div>
                <p class="text-gray-500">par mois</p>
                <ul class="mt-6 space-y-3 text-gray-600">
                    <li>✅ Toutes les fonctionnalités</li>
                    <li>✅ Support dédié 24/7</li>
                    <li>✅ Sécurité avancée</li>
                    <li>✅ API et intégrations personnalisées</li>
                </ul>
                <a href="#" class="mt-6 inline-block w-full text-center px-6 py-3 bg-primary-600 text-white font-medium rounded-lg shadow-md hover:bg-primary-700 transition">Contactez-nous</a>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center max-w-3xl mx-auto mb-16 animate-fade-in">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-primary-50 mb-3 animate-bounce">
                <span class="text-xs font-semibold text-primary-700">Contact</span>
            </div>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Parlons de votre projet
            </h2>
            <p class="mt-4 text-xl text-gray-500">
                Notre équipe est là pour répondre à toutes vos questions et vous accompagner dans la mise en place de votre solution.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 animate-slide-in">
            <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 transform hover:scale-105 transition-transform duration-300">
                <form action="" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 block p-1 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 block p-1 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email professionnel</label>
                        <input type="email" name="email" id="email" class="mt-1 block p-1 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    </div>

                    <div>
                        <label for="company" class="block text-sm font-medium text-gray-700">Entreprise</label>
                        <input type="text" name="company" id="company" class="mt-1 block p-1 w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" class="mt-1 block  w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" name="privacy" id="privacy" class="mt-1 h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <label for="privacy" class="ml-2 block text-sm text-gray-500">
                            J'accepte de recevoir des communications marketing de Ticketing. Je peux me désinscrire à tout moment.
                        </label>
                    </div>

                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-transform duration-300 transform hover:scale-105">
                        Envoyer le message
                    </button>
                </form>
            </div>

            <div class="space-y-8 animate-slide-in delay-200">
                <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 transform hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Nos bureaux</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-primary-600 mt-1"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-base text-gray-900">Maroc</p>
                                <p class="text-sm text-gray-500">38 lot somob Qu oued el bacha<br>Safi , Maroc</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-phone text-primary-600 mt-1"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-base text-gray-900">Téléphone</p>
                                <p class="text-sm text-gray-500">+212620311867</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-envelope text-primary-600 mt-1"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-base text-gray-900">Email</p>
                                <p class="text-sm text-gray-500">safaeettalhi@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 transform hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Horaires d'ouverture</h3>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">
                            <span class="font-medium text-gray-900">Lundi - Vendredi:</span> 9h00 - 18h00
                        </p>
                        <p class="text-sm text-gray-500">
                            <span class="font-medium text-gray-900">Support 24/7</span> pour les clients Premium
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-200 text-white py-12 footer-anim">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex justify-center space-x-6 mb-6">
            <a href="#" class="text-gray-400 hover:text-blue-500 transition duration-300 icon-anim">
                <span class="sr-only">Facebook</span>
                <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300 icon-anim">
                <span class="sr-only">Twitter</span>
                <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-300 transition duration-300 icon-anim">
                <span class="sr-only">GitHub</span>
                <i class="fab fa-github fa-lg"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-300 icon-anim">
                <span class="sr-only">LinkedIn</span>
                <i class="fab fa-linkedin fa-lg"></i>
            </a>
        </div>
        <p class="text-gray-500">&copy; 2025 Ticketing. Tous droits réservés.</p>
    </div>
</footer>


</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const icons = document.querySelectorAll(".icon-anim");
    icons.forEach((icon, index) => {
        setTimeout(() => {
            icon.classList.add("animated");
        }, index * 200); 
    });
      document.getElementById("contact").classList.add("opacity-100", "translate-y-0");
});

</script>
</html>