<?php

namespace MadeHQ\Cloudinary\Assets;

use Silverstripe\Assets\File As BaseFile;

class File extends BaseFile
{
    private static $table_name = 'CloudinaryAssetFile';

    private $Extension;
    private $ResourceType;
    private $AbsoluteSize;

    public function exists()
    {
        return true;
    }

    public static function createFromCloudinaryData($data)
    {
        global $testFieldId;
        $file = static::Create();
        $file->ID = urlencode($data['public_id']);
        $file->Title = $data['public_id'];
        $file->URL = $data['secure_url'];
        $file->Extension = array_key_exists('format', $data) ? $data['format'] : self::get_file_extension($data['public_id']);
        $file->ResourceType = $data['resource_type'];
        $file->AbsoluteSize = $data['bytes'];
        $file->LastEdited = \DateTime::createFromFormat(\DateTime::ISO8601, $data['created_at'])->format('Y-m-d H:i:s');
        return $file;
    }

    public function getExtension()
    {
        return $this->Extension;
    }

    public function getResourceType()
    {
        return $this->ResourceType;
    }

    public function getAbsoluteSize()
    {
        return $this->AbsoluteSize;
    }
}
