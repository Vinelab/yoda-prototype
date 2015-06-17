<?php

namespace Sample\Domains\Photo\Entities;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

/**
 * Class Photo
 *
 * @category Entity
 * @package  Sample\Domains\Article\Entities
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class Photo extends NeoEloquent
{

    protected $label = 'Photo';

    protected $fillable = [
        'original',
        'thumbnail',
        'small',
    ];

    protected $casts = [
        'id'  => 'integer',
        'url' => 'string',
    ];

    public function article()
    {
        return $this->belongsTo('Sample\Domains\Article\Entities\Article', 'PHOTOS');
    }

}
