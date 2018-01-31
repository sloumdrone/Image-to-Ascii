<header>
    <div class="logo">
        <i>Image to ASCII!</i>
    </div>
    <div class="formHolder">
        <form class="inputForm" action="index.php" method="post" enctype="multipart/form-data">
            <div class="formside left">
                <input type="text" name="imageURL" placeholder="Image URL" value="" class="half"><br />
                or
                <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
                <input name="userfile" type="file" class="half" /><br />
            </div>
            <div class="formside right">
                <input type="range" name="blockSize" value="12" min="1" max="40" id="slider">
                <span id="range-val">12</span>
                <script type="text/javascript">
                    var slider = document.getElementById('slider');
                    var rangeValue = document.getElementById('range-val');
                    slider.addEventListener('change', function(){
                        rangeValue.textContent = this.value;
                    })
                </script>
                <br />
                <textarea name="textInput" rows="1" cols="80" placeholder="Text to display (Optional)"></textarea><br />
                ASCII? <input type="checkbox" name="ascii" value="Yes" class="box" />
                <select name="colorascii">
                    <option value="">-</option>
                    <option value="c">Color</option>
                    <option value="m">Mono</option>
                </select>
                <input type="submit" name="submit" value="submit">
            </div>
        </form>
    </div>
</header>
