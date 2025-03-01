<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-lg border border-blue-200 shadow-sm text-center">
                                <h3 class="text-lg font-semibold text-blue-700 mb-2">Total de mes tickets</h3>
                                <p class="text-3xl font-bold text-blue-800">{{ $totalTickets }}</p>
                            </div>
                            <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-6 rounded-lg border border-yellow-200 shadow-sm text-center">
                                <h3 class="text-lg font-semibold text-yellow-700 mb-2">Mes tickets ouverts</h3>
                                <p class="text-3xl font-bold text-yellow-800">{{ $openTickets }}</p>
                            </div>
                           
                        </div>

                        <div class="flex flex-col md:flex-row items-center gap-4 mb-8">
    <!-- Bouton Créer un ticket -->
    <a href="{{ route('tickets.create') }}" 
        class="flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300 shadow-md">
        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Nouveau ticket
    </a>

    <!-- Formulaire de recherche -->
    <form action="{{ route('dashboard') }}" method="GET" class="flex flex-1 items-center w-full md:w-auto mt-4">
        <div class="relative w-full">
            <input type="text" name="search" placeholder="Rechercher un ticket..." 
                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300">
            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        <button type="submit" class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-6 rounded-lg transition duration-300">
            Rechercher
        </button>
    </form>
</div>


                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-semibold text-gray-800">Mes tickets</h3>
                                <div class="text-sm text-gray-500">
                                    {{ $tickets->total() }} tickets au total
                                </div>
                            </div>
                            
                            <div class="overflow-x-auto bg-white rounded-lg border border-gray-200 shadow-sm">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <a href="{{ route('dashboard', ['sort' => 'title', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}" 
                                                   class="flex items-center group">
                                                    Titre
                                                    <svg class="w-4 h-4 ml-1 text-gray-400 group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <a href="{{ route('dashboard', ['sort' => 'priority', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}"
                                                   class="flex items-center group">
                                                    Priorité
                                                    <svg class="w-4 h-4 ml-1 text-gray-400 group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <a href="{{ route('dashboard', ['sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}"
                                                   class="flex items-center group">
                                                    Statut
                                                    <svg class="w-4 h-4 ml-1 text-gray-400 group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <a href="{{ route('dashboard', ['sort' => 'created_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}"
                                                   class="flex items-center group">
                                                    Date de création
                                                    <svg class="w-4 h-4 ml-1 text-gray-400 group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </th>
                                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($tickets as $ticket)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4">
                                                    <div class="font-medium text-gray-900">{{ $ticket->title }}</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if($ticket->priority == 'haute')
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            {{ ucfirst($ticket->priority) }}
                                                        </span>
                                                    @elseif($ticket->priority == 'moyenne')
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                            {{ ucfirst($ticket->priority) }}
                                                        </span>
                                                    @else
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{ ucfirst($ticket->priority) }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if($ticket->status == 'ouvert')
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                            {{ ucfirst($ticket->status) }}
                                                        </span>
                                                    @elseif($ticket->status == 'en cours')
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                                            {{ ucfirst($ticket->status) }}
                                                        </span>
                                                    @elseif($ticket->status == 'résolu')
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{ ucfirst($ticket->status) }}
                                                        </span>
                                                    @else
                                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                            {{ ucfirst($ticket->status) }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $ticket->created_at->format('d/m/Y H:i') }}
                                                </td>
                                                <td class="px-6 py-4 text-right text-sm font-medium">
                                                    <a href="{{ route('tickets.show', $ticket) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-lg transition-colors">
                                                        Voir
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="mt-6">
                                {{ $tickets->links() }}
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>