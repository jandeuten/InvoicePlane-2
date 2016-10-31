<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 * @package App\Models\Items
 */
class Item extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'items';

    // Fillable db fields
    protected $fillable = [
        'sku',
        'sku_type',
        'title',
        'description',
        'purchase_price',
        'sales_price',
        'stock',
        'group_id',
        'is_disabled',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the items associated group
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Items\ItemGroup', 'group_id');
    }

    /**
     * Get all attachments
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'commentable');
    }

    /**
     * Get all notes
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes()
    {
        return $this->morphMany('App\Models\Note', 'notable');
    }
}