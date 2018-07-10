<?php

include "Interfaces/IProcessImages.php";
include "Interfaces/IPresetBuilder.php";
include "PresetDirector.php";
include "Presets/Preset.php";

try
{
    $searchPattern      = preg_replace("/-/","",$argv[1])."builder.php";
    $directory          = scandir("Builder");
    $directoryKey       = array_search(strtolower($searchPattern), array_map("strtolower",$directory));

    if(!$directoryKey){
        throw new Exception("The Preset \"$argv[1]\" is not defined");
    }
    $builderFileName = $directory[$directoryKey];

    include_once "Builder/".$builderFileName;

    $builderClassName  = preg_replace("/\.php/","",$builderFileName);

    $Builder        = new $builderClassName();
    $PresetDirector = new PresetDirector();
    $Preset         = $PresetDirector->build($Builder, array_slice($argv, 4, count($argv)));
    $img            = imagecreatefromjpeg($argv[2]);
    $img            = $Preset->processIMG($img);
    $Preset->outputIMG($img, $argv[3]);
}
catch(Exception $e)
{
    echo "Error Message: ".$e->getMessage();
    echo "\n";
    echo $e->getTraceAsString();
}