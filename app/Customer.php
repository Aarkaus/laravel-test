<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the status of the customer.
     */
    public function customerStatus()
    {
        return $this->belongsTo('App\CustomerStatus');
    }

    /**
     * Get the orders for the customer.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
