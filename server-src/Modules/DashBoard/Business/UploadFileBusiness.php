<?php

/**
 * File UploadFileBusiness
 * Handle business of upload file
 *
 * @author TriHNM <minhtri191195@gmail.com>
 * @package Modules\DashBoard\Business
 * @date 2018-08-15
 */

namespace Modules\DashBoard\Business;

use Intervention\Image\Facades\Image;
use File;

class UploadFileBusiness
{
    private $_tempSavePath;

    public function __construct()
    {
        $this->_tempSavePath = public_path('/images');
    }

    /**
     * Function upload images to temp path
     *
     * @param File $photos
     * @return string
     */
    public function uploadImagesToTempPath($photos)
    {
        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->_tempSavePath)) {
            mkdir($this->_tempSavePath, 0777);
        }

        $saveName = [];
        $arrListFile = [];

        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $saveName[$i] = $name . '.' . $photo->getClientOriginalExtension();
            $resizeName = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

            // Make same photos with another size
            // Image::make($photo)->resize(250, null, function ($constraints) {
            //     $constraints->aspectRatio();
            // })
            // ->save($this->_tempSavePath . '/' . $resizeName);

            $photo->move($this->_tempSavePath, $saveName[$i]);
            $arrListFile[] = [
                'originalName' => $photos[$i]->getClientOriginalName(),
                'fileName' => $saveName[$i],
            ];
        }

        return $arrListFile;
    }

    public function removeTempDir()
    {
        File::deleteDirectory($this->_tempSavePath);

        return true;
    }

    /**
     * Function delete file
     *
     * @param string $fileName
     * @return boolean
     */
    public function removeFile($fileName)
    {
        $filePath = $this->_tempSavePath . '/' . $fileName;

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return true;
    }
}
