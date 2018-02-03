# Image to Ascii
Image to Ascii is a utility that converts image files into ascii text art. There are a number of modes that can produce: shaded monocolor ascii art, shaded colored ascii art, colored mosaic art, or colored text art for which source text is provided by the user (from a word to paragraphs).


## Implementation/Deployment
This project uses PHP, JavaScript, HTML, and CSS. Image to Ascii can be drag and drop deplyed on an Apache server (or other web-server with php installed).

## Use
 1. Input a URL to an image or upload an image from your device
 1. Select scaling level
     1. The number relates to the granularity of the image reproduction: 1 would be a pixel for pixel rendering; 12 would be 12 to 1
     1. Lower numbers will yield a larger output image 
     1. If your output does not look right and seems to overflow the page, redo your request with a larger scaling number
 1. If you do not want ascii shading, you may optionally input text to render as the output (in color)
     1. This can be a word, a sentance, a paragraph...
 1. If you enable ascii mode, the output will use different ascii characters to shade the output image
 1. Ascii mode can output in color or monochrome (default)
 1. If output mode is disabled and a user does not input optional text for output, then colored blocks will be used to provide a mosaic look
