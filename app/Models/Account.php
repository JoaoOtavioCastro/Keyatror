<?php

namespace App\Models;

use Carbon\Traits\ToStringFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'notes',
        'layer_id',
        'public_id',
        'username',
        'password',
        'url',
        'email',
    ];

    public function getPasswordAttribute()
    {
        return decrypt($this->attributes['password']);
    }
    public function layer()
    {
        return $this->belongsTo(Layer::class);
    }
}
