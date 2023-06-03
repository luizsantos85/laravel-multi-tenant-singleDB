<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillabel = ['name'];


    /**
     *  RELACIONAMENTOS
     */
    public function users()
    {
        return $this->hasMany(User::class, 'tenant_id','id');
    }
}