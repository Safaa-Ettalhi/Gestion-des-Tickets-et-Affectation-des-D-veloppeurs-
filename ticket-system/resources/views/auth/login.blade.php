<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Ticketing</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
   


        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-20 xl:px-24 bg-white">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Connexion à votre compte
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Ou
                        <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500">
                            commencez votre essai gratuit
                        </a>
                    </p>
                </div>
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                       
                        <label for="email" class="block text-sm mb-2 font-medium text-gray-700">
                            Adresse email
                        </label>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                            placeholder="nom@entreprise.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">
                            Mot de passe
                        </label>
                        <input id="password" name="password" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                            placeholder="Votre mot de passe">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                Se souvenir de moi
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500">
                                Mot de passe oublié ?
                            </a>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            Se connecter
                        </button>
                    </div>
                </form>
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">
                                Ou continuer avec
                            </span>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <button type="button"
                            class="w-full inline-flex justify-center items-center py-2.5 px-4 border border-gray-200 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150">
                            <i class="fab fa-google text-red-500 mr-2 text-lg"></i>
                            Google
                        </button>
                        <button type="button"
                            class="w-full inline-flex justify-center items-center py-2.5 px-4 border border-gray-200 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150">
                            <i class="fab fa-microsoft text-blue-500 mr-2 text-lg"></i>
                            Microsoft
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" 
                src="{{ asset('storage/images/login-register.avif') }}"
                alt="Support team working">
        </div>
    </div>
</body>
</html>
