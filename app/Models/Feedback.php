<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Feedback
 *
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|User_customers[] $userCustomer
 * @property-read int|null $user_customer_count
 * @method static Builder|Feedback newModelQuery()
 * @method static Builder|Feedback newQuery()
 * @method static Builder|Feedback query()
 * @method static Builder|Feedback whereCreatedAt($value)
 * @method static Builder|Feedback whereId($value)
 * @method static Builder|Feedback whereText($value)
 * @method static Builder|Feedback whereUpdatedAt($value)
 * @method static Builder|Feedback whereUserId($value)
 * @mixin Eloquent
 * @property-read \App\Models\User_customers $userCustomers
 */
class Feedback extends Model
{
//    use HasFactory;
    protected $fillable = [
        'user_id',
        'text'
    ];


    public function userCustomers(): BelongsTo
    {
        return $this->belongsTo(User_customers::class, 'user_id', 'id');
    }
}
