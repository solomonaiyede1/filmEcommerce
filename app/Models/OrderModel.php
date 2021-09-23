<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class OrderModel extends Model
{
    use HasFactory;
    protected $table='order';
    protected $fillable=['user_id','name', 'price', 'quantity'];

    public function orderUser(){
        $this->hasMany(User::class, 'user_id');
    }


}
