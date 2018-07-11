# ImageProcessor

<h3>A tool for processing images with actions defined by presets</h3>
<br>
<b>php apply.php preset-name /path_to/source_img.jpg output_img.jpg</b>
<br>
<br>
<b>Rotates</b> the image by 90 degrees and puts <b>grayscale</b> filter on it
<br>
<i>php apply.php grayscale-and-rotate /path_to/source_img.jpg output_img.jpg</i>
<br>
<br>
Puts a <b>watermark</b> on the image and <b>rotates</b> it by 180 degrees
<br>
<i>php apply.php watermark-and-rotate /path_to/source_img.jpg output_img.jpg</i>
<br>
<br>
<b>Rotates</b> the image, puts a <b>watermark</b> on it and uses a <b>grayscale</b> filter
<br>
<i>php apply.php rotate-watermark-and-grayscale /path_to/source_img.jpg output_img.jpg</i>
