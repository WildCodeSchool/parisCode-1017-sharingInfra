<?php

namespace AppBundle\Services;

use AppBundle\Entity\Picture;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileUploader
 *
 * @package AppBundle\Services
 */
class FileUploader
{

    /**
     * Target to uploads Directory
     * @var string $targetDir
     */
    private $targetDir;

    /**
     * FileUploader constructor.
     *
     * Define targetDirectory from arguments service declaration
     *
     * @param $targetDir
     */
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * Upload action
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @param \AppBundle\Entity\Picture                           $pictureObject
     *
     * @return \AppBundle\Entity\Picture
     */
    private function uploadFile(UploadedFile $file, Picture $pictureObject){
        $fileName = uniqid() . '.' . $file->guessExtension();
        $file->move($this->targetDir, $fileName);

        $pictureObject->setName($fileName);

        return $pictureObject;
    }

    /**
     * @param $object mixed
     *
     * Check if upload is for one or multiple file(s)
     */
    public function upload($object)
    {
        if ($object instanceof Picture){
            $picture = $object;
            $file = $picture->getFile();

            $this->uploadFile($file, $picture);
        } else{
            $files = $object->getPictures()->get('file');
            foreach ($files as $file){
                $picture = new Picture();
                $picture =  $this->uploadFile($file, $picture);
                $object->addPicture($picture);
            }
            $object->getPictures()->remove('file');
        }
    }

    /**
     * Update file, remove old et create new
     *
     * @param \AppBundle\Entity\Picture $picture
     */
    public function update(Picture $picture){
        $this->remove($picture);
        $this->upload($picture);
    }

    /**
     * Check if file exist and remove if is ok
     *
     * @param \AppBundle\Entity\Picture $picture
     */
    public function remove(Picture $picture){
        $file = $this->targetDir . $picture->getName();
        if (file_exists($file)){
            unlink($this->targetDir . $picture->getName());
        }
    }
}