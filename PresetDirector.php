<?php

class PresetDirector
{

    public function build(IPresetBuilder $builder, array $params = [])
    {
        $builder->createPreset();
        $builder->createActions();
        $builder->setupParams($params);
        $builder->combineActions();

        return $builder->getPreset();
    }
}