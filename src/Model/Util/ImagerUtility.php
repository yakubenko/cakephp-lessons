<?php
namespace App\Model\Util;

use Cake\Filesystem\Folder;

class ImagerUtility
{
    public $avatarsDir = null;

    public function generateMd5Filename($filename)
    {
        return (file_exists($filename))?md5_file($filename):null;
    }

    public function resizeAvatar($filename, $fileDestination, $width = 300, $height = 300)
    {
        $avatarsDir = ($this->avatarsDir) ?? WWW_ROOT . 'uploads' . DS . 'avatars' . DS;
        $folderExists = is_dir($avatarsDir);

        if (!$folderExists) {
            (new Folder())->create($avatarsDir);
        }

        if (!is_writable($avatarsDir)) {
            throw new \Exception(__('Can not open avatars folder'));
        }

        if (!class_exists('\\Imagick')) {
            throw new \Exception(__('Imagick extension seems not loaded.'));
        }

        $image = new \Imagick($filename);
        $w = $image->getImageWidth();
        $h = $image->getImageHeight();

        if ($w > $h) {
            $resize_w = $w * $width / $h;
            $resize_h = $height;
        } else {
            $resize_w = $width;
            $resize_h = $h * $width / $w;
        }
        $image->resizeImage($resize_w, $resize_h, \Imagick::FILTER_LANCZOS, 1);
        $image->cropImage($width, $height, 0, 0);
        $image->setImageFormat("jpeg");

        return $image->writeImage($avatarsDir . $fileDestination);
    }
}
