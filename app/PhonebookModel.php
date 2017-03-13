<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhonebookModel extends Model
{
    /**
	* table name
	*/
	protected $table='phonebook';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','msisdn'
    ];
}
