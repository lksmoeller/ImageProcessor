<?php
include_once "Actions/WatermarkAction.php";
include_once "Actions/RotateAction.php";
include_once "Presets/WatermarkAndRotate.php";

class WatermarkAndRotateBuilder implements IPresetBuilder
{
    private $watermark;
    private $rotate;
    private $preset;

    public function createActions()
    {
        $this->watermark    = new WatermarkAction();
        $this->rotate       = new RotateAction(); 
    }

    public function setupParams(array $params = [])
    {
        $this->watermark->applyParams([
            'text'      => 'watermark',
            'fontsize'  => 20,
            'x'         => 20,
            'y'         => 20
        ]);

        $this->rotate->applyParams([
            'degree'    => 180
        ]);
    }

    public function combineActions()
    {
        $this->preset->addAction($this->rotate);
        $this->preset->addAction($this->watermark); 
    }

    public function createPreset()
    {
        $this->preset = new WatermarkAndRotate();
    }

    public function getPreset()
    {
        return $this->preset;
    }

}