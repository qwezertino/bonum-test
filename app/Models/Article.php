<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description'
    ];
    protected $hidden = [
        'id',
        'user_id',
        'status_id',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'author',
        'status'
    ];
    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(ArticleStatus::class, 'status_id');
    }
    /**
     * @return string
     */
    public function getAuthorAttribute(): string
    {
        return $this->user()->first()->fullname;
    }
    /**
     * @return string
     */
    public function getStatusAttribute(): string
    {
        return $this->status()->first()->name;
    }
}
