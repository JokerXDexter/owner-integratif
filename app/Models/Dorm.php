<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    use HasFactory;

    protected $table = 'dorms';

    protected $primaryKey = 'id_dorms';

    protected $fillable = [
        'name', 
        'images', 
        'longitude', 
        'latitude', 
        'capacity', 
        'phone_number', 
        'type', 
        'description',
        'user_id', // Add this line
    ];

    // Define relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}