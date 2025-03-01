<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class AdminController extends Controller
{
    public function dashboard()
    {
        $totalTickets = Ticket::count();
        $openTickets = Ticket::where('status', 'open')->count();
        $resolvedTickets = Ticket::where('status', 'resolved')->count();
        $users = User::count();
        $recentTickets = Ticket::with(['user', 'software'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalTickets',
            'openTickets',
            'resolvedTickets',
            'users',
            'recentTickets'
        ));
    }

    public function users()
    {
        $users = User::withCount(['tickets', 'assignedTickets'])
            ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function tickets()
    {
        $tickets = Ticket::with(['user', 'assignedTo', 'software'])
            ->latest()
            ->paginate(10);
        $developers = User::where('role', 'developer')->get();
        return view('admin.tickets.index', compact('tickets', 'developers'));
    }

    public function software()
    {
        $software = Software::withCount('tickets')->paginate(10);
        return view('admin.software.index', compact('software'));
    }

    public function assignTicket(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'developer_id' => 'required|exists:users,id'
        ]);

        $ticket->update([
            'assigned_to' => $validated['developer_id'],
            'status' => 'in_progress'
        ]);

        return back()->with('success', 'Ticket assigné avec succès.');
    }


}