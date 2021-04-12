<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;


/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $is_visible
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereIsVisible($value)
 * @method static Builder|Category whereTitle($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|News[] $news
 * @property-read int|null $news_count
 */
class Category extends Model
{
//    use HasFactory;

    protected $table = "categories";

    /**
     * указываем разрешенные поля для массовой вставки
     */
    protected $fillable = [
        'title',
        'description',
        'is_visible'
    ];

    /**
     * указываем запрещенные поля для массовой вставки
     */
    protected $guarded = [
    ];

    /**
     * мутаторы при выборке меняем тип данных
     * @var string[]
     */
    protected $casts = ['is_visible' => 'boolean'];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}


















