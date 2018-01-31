<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
        <link rel="stylesheet" href="./main.css">
    </head>
    <body>
        <form class="inputForm" action="output.php" method="post" enctype="multipart/form-data">
            <header class="box">
                <h1>Image to ASCII</h1>
                <div class="description">
                    Put in an image and get out ascii art!
                </div>
            </header>
            <div class="box">
                <div class="section-title">Image Selection</div>
                <div class="num">1</div>

                <input type="text" name="imageURL" placeholder="Image URL" value="" class="text-entry"><br> [ or ]<br>
                <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
                <input name="userfile" type="file" class="half" id="fileupload" />
                <label for="fileupload">&uArr; Choose a file</label>
                <div class="help"><span>?</span><div class="tooltip"><p>Enter an image URL or select an image from your device. One of the two is REQUIRED.</p></div> </div>
            </div>
            <div class="box">
                <div class="num">2</div>
                <div class="section-title">Scaling/Size</div>
                <input type="range" name="blockSize" value="12" min="1" max="40" id="slider"><br>
                Image scaling: <span id="range-val">12</span>
                <div class="help">?<div class="tooltip"><p>Select a value for image scaling. Try the default and if the resulting output is too large, select a higher value here. Higher values output a smaller ascii image.</p></div></div>

                <script type="text/javascript">
                var slider = document.getElementById('slider');
                var rangeValue = document.getElementById('range-val');
                slider.addEventListener('change', function(){
                    rangeValue.textContent = this.value;
                });
                </script>

            </div>
            <div class="box">
                <div class="num">3</div>
                <div class="section-title">Text Mode</div>
                <textarea name="textInput" rows="1" cols="80" placeholder="Text to display (Optional)" class="text-entry"></textarea>
                <div class="help">?<div class="tooltip"><p>If you would like to provide text to use as a basis for output, enter it here. This OPTIONAL value does not take effect if the ASCII box is selected <sub>(See section 4)</sub></p></div></div>
            </div>
            <div class="box">
                <div class="num">4</div>
                <div class="section-title">ASCII Mode</div>
                <h3>Enable ASCII Mode: </h3><input type="checkbox" name="ascii" value="Yes" /><br />
                <select name="colorascii">
                    <option value="">-</option>
                    <option value="c">Color</option>
                    <option value="m">Mono</option>
                </select>
                <div class="help">?<div class="tooltip"><p>Checking the ascii box will convert the image to ascii shading. Additionally, select Mono (default) or Color from the dropdown. Checking the ascii box will override any entry in section 3. This section is OPTIONAL.</p></div></div>
            </div>
            <div class="box">
                <div class="num">5</div>
                <div class="section-title">All Systems Go</div>
                <p>Let's get this show on the road!</p>
                <input type="submit" name="submit" value="Submit!" id="submit">
            </div>
            <footer>
                <sub>Developed by <a href="http://brianmevans.com" target="_blank">Brian Evans</a> in 2017</sub>
            </footer>
    </body>
</html>
