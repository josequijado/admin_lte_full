<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'permission_name',
        'role', 
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
