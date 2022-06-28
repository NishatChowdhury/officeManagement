<?php

namespace App\Models\Domain;

use App\Models\Hosting;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerHosting extends Model
{
    use HasFactory;

    protected $fillable = ['hosting_id','customer_id','provider_id','registration_date','expire_date','amount','is_active'];

    /**
     * @return BelongsTo
     */
    public function provider():BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    /**
     * @return BelongsTo
     */
    public function hosting():BelongsTo
    {
        return $this->belongsTo(Hosting::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
