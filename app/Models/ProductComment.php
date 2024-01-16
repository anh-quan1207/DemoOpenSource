<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\ProductComment
 *
 * @mixin Builder
 * @property int $id
 * @property int $product_id
 * @property int|null $user_id
 * @property string $email
 * @property string $name
 * @property string $messages
 * @property int $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static Builder|ProductComment newModelQuery()
 * @method static Builder|ProductComment newQuery()
 * @method static Builder|ProductComment query()
 * @method static Builder|ProductComment whereCreatedAt($value)
 * @method static Builder|ProductComment whereEmail($value)
 * @method static Builder|ProductComment whereId($value)
 * @method static Builder|ProductComment whereMessages($value)
 * @method static Builder|ProductComment whereName($value)
 * @method static Builder|ProductComment whereProductId($value)
 * @method static Builder|ProductComment whereRating($value)
 * @method static Builder|ProductComment whereUpdatedAt($value)
 * @method static Builder|ProductComment whereUserId($value)
 * @property string $message
 * @property-read \App\Models\User|null $user
 * @method static Builder|ProductComment whereMessage($value)
 * @mixin \Eloquent
 */
class ProductComment extends Model
{
    use HasFactory;
    protected $table = 'product_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
