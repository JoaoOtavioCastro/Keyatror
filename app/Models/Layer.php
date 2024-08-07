<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'public_id',
        'user_id',
        'is_protected',
        'password'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function verifyPassword(string $password,)
    {
        return  password_verify($password, $this->password);
    }
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}