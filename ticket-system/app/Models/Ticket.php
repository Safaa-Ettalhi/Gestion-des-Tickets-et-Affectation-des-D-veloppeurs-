<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'operating_system',
        'software_id',
        'user_id',
        'assigned_to',
        'resolved_at',
        'assigned_by',
        'assigned_at',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'assigned_at',
    ];
    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function attachments()
    {
        return $this->hasMany(TicketAttachment::class);
    }
public function assignedBy()
{
    return $this->belongsTo(User::class, 'assigned_by');
}
}