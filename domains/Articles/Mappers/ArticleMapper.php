<?php

namespace App\Domains\Mappers;

use App\Core\Mappers\AutoMapper;

/**
 * The mapper of an article.
 *
 * @category Mapper
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class ArticleMapper extends AutoMapper
{
    public function mapTitle(string $title)
    {
        return (string) $title;
    }

    public function mapSharing(Sharing $sharing)
    {
        return $this->sharingMapper->map($sharing);
    }

    public function mapBody(BodyText $body)
    {
        return Editor::content($body);
    }
}
