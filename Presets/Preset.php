<?php

abstract class Preset implements IProcessImages
{
    protected $Actions = [];

    public function addAction(IProcessImages $action)
    {
        $this->Actions[] = $action;
    }

    public function processIMG($img)
    {
        foreach($this->Actions as $action){
            $img = $action->processIMG($img);
        }
        return $img;
    }

    public function outputIMG($img, $out)
    {
        imagejpeg($img, $out);
    }

    public function applyParams(array $params)
    {

    }
}