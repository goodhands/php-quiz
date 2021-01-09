<?php
    /**
     *  Written by Olaegbe Samuel <hey@samuelolaegbe.com>
     *  Coderbyte Challenge Solutions with PHP
     *  (c) 2018
     */


    /**
     * a function to return the factoria of any number (int)
     * the number must be less than 18 and greater than 1
     * ===========================================================
     * ===========================================================
     * Using the PHP language, have the function FirstFactorial(num) 
     * take the num parameter being passed and return the factorial of 
     * it (e.g. if num = 4, return (4 * 3 * 2 * 1)). 
     * For the test cases, the range will be between 1 and 18 and the 
     * input will always be an integer. 
     */
    function factoria($value){
        $finalValue = "1";
        if($value >= 1 && $value <= 18){
            if(is_int($value)){
                for($x = $value; $x >= 1; $x--){
                    $finalValue *= $x;
                }
            return $finalValue;
            }else{
                return "Invalid value passed. Expected int";
            }
        }else{
            return false;
        }
    }

    // echo factoria(8);

    /**
     * Function to find the longest word in a string
     */
    function LongestWord($sen){
        if(strpos(" ", $sen) === FALSE){
            $words = explode(" ", $sen);

            foreach($words as $word){
                $strLen[$word] = strlen($word);
            }
            return max($strLen);
            // return $strLen[max($strLen)];
            // return $strLen;
        }else{
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $sen)){
                $words = explode(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/'), $string);
                    return max(array_map('strlen', $words));
            }
        }
    }

    // echo LongestWord("here goes here");
    // print_r(LongestWord("Arguement goes here"));

    /**
     * function to sort a number in ascending order
     */
    function asc($num){

        $vals = preg_split('//', $num, -1, PREG_SPLIT_NO_EMPTY);

        $asc = "";

        for($x = 1; $x <= strlen($num); $x++){
            $min = min($vals);

            $asc .= $min;

            if (false !== $key = array_search($min, $vals)) {
                unset($vals[$key]);
            }
        }

        if(strlen($asc) < 4){
            $zeroPad = 4 - strlen($asc);

            for($y = 1; $y <= $zeroPad; $y++){
                $asc = "0".$asc;
            }
        }

        return $asc;
    }

    /**
     * function to sort a number in descending order
     */
    function desc($num){
        
        $vals = preg_split('//', $num, -1, PREG_SPLIT_NO_EMPTY);
        // print_r($vals);
        $asc = "";

        for($x = 1; $x <= strlen($num); $x++){
            $min = max($vals);

            $asc .= $min;

            if (false !== $key = array_search($min, $vals)) {
                unset($vals[$key]);
            }
        }

        if(strlen($asc) < 4){
            $zeroPad = 4 - strlen($asc);

            for($y = 1; $y <= $zeroPad; $y++){
                $asc = $asc."0";
            }
        }

        return $asc;
    }

    /**
     * function to get the KaprekarsConstant
     * from any given number 
     */
    function KaprekarsConstant($num){

        static $counter = 1;

        $desc = desc($num);
        $asc = asc($num);

        echo "<br/> Did variable assignments <br/>";

        $kpcs = max($desc, $asc) - min($desc, $asc);

        echo "Did first subtractions <br/>";

        echo "Current value of kpcs : $kpcs <br/>";

        echo "New values are ". max(desc($kpcs), asc($kpcs)). " and " . min(desc($kpcs), asc($kpcs))."<br/>";

        if($kpcs == 0 || $kpcs == ""){
            echo "Zero encountered!! Aborting program...";
            return false;
        }
        
        if($kpcs == 6174){
            echo "<br/><br/>6174 encountered!! I'm done!<br/>";
            return false;
        }else{
            do{
                $kpconstant = KaprekarsConstant($kpcs);
            }while($kpcs == 6174);
            $counter+=1;
        }

        return $counter;
    }

    // echo "Counter: ".KaprekarsConstant(12);


$image = imagecreatefromjpeg("dell.jpg");
$filename = 'thumb/223we_thumb.jpg';

$thumb_width = 200;
$thumb_height = 150;

$width = imagesx($image);
$height = imagesy($image);

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;

if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}

$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
imagejpeg($thumb, $filename, 80);