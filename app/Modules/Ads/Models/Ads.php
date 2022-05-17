<?php

namespace Ads\Models;

use App\User;
use Categories\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Ads extends Model
{
    protected $table = 'ads';

    protected $appends = ['tags'];

    /**
     * Get the category that owns the Ads
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    /**
     * Get the user that owns the Ads
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTagsAttribute()
    {
        return AdTag::where('ad_id',$this->id)->get();
    }
}
