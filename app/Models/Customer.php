<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'CustomerID';
    
    protected $fillable = [
        'First_Name',
        'Email',
        'Phone',
        'Address',
        'Postal_ZIP_Code',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'Contact_Person', 'CustomerID');
    }
    
}
