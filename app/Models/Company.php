<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'CompanyID';
    
    protected $fillable = [
        'Company_Name',
        'Contact_Person',
        'Email',
        'Phone',
        'Address',
    ];

    public function contactPerson()
    {
        return $this->belongsTo(Customer::class, 'Contact_Person', 'CustomerID');
    }

}
