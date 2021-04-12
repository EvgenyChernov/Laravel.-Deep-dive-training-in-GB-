<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Order
 *
 * @property-read User_customers $userCustomer
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @mixin Eloquent
 */
class Order extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id',
        'text'
    ];
    public function userCustomer(): BelongsTo // обратная связь в единственном числе
    {
        return $this->belongsTo(User_customers::class, 'user_id', 'id');
    }
}
