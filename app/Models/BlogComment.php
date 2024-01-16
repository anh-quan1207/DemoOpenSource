<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\BlogComment
 *
 * @mixin Builder
 * @property int $id
 * @property int $blog_id
 * @property int|null $user_id
 * @property string $email
 * @property string $name
 * @property string $messages
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Blog|null $blog
 * @method static Builder|BlogComment newModelQuery()
 * @method static Builder|BlogComment newQuery()
 * @method static Builder|BlogComment query()
 * @method static Builder|BlogComment whereBlogId($value)
 * @method static Builder|BlogComment whereCreatedAt($value)
 * @method static Builder|BlogComment whereEmail($value)
 * @method static Builder|BlogComment whereId($value)
 * @method static Builder|BlogComment whereMessages($value)
 * @method static Builder|BlogComment whereName($value)
 * @method static Builder|BlogComment whereUpdatedAt($value)
 * @method static Builder|BlogComment whereUserId($value)
 * @mixin \Eloquent
 */
class BlogComment extends Model
{
    use HasFactory;
    protected $table = 'blog_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class,'blog_id','id');
    }
}
