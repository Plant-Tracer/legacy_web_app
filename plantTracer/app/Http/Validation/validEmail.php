<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Rule;

class validEmail implements Rule
{

	public function passes($attribute, $value){

		return strlen($value) >= 6;
/*
      if(DB::table('plant_tracing')->where('researcher','=',$value)->count() = 0){
            return false;
        }
*/
    
}

    public function message(){

        return 'Please make sure you have first registered with the Plant Tracer app!';
    }