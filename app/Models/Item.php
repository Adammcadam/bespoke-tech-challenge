<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Item extends Model
{
    use HasFactory;

    protected $appends = [
        'type_icon'
    ];

    protected $guarded = [
        'id'
    ];

    public function scopeSearch($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                ->limit(10);
        }
    }

    public function getTypeIconAttribute($value): string
    {
        return match($this->content_type) {
            'info' => 'book-open',
            'WEBLINK' => 'external-link',
            'download' => 'download',
        };
    }

    public function content(): MorphTo
    {
        return $this->morphTo();
    }
}
