<?php

namespace App\Models;

use Carbon\Traits\ToStringFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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

    public function getPassword()
    {
        $senha = $this->password;
        
       // return  Crypt::decryptString($senha);                     //corrigir erro
       return $senha;
    
    }
    public function layer()
    {
        return $this->belongsTo(Layer::class);
    }
}
