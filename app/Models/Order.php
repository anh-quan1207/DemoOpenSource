<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Order
 *
 * @mixin Builder
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $company_name
 * @property string $country
 * @property string $postcode_zip
 * @property string $town_city
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderDetail> $orderDetails
 * @property-read int|null $order_details_count
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCompanyName($value)
 * @method static Builder|Order whereCountry($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereEmail($value)
 * @method static Builder|Order whereFirstName($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereLastName($value)
 * @method static Builder|Order wherePhone($value)
 * @method static Builder|Order wherePostcodeZip($value)
 * @method static Builder|Order whereTownCity($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @property string $street_address
 * @method static Builder|Order whereStreetAddress($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
