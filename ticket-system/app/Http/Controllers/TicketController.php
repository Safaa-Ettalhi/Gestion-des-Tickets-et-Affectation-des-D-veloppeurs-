<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Software;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->paginate(10);
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $software = Software::all();
        return view('tickets.create', compact('software'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:low,medium,high',
            'operating_system' => 'required|max:255',
            'software_id' => 'required|exists:software,id',
        ]);

        $ticket = new Ticket($validatedData);
        $ticket->user_id = Auth::id();
        $ticket->status = 'open';
        $ticket->save();

        return redirect()->route('dashboard')->with('success', 'Ticket créé avec succès.');
    }

    public function show(Ticket $ticket)
    {
        Gate::authorize('view', $ticket);
        return view('tickets.show', compact('ticket'));
    }

    public function showAssignForm(Ticket $ticket)
    {
        Gate::authorize('assign', $ticket);
        $developers = User::where('role', 'developer')->get();
        return view('tickets.assign', compact('ticket', 'developers'));
    }


    public function assign(Request $request, Ticket $ticket)
{
    $validatedData = $request->validate([
        'developer_id' => 'required|exists:users,id',
    ]);

    $ticket->assigned_to = $validatedData['developer_id'];
    $ticket->assigned_by = Auth::id();
    $ticket->assigned_at = now(); 
    $ticket->save();

    return redirect()->route('dashboard')->with('success', 'Ticket assigné avec succès.');
}

    public function showUpdateStatusForm(Ticket $ticket)
    {
        Gate::authorize('updateStatus', $ticket);
        return view('tickets.update-status', compact('ticket'));
    }
public function storeComment(Request $request, Ticket $ticket)
{
    $validatedData = $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    // Création du commentaire
    $comment = new Comment();
    $comment->content = $validatedData['content'];
    $comment->ticket_id = $ticket->id;
    $comment->user_id = Auth::id();
    $comment->save();

    return redirect()->route('tickets.show', $ticket)->with('success', 'Commentaire ajouté avec succès.');
}

    public function updateStatus(Request $request, Ticket $ticket)
{
    $validatedData = $request->validate([
        'status' => 'required|in:in_progress,resolved,closed',
    ]);

    $ticket->status = $validatedData['status'];
    $ticket->save();

    return redirect()->route('dashboard')->with('success', 'Statut du ticket mis à jour avec succès.');
}
  
public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('dashboard')->with('success', 'Logiciel supprimé avec succès.');
    }  

    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }
}