<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-blue-200 p-6 rounded-lg shadow-lg flex flex-col justify-between">
        <h3 class="text-xl font-semibold text-gray-700">Tickets assignés</h3>
        <p class="text-4xl font-extrabold text-blue-800">{{ $assignedTickets }}</p>
    </div>
    <div class="bg-yellow-200 p-6 rounded-lg shadow-lg flex flex-col justify-between">
        <h3 class="text-xl font-semibold text-gray-700">Tickets en cours</h3>
        <p class="text-4xl font-extrabold text-yellow-800">{{ $inProgressTickets }}</p>
    </div>
    <div class="bg-green-200 p-6 rounded-lg shadow-lg flex flex-col justify-between">
        <h3 class="text-xl font-semibold text-gray-700">Tickets résolus</h3>
        <p class="text-4xl font-extrabold text-green-800">{{ $resolvedTickets }}</p>
    </div>
</div>

<div class="mb-8">
    <h3 class="text-xl font-semibold text-gray-700 mb-5">Mes tickets assignés</h3>
    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Titre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Priorité</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Créé par</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date de création</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($tickets as $ticket)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($ticket->priority) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($ticket->status) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('tickets.show', $ticket) }}" class="text-indigo-600 hover:text-indigo-800">Voir</a>
                            <a href="#" onclick="openUpdateStatusModal({{ $ticket->id }})" class="text-green-600 hover:text-green-800 ml-4">Mettre à jour le statut</a>
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

<!-- Modal de mise à jour du statut -->
<div id="updateStatusModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-gray-500 bg-opacity-75" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full sm:w-96">
        <h3 class="text-xl font-semibold text-gray-800 mb-4" id="modal-title">Mettre à jour le statut du ticket</h3>
        <form id="updateStatusForm" action="{{ route('tickets.updateStatus', ':ticket_id') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Nouveau statut</label>
                <select name="status" id="status" class="mt-2 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="in_progress">En cours</option>
                    <option value="resolved">Résolu</option>
                    <option value="closed">Fermé</option>
                </select>
            </div>
            <div class="flex justify-end gap-4">
                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                    Mettre à jour
                </button>
                <button type="button" onclick="closeUpdateStatusModal()" class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openUpdateStatusModal(ticketId) {
        const form = document.getElementById('updateStatusForm');
        form.action = form.action.replace(':ticket_id', ticketId);
        document.getElementById('updateStatusModal').classList.remove('hidden');
    }

    function closeUpdateStatusModal() {
        document.getElementById('updateStatusModal').classList.add('hidden');
    }
</script>
