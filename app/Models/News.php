<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\News
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property string|null $image
 * @property string|null $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $status
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @method static Builder|News whereCategoryId($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereImage($value)
 * @method static Builder|News whereSlug($value)
 * @method static Builder|News whereStatus($value)
 * @method static Builder|News whereText($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Category $category
 */
class News extends Model
{
//    use HasFactory;
//    use SoftDeletes; // мягкое удаление (особенность с пользовательским соглашением)

    protected $table = "news";

    protected $fillable = [
        'title',
        'slug',
        'text',
        'image'
    ];


    public function category(): BelongsTo // обратная связь в единственном числе
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
