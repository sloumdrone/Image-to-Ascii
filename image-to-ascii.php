<section>
<?php

    function add($x1,$y1){
        return $x1 + $y1;
    }

    function getAverage($array){
        $counter = sizeOf($array);
        $total = array_reduce($array,"add");
        if ($counter){
            return $total / $counter;
        } else {
            return 1;
        }
    }

    function renderGrayscale($avR,$avG,$avB){
        #version without a space
        // $charArray = ['$','@','8','%','#','*','!','+','=','^','-',';',':',',','.'];

        #version with a space
        $charArray = ['$','@','8','%','#','*','!','+','=','-',';',':',',','.','&nbsp;'];
        $total = ($avR + $avG + $avB) / 3;

        switch ($total){
            case $total > 238:
                return $charArray[14];
            case $total > 221:
                return $charArray[13];
            case $total > 204:
                return $charArray[12];
            case $total > 187:
                return $charArray[11];
            case $total > 170:
                return $charArray[10];
            case $total > 153:
                return $charArray[9];
            case $total > 136:
                return $charArray[8];
            case $total > 119:
                return $charArray[7];
            case $total > 102:
                return $charArray[6];
            case $total > 85:
                return $charArray[5];
            case $total > 68:
                return $charArray[4];
            case $total > 51:
                return $charArray[3];
            case $total > 34:
                return $charArray[2];
            case $total > 17:
                return $charArray[1];
            default:
                return $charArray[0];
        }
    }

    //Check if post data was received
    if ($_POST){

        $tempFileLocation = '/Applications/MAMP/tmp/php/';
        $imagestring = '';

        //get imageURL from POST
        if ($_FILES['userfile']['size']){
            $imagelocation = $_FILES['userfile']['tmp_name'];
        } else {
            if ($_POST["imageURL"]){
                $imagelocation = $_POST["imageURL"];
            } else {
                $imagelocation = 0;
            }
        }

        if ($imagelocation){
            $size = getimagesize($imagelocation);
            $filetype = $size[2];

            if ($filetype === 2){
                $image = imagecreatefromjpeg($imagelocation);
            } elseif ($filetype === 3){
                $image = imagecreatefrompng($imagelocation);
            } elseif ($filetype === 1){
                $image = imagecreatefromgif($imagelocation);
            } else {
                $image = false;
                $errorversion = 1;
            }
        } else {
            $image = false;
            $errorversion = 0;
        }


        if ($image){
            //get and deal w blockSize from POST
            $blockSize = $_POST["blockSize"];

            if (!$blockSize || $blockSize <= 0){
                $blockSize = 8;
            }

            $blockCountW = floor($size[0]/$blockSize);
            $blockCountH = floor($size[1]/$blockSize);

            //get and deal with textInput from POST
            $textInput = $_POST["textInput"];
            if ($textInput){
                $textInput = explode(" ",$textInput);
                $textInput = strtoupper(implode($textInput));
                $wordArray = str_split($textInput);
            } else {
                $wordArray = ['&#9608;'];
            }

            $currentPos = 0;

            for ($blockRow = 0; $blockRow < $blockCountH; $blockRow++){
                for ($blockCol = 0; $blockCol < $blockCountW; $blockCol++){
                    $blockR = [];
                    $blockG = [];
                    $blockB = [];
                    for ($row = $blockRow * $blockSize; $row < $blockRow * $blockSize + $blockSize; $row++){
                        for ($col = $blockCol * $blockSize; $col < $blockCol * $blockSize + $blockSize; $col++){
                            $rgb = imagecolorat($image,$col,$row);
                            $r = ($rgb >> 16) & 0xFF;
                            $g = ($rgb >> 8) & 0xFF;
                            $b = $rgb & 0xFF;
                            array_push($blockR,$r);
                            array_push($blockG,$g);
                            array_push($blockB,$b);
                        }
                    }
                    $averageR = floor(getAverage($blockR));
                    $averageG = floor(getAverage($blockG));
                    $averageB = floor(getAverage($blockB));

                    if (isset($_POST['ascii']) && $_POST['ascii'] === 'Yes'){
                        //handle grayscale conversion
                        if (isset($_POST['colorascii']) && $_POST['colorascii'] === 'c'){
                            $colorChar = renderGrayscale($averageR,$averageG,$averageB);
                            $imagestring .= "<span style=\"color:rgb($averageR,$averageG,$averageB);font-family: monospace;font-size: 0.9rem;font-weight: bold;display: inline-block;letter-spacing: 4px;\">$colorChar</span>";
                        } else {
                            $grayChar = renderGrayscale($averageR,$averageG,$averageB);
                            $imagestring .= "<span style=\"font-family: monospace;font-size:0.9rem;font-weight:bold;display:inline-block;letter-spacing:4px;\">$grayChar</span>";
                        }

                    } else {
                        $imagestring .= "<span style=\"color:rgb($averageR,$averageG,$averageB);\">{$wordArray[$currentPos]}</span>";


                        if (++$currentPos === count($wordArray)){
                            $currentPos = 0;
                        }
                    }
                }
                $imagestring .= "<br />";
            }
            ?>
                <script type="text/javascript">
                    const output = document.querySelector('textarea');
                    output.innerHTML = "<?php print htmlentities($imagestring) ?>";
                </script>
            <?php
            print($imagestring);
        } else {
            if ($errorversion){
                print("<h3>The image is not in a recognized format.</h3><h3>Please try again with another image.</h3>");
            } else {
                print("<h3>The image exceeds the maximum file size of 4mb.</h3><h3>Please try again with another image.</h3>");
            }

        }

    } else {
        print("<h3>No image requested/recieved.</h3>");
    }
 ?>
</section>
