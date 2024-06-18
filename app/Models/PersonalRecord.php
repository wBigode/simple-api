<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    use HasFactory;

    protected $table = 'simple_api.personal_record';

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

    public function movement()
    {
        return $this->hasOne(Movement::class, 'movement_id', 'movement_id');
    }
}
