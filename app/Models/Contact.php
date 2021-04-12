<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Contact
 *
 * @property-read User_customers $userCustomer
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact query()
 * @mixin Eloquent
 */
class Contact extends Model
{
//    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'phone'
    ];

    public function userCustomer(): BelongsTo // обратная связь в единственном числе
    {
        return $this->belongsTo(User_customers::class, 'user_id', 'id');
    }
}
