<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }
    public function dashboard()
    {
        $userId = Auth::id(); 

        $totalTickets = Ticket::where('user_id', $userId)->count();
        $openTickets = Ticket::where('user_id', $userId)
            ->where('status', 'open')
            ->count();
        $recentTickets = Ticket::where('user_id', $userId)
            ->with(['assignedTo', 'software'])
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', compact(
            'totalTickets',
            'openTickets',
            'recentTickets'
        ));
    }

    public function tickets()
    {
        $userId = Auth::id();

        $tickets = Ticket::where('user_id', $userId)
            ->with(['assignedTo', 'software'])
            ->latest()
            ->paginate(10);

        return view('user.tickets.index', compact('tickets'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:admin,developer,user',
    ]);

    try {
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
    } catch (\Exception $e) {
        return back()->withInput()->with('error', 'Une erreur est survenue lors de la création de l\'utilisateur : ' . $e->getMessage());
    }
}
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
           
            'role' => 'required|in:admin,developer,user',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'Rôle de l\'utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
