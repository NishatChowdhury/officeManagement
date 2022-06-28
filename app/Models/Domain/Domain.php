<?php

namespace App\Models\Domain;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Domain extends Model
{
    use HasFactory;
    protected $fillable = ['name','alias','type','provider_id','amount','registration_date','expire_date','note','is_email','is_sms'];

    /**
     * a domain belongs to a provider
     * @return BelongsTo
     */
    public function provider():BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public $date = ['expire_date'];
}
