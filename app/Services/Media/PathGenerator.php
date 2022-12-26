<?php
namespace App\Services\Media;

use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PathGenerator extends DefaultPathGenerator
{
    public function getPath(Media $media): string
    {
        $path = parent::getPath($media);
        return $media->collection_name.'/'.$media->model_id.'/'.$path;
    }
}