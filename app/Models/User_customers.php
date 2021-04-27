<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\User_customers
 *
 * @property-read Collection|Contact[] $contact
 * @property-read int|null $contact_count
 * @property-read Collection|Feedback[] $feedback
 * @property-read int|null $feedback_count
 * @property-read Collection|Order[] $orders
 * @property-read int|null $orders_count
 * @method static Builder|User_customers newModelQuery()
 * @method static Builder|User_customers newQuery()
 * @method static Builder|User_customers query()
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|User_customers whereCreatedAt($value)
 * @method static Builder|User_customers whereId($value)
 * @method static Builder|User_customers whereName($value)
 * @method static Builder|User_customers whereUpdatedAt($value)
 */
class User_customers extends Model
{
//    use HasFactory;
    protected $table = "user_customers";

    protected $fillable = [
        'name'
    ];

    public function feedback(): HasMany
    {
        return $this->hasMany(Feedback::class, 'user_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function contact(): HasMany
    {
        return $this->hasMany(Contact::class, 'user_id', 'id');
    }

}
