<header>
    <div class="mainBody" style="top: -100px; position: absolute;">
        <a href="./index.php">
            <div id="back">
                <span><< Back</span>
            </div>
        </a>
        <div id="htmloutput">
            <textarea name="output" ></textarea>
        </div>
        <div class="textcontent">
            <p>To use color output on your own page, copy it from the field to the left.</p>
        </div>
        <div id="pulldown">+</div>
    </div>
    <script type="text/javascript">
        const pulldown = document.getElementById('pulldown');
        const main = document.querySelector('.mainBody');
        console.log(main.style.top);
        pulldown.addEventListener('click',function(){
            console.log(main.style.top);
            if (main.style.top === '0px'){
                main.style.top = '-100px';
                main.style.position = 'absolute'
                pulldown.innerText = '+'
            } else {
                main.style.top = '0px';
                main.style.position = 'relative';
                pulldown.innerText = '-'
            }
        });
    </script>
</header>
