<!-- Dropdown menu -->
<html>
<div class="ml-3 relative">
    <div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ticketing</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <i class="fas fa-ticket-alt text-primary-600 text-2xl mr-2"></i>
                            <span class="text-xl font-bold text-gray-900">Ticketing</span>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                       

                       

<div class="ml-3 relative">
    <div class="ml-3 relative flex items-center">
        <span class="mr-2 text-gray-700 font-medium">
            {{ Auth::user()->name ?? 'Invité' }}
        </span>
        <button type="button" class="user bg-white flex text-sm rounded-full focus:outline-none" id="user-menu-button">
            <img class="h-8 w-8 rounded-full" src="data:image/png;base64,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" alt="">
        </button>
    </div>


    <div id="user-dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Votre Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Déconnexion
            </button>
        </form>
    </div>
</div>

                    </div>
                    <div class="-mr-2 flex items-center sm:hidden">
                 
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Ouvrir le menu principal</span>
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu">

                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="data:image/png;base64,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" alt="">
                        </div>

                    </div>
                    <div class="mt-3 space-y-1">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Profil</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Se déconnecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">


                    <div class="mb-6 relative">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 text-2xl absolute right-0">
    <i class="fas fa-times"></i> <!-- Icône de fermeture -->
</a>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $ticket->title }}</h3>
                        <p class="text-gray-600 mt-2">{{ $ticket->description }}</p>
                    </div>
                    
                    <div class="grid grid-cols-2  gap-6 mb-6">
                        <div class="space-y-4">
                            <p><strong>📌 Statut:</strong> <span class="text-indigo-600">{{ ucfirst($ticket->status) }}</span></p>
                            <p><strong>⚡ Priorité:</strong> <span class="text-red-500">{{ ucfirst($ticket->priority) }}</span></p>
                            <p><strong>👤 Créé par:</strong> {{ $ticket->user->name }}</p>
                        </div>
                        <div class="space-y-4">
                            <p><strong>💻 Système d'exploitation:</strong> {{ $ticket->operating_system }}</p>
                            <p><strong>🛠 Logiciel:</strong> {{ $ticket->software->name }}</p>
                            <p><strong>📌 Assigné à:</strong> {{ $ticket->assignedTo ? $ticket->assignedTo->name : 'Non assigné' }}</p>
                        </div>
                    </div>

                    @if($ticket->attachments->count() > 0)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-2">📎 Pièces jointes</h4>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach($ticket->attachments as $attachment)
                                    <li>
                                        <a href="{{ route('tickets.attachment.download', $attachment) }}" class="text-blue-600 hover:underline">
                                            {{ $attachment->filename }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-6">
                        <h4 class="text-lg font-semibold mb-2">💬 Commentaires</h4>
                        <div class="space-y-4">
                            @foreach($ticket->comments as $comment)
                                <div class="bg-gray-50 border border-gray-300 p-4 rounded-lg">
                                    <p class="mb-2 text-gray-700">{{ $comment->content }}</p>
                                    <p class="text-sm text-gray-500">Par <strong>{{ $comment->user->name }}</strong> le {{ $comment->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <form action="{{ route('tickets.comments.store', $ticket) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Ajouter un commentaire</label>
                            <textarea name="content" id="content" rows="3" class="mt-1 block w-full shadow-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition">
                                Ajouter le commentaire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <!-- Footer -->
      <footer class="bg-white">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500">
                    &copy; 2025 Ticketing. Tous droits réservés.
                </p>
            </div>
        </footer>
    </div>

    <script>
        // Toggle dropdown menu
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = userMenuButton.nextElementSibling;

        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });

        // Close the dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });

        // Toggle mobile menu
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenuButton.setAttribute('aria-expanded', mobileMenu.classList.contains('hidden') ? 'false' : 'true');
        });

        document.addEventListener("DOMContentLoaded", function () {
    const userMenuButton = document.getElementById("user-menu-button");
    const dropdownMenu = document.getElementById("user-dropdown");

    userMenuButton.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden");
    });

    // Cacher le menu lorsqu'on clique en dehors
    document.addEventListener("click", function (event) {
        if (!userMenuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
});

    </script>
</body>
</html>
