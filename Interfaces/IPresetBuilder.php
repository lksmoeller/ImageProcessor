<?php

interface IPresetBuilder
{
    public function createActions();

    public function setupParams(array $params = []);

    public function createPreset();

    public function getPreset();
}