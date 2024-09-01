<?php
namespace App\Services;

use App\Models\Discount;
use App\Models\Pet;
use App\Models\Product;

class DiscountValService
{
    //constructor
    public function __construct()
    {
    }

    //Validar que no exista otro descuento activo entre las fechas de inicio y fin
    public function validateDates($start_time, $end_time)
    {
        $discounts = Discount::where('start_time', '<=', $end_time)
            ->where('end_time', '>=', $start_time)
            ->get();

        //verificar si esta vacio el resultado
        return $discounts->isEmpty() ? false : true;
    }

    public function validateDate($start_time, $end_time, $id){
        $discounts = Discount::where('start_time', '<=', $end_time)
            ->where('end_time', '>=', $start_time)
            ->where('id', '!=', $id)
            ->get();
        
        //verificar si esta vacio el resultado
        return $discounts->isEmpty() ? false : true;
    }

}