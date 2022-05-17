<?php

namespace Ads\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Tags\Models\Tags;

class AdTag extends Model
{
    protected $table = 'ads_tags';

    /**
     * Get the tag that owns the AdTag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tag_id');
    }
}
