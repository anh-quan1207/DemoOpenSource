<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\ProductDetail
 *
 * @mixin Builder
 * @property int $id
 * @property int $product_id
 * @property string $color
 * @property string $size
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static Builder|ProductDetail newModelQuery()
 * @method static Builder|ProductDetail newQuery()
 * @method static Builder|ProductDetail query()
 * @method static Builder|ProductDetail whereColor($value)
 * @method static Builder|ProductDetail whereCreatedAt($value)
 * @method static Builder|ProductDetail whereId($value)
 * @method static Builder|ProductDetail whereProductId($value)
 * @method static Builder|ProductDetail whereQty($value)
 * @method static Builder|ProductDetail whereSize($value)
 * @method static Builder|ProductDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'product_details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}















