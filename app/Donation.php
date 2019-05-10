<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Mollie\Laravel\Facades\Mollie;

class Donation extends Model
{
    use UsesUuid;

    protected $fillable = [
        'first_name',
        'last_name',
        'amount',
        'email',
        'event_id'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'refunded_at' => 'datetime',
        'failed_at' => 'datetime'
    ];

    public function event() {
        return $this->belongsTo('App\Event');
    }

    /**
     * @return \Mollie\Api\Resources\Payment|null
     * @throws \Mollie\Api\Exceptions\ApiException
     */
    public function getPaymentAttribute() {
        if (empty($this->payment_id)) {
            return null;
        }

        return Mollie::api()->payments()->get($this->payment_id);
    }

    public function getFullNameAttribute() {
        $parts = [];

        if (!empty($this->first_name)) {
            $parts[] = $this->first_name;
        }

        if (!empty($this->last_name)) {
            $parts[] = $this->last_name;
        }

        $full_name = implode(' ', $parts);

        if (empty($full_name)) {
            return 'Anoniem';
        }

        return $full_name;
    }
}
