<?php
include_once "Actions/GrayscaleAction.php";
include_once "Actions/RotateAction.php";
include_once "Presets/GrayscaleAndRotate.php";

class GrayscaleAndRotateBuilder implements IPresetBuilder
{
    private $grayscale;
    private $rotate;
    private $preset;

    public function createActions()
    {
        $this->grayscale    = new GrayscaleAction();
        $this->rotate       = new RotateAction(); 
    }

    public function setupParams(array $params = [])
    {
        $this->grayscale->applyParams();

        $this->rotate->applyParams([
            'degree'    => 90
        ]);
    }

    public function combineActions()
    {
        $this->preset->addAction($this->grayscale);
        $this->preset->addAction($this->rotate); 
    }

    public function createPreset()
    {
        $this->preset = new GrayscaleAndRotate();
    }

    public function getPreset()
    {
        return $this->preset;
    }

}