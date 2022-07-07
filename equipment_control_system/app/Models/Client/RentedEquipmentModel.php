<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentedEquipmentModel extends Model
{
    use HasFactory;

    protected $table = 'rented_equipments';

    protected $fillable = [
        'equipment_name',
        'identifier_code',
        'company',
        'unity',
        'start_rent',
        'rental_period',
    ];

}
