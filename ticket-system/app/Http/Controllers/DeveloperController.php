<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id(); // Utilisation correcte dans Laravel 11

        $assignedTickets = Ticket::where('assigned_to', $userId)->count();
        $resolvedTickets = Ticket::where('assigned_to', $userId)
            ->where('status', 'resolved')
            ->count();
        $recentTickets = Ticket::where('assigned_to', $userId)
            ->with(['user', 'software'])
            ->latest()
            ->take(5)
            ->get();

        return view('developer.dashboard', compact(
            'assignedTickets',
            'resolvedTickets',
            'recentTickets'
        ));
    }

    public function assignedTickets()
    {
        $userId = Auth::id();

        $tickets = Ticket::where('assigned_to', $userId)
            ->with(['user', 'software'])
            ->latest()
            ->paginate(10);

        return view('developer.tickets.index', compact('tickets'));
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'status' => 'required|in:in_progress,resolved,closed'
        ]);

        $ticket->update($validated);

        if ($validated['status'] === 'resolved') {
            $ticket->update(['resolved_at' => now()]);
        }

        return back()->with('success', 'Statut du ticket mis à jour.');
    }
}