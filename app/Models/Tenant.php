<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Tenant extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    /**
     *  RELACIONAMENTOS
     */
    public function users()
    {
        return $this->hasMany(User::class, 'tenant_id','id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid = (string) Str::uuid();
        });
    }
}
