<?php

class GrayScaleAction implements IProcessImages
{
    public function processIMG($img)
    {
        imagefilter($img, IMG_FILTER_GRAYSCALE);

        return $img;
    }
    
    public function applyParams(array $params = [])
    {
        
    }
}