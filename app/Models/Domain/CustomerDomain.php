<?php

namespace App\Models\Domain;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerDomain extends Model
{
    use HasFactory;

    protected $fillable=['domain_id','customer_id','registration_date','expire_date','amount','is_active','is_sms','is_email'];

    /**
     * @return BelongsTo
     */
    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return BelongsTo
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

}
