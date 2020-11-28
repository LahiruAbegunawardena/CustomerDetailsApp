<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $primaryKey = "id";

    protected $fillable = [
        'f_name', 'l_name', 'email', 'address', 'city', 'state', 'dob', 'zip_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ["created_at", "updated_at"];

    public function contacts()
    {
        return $this->hasMany(Contact::class, "customer_id");
    }
}
