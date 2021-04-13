<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventProgress extends Model
{
	
    use HasFactory;

    protected $fillable = [
        'activity_id', 'user_id', 'unit_id'
    ];
}

