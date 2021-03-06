<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);

        Validator::extend('check_isbn', function($attribute, $value, $parameters, $validator) {
            if($this->isValidISBN($value)){
                return true;
            }
                return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->setRepositories();
    }

    private function setRepositories() {
        
    }

    private function isValidISBN($isbn) 
    { 
        // length must be 10 
        $n = strlen($isbn); 
        if ($n != 10) 
            return -1; 
      
        // Computing weighted sum 
        // of first 9 digits 
        $sum = 0; 
        for ($i = 0; $i < 9; $i++) 
        { 
            $digit = $isbn[$i] - '0'; 
            if (0 > $digit || 9 < $digit) 
                return -1; 
            $sum += ($digit * (10 - $i)); 
        } 
      
        // Checking last digit. 
        $last = $isbn[9]; 
        if ($last != 'X' && ($last < '0' ||  
                             $last > '9')) 
            return -1; 
      
        // If last digit is 'X', add 10  
        // to sum, else add its value. 
       $sum += (($last == 'X')  
          ? 10 : ($last - '0')); 
      
        // Return true if weighted sum of  
        // digits is divisible by 11. 
        return ($sum % 11 == 0); 
    } 

    
    
    

}
