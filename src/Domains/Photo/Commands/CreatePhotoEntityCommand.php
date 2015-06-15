<?php

namespace Sample\Domains\Photo\Commands;

use Sample\Domains\Photo\Entities\Photo;
use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CreatePhotoEntityCommand
 *
 * @category
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class CreatePhotoEntityCommand extends Command implements SelfHandling
{

    /**
     * @param \Sample\Domains\Photo\Entities\Photo $photo
     *
     * @return \Sample\Domains\Photo\Entities\Photo
     */
    public function handle(Photo $photo)
    {
        return $photo;
    }

}
