<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return $this->adminDashboard($request);
        } elseif ($user->isDeveloper()) {
            return $this->developerDashboard($request);
        } else {
            return $this->userDashboard($request);
        }
    }

    private function userDashboard(Request $request)
    {
        $query = Ticket::where('user_id', Auth::id());

        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');
        $query->orderBy($sort, $direction);

        $tickets = $query->paginate(10);
        $totalTickets = Ticket::where('user_id', Auth::id())->count();
        $openTickets = Ticket::where('user_id', Auth::id())->where('status', 'open')->count();
        $resolvedTickets = Ticket::where('user_id', Auth::id())->where('status', 'resolved')->count();
        $recentTickets = Ticket::where('user_id', Auth::id())->latest()->take(5)->get();
        $software = Software::all();

        return view('dashboard', compact('tickets', 'totalTickets', 'openTickets', 'resolvedTickets', 'recentTickets', 'software'));
    }

    private function adminDashboard(Request $request)
{
    $query = Ticket::with(['user', 'assignedTo']);

    if ($request->has('search')) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    $sort = $request->get('sort', 'created_at');
    $direction = $request->get('direction', 'desc');
    $query->orderBy($sort, $direction);

    $tickets = $query->paginate(10);
    $totalTickets = Ticket::count();
    $openTickets = Ticket::where('status', 'open')->count();
    $resolvedTickets = Ticket::where('status', 'resolved')->count();
    $assignedTickets = Ticket::whereNotNull('assigned_to')->count();
    $recentTickets = Ticket::latest()->take(5)->get();
    $developers = User::where('role', 'developer')->get();

    $totalUsers = User::count();
    $totalSoftware = Software::count();
    $recentUsers = User::latest()->take(5)->get();
    $recentSoftware = Software::latest()->take(5)->get();


    $inProgressTickets = Ticket::where('status', 'in_progress')->count();
    $closedTickets = Ticket::where('status', 'closed')->count();
    return view('dashboard', compact(
        'tickets', 'totalTickets', 'openTickets', 'resolvedTickets', 'assignedTickets', 
        'recentTickets', 'developers', 'totalUsers', 'totalSoftware', 'recentUsers', 'recentSoftware','inProgressTickets',
    ));
}

    private function developerDashboard(Request $request)
{
    $query = Ticket::where('assigned_to', Auth::id());

    if ($request->has('search')) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    $sort = $request->get('sort', 'created_at');
    $direction = $request->get('direction', 'desc');
    $query->orderBy($sort, $direction);

    $tickets = $query->paginate(10);
    $assignedTickets = Ticket::where('assigned_to', Auth::id())->count();
    $inProgressTickets = Ticket::where('assigned_to', Auth::id())->where('status', 'in_progress')->count();
    $resolvedTickets = Ticket::where('assigned_to', Auth::id())->where('status', 'resolved')->count();

    return view('dashboard', compact('tickets', 'assignedTickets', 'inProgressTickets', 'resolvedTickets'));
}
}