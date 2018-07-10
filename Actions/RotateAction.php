<?php

class RotateAction implements IProcessImages
{

    private $degree;

    public function processIMG($img)
    {
        $img = imagerotate($img, $this->degree, imageColorAllocateAlpha($img, 0, 0, 0, 127));

        return $img;
    }
    
    public function applyParams(array $params)
    {
        $this->setDegree($params['degree']);
    }

    public function setDegree(int $degree)
    {
        $this->degree = $degree;
    }
}