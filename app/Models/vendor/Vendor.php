<?php

namespace App\Models\vendor;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\vendor\Shop;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'vendor';

    //this function show vendor shop information
    public function shops(){
        return $this->hasOne(Shop::class, 'vendor_id');
    }

}
