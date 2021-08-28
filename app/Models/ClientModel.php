<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;
    protected $table='client_data';
    protected $fillable = [
        'title', 'fullname', 'country', 'state', 'city', 'street', 'bus_stop', 'phone_number', 'email'
    ];
}
