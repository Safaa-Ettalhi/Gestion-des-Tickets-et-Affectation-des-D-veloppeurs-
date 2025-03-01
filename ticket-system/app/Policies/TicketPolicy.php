<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Ticket $ticket)
    {
        return $user->isAdmin() || $user->isDeveloper() || $user->id === $ticket->user_id;
    }

    public function create(User $user)
    {
        return $user->isUser();
    }

    public function update(User $user, Ticket $ticket)
    {
        return $user->isAdmin() || $user->isDeveloper();
    }

    public function delete(User $user, Ticket $ticket)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Ticket $ticket)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Ticket $ticket)
    {
        return $user->isAdmin();
    }
}