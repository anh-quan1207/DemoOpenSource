<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\OrderDetail
 *
 * @mixin Builder
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $amount
 * @property float $total
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Product|null $product
 * @method static Builder|OrderDetail newModelQuery()
 * @method static Builder|OrderDetail newQuery()
 * @method static Builder|OrderDetail query()
 * @method static Builder|OrderDetail whereAmount($value)
 * @method static Builder|OrderDetail whereCreatedAt($value)
 * @method static Builder|OrderDetail whereId($value)
 * @method static Builder|OrderDetail whereOrderId($value)
 * @method static Builder|OrderDetail whereProductId($value)
 * @method static Builder|OrderDetail whereQty($value)
 * @method static Builder|OrderDetail whereTotal($value)
 * @method static Builder|OrderDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
