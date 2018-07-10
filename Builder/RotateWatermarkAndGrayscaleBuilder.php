<?php
include_once "Actions/GrayscaleAction.php";
include_once "WatermarkAndRotateBuilder.php";
include_once "Presets/RotateWatermarkAndGrayscale.php";

class RotateWatermarkAndGrayscaleBuilder implements IPresetBuilder
{
    
    private $rotateWatermark;
    private $grayscale;

    private $preset;

    public function createActions()
    {
        $this->rotateWatermark  = (new PresetDirector())->build(new WatermarkAndRotateBuilder());
        $this->grayscale        = new GrayscaleAction();
    }

    public function setupParams(array $params = [])
    {
        $this->grayscale->applyParams();
    }

    public function combineActions()
    {
        $this->preset->addAction($this->rotateWatermark);
        $this->preset->addAction($this->grayscale); 
    }

    public function createPreset()
    {
        $this->preset = new RotateWatermarkAndGrayscale();
    }

    public function getPreset()
    {
        return $this->preset;
    }

}