<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $fillable = ['title', 'body','image', 'user_id'];


    /**
     * RELACIONAMENTOS
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    /**
     * FUNÇÔES
     */

}
