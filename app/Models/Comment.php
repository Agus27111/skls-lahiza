<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSchool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use BelongsToSchool;

    protected $fillable = [
        'article_id',
        'name',
        'email',
        'content',
    ];

    /**
     * Get the article that this comment belongs to
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
