<?php

namespace MadeHQ\Cloudinary\Model;

use MadeHQ\Cloudinary\Model\Image;

class ImageLink extends FileLink
{
    private static $db = [
        'Gravity' => 'Varchar(15)',
        'Alt' => 'Varchar(200)',
    ];

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = [
        'File' => Image::class,
    ];

    private static $table_name = 'CloudinaryImageLink';

    public function URL($width, $height, $crop, $quality = 'auto', $gravity = false, $fetchFormatAuto = true)
    {
        if ($this->exists()) {
            $gravity = $gravity ?: $this->record['Gravity'];
            return $this->File()->URL($width, $height, $crop, $quality, $gravity, $fetchFormatAuto);
        }
    }
}
