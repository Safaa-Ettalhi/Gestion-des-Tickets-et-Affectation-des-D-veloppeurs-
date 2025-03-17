<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Software;

class TicketSeeder extends Seeder
{
    public function run()
    {
      
        $admin = User::factory()->create(['email' => 'admin@example.com', 'role' => 'admin']);
        $developer = User::factory()->create(['email' => 'developer@example.com', 'role' => 'developer']);
        $user = User::factory()->create(['email' => 'user@example.com', 'role' => 'user']);

     
        $software1 = Software::create(['name' => 'Logiciel A']);
        $software2 = Software::create(['name' => 'Logiciel B']);


        Ticket::create([
            'title' => 'Problème de connexion',
            'description' => 'Je ne peux pas me connecter à mon compte',
            'status' => 'open',
            'priority' => 'high',
            'user_id' => $user->id,
            'software_id' => $software1->id,
            'operating_system' => 'Windows 10',
        ]);

        Ticket::create([
            'title' => 'Erreur d\'affichage',
            'description' => 'Les images ne s\'affichent pas correctement',
            'status' => 'in_progress',
            'priority' => 'medium',
            'user_id' => $user->id,
            'assigned_to' => $developer->id,
            'software_id' => $software2->id,
            'operating_system' => 'macOS',
        ]);

        Ticket::create([
            'title' => 'Fonctionnalité manquante',
            'description' => 'J\'aimerais avoir une option pour exporter en PDF',
            'status' => 'open',
            'priority' => 'low',
            'user_id' => $user->id,
            'software_id' => $software1->id,
            'operating_system' => 'Linux',
        ]);
    }
}