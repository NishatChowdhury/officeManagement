<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hosting extends Model
{
    use HasFactory;

    protected $fillable=['name','provider_id','package','amount','registration_date','expire_date','note'];

    /**
     * a hosting belongs to a provider
     * @return BelongsTo
     */
    public function provider():BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}
