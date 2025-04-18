<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{    
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'description', 
        'status', 
        'assigned_user_id', 
        'building_id',
    ];

    public function comments() { 
        return $this->hasMany(Comment::class); 
    }

    public function building() { 
        return $this->belongsTo(Building::class); 
    }

    public function assignedUser() { 
        return $this->belongsTo(User::class, 'assigned_user_id'); 
    }
}
