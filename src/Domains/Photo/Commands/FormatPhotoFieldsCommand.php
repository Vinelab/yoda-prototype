<?php

namespace Sample\Domains\Photo\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * Class FormatPhotoFieldsCommand
 *
 * @category
 * @package Sample\Domains\Photo\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatPhotoFieldsCommand extends Command implements SelfHandling
{

    public function handle()
    {
        $photoInput = $this->input('photo');
        $photo = $this->get('photo');

        $photo->original = $photoInput['original'];
        $photo->thumbnail = $photoInput['thumbnail'];
        $photo->small = $photoInput['small'];

        $this->set('photo', $photo);
    }

}
