<?php

class WatermarkAction implements IProcessImages
{
    private $text;
    private $fontsize;
    private $x;
    private $y;

    public function processIMG($img)
    {
        $stamp = imagecreatetruecolor(100, 70);
        imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
        imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
        imagestring($stamp, 5, 20, 20, $this->text, 0x0000FF);
        imagestring($stamp, 3, 20, 40, date('d.m.Y'), 0x0000FF);

        $marge_right    = $this->x;
        $marge_bottom   = $this->y;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        imagecopymerge($img, $stamp, imagesx($img) - $sx - $marge_right, imagesy($img) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

        return $img;
    }
    
    public function applyParams(array $params)
    {
        $this->setText($params['text']);
        $this->setFontsize($params['fontsize']);
        $this->setX($params['x']);
        $this->setY($params['y']);
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function setFontsize(int $fontsize)
    {
        $this->fontsize = $fontsize;
    }

    public function setX(int $x)
    {
        $this->x = $x;
    }

    public function setY(int $y)
    {
        $this->y = $y;
    }
}