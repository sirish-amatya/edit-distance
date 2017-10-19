<?php
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', 1);
/*
This function is used to find the minimum number of operations required to transform 
one string into the other

*/
function edit_distance($str1, $str2)
{
    $str_len1 = strlen($str1);
    $str_len2 = strlen($str2);
    $char_arr1 = str_split($str1);
    $char_arr2 = str_split($str2);
    $tmp_arr = [];

    //Initializing 0th rows and 0th columns
    for ($i = 0; $i <= $str_len1; $i++) {
        for ($j = 0; $j <= $str_len2; $j++) {
            $tmp_arr[$i][$j] = 0;
            $tmp_arr[0][$j] = $j;
            $tmp_arr[$i][0] = $i;
        }
    }

    //Dynamic programming
    $ins = '';
    $del = '';
    $substitute = '';

    for ($i = 1; $i <= $str_len1; $i++) {
        for ($j = 1; $j <= $str_len2; $j++) {
        
           if ($char_arr1[$i-1] == $char_arr2[$j-1]) {
                $tmp_arr[$i][$j] = $tmp_arr[$i-1][$j-1];        
            } else {
                $ins = $tmp_arr[$i][$j-1];
                $del = $tmp_arr[$i-1][$j];
                $substitute = $tmp_arr[$i-1][$j-1];
                
                $tmp_arr[$i][$j] = min($ins+1, $del+1, $substitute+1);

            }
        }    
    }
    print $tmp_arr[$str_len1-1][$str_len2-1]."\n";

    /*
    //For printing the output array    
    for ($i = 0; $i <= $str_len1; $i++) {
        $output = "";
        for ($j = 0; $j <= $str_len2; $j++) {
            $output = $output.$tmp_arr[$i][$j]." ";
            
        }    
        print trim($output);
        print "\n";
    }
    */

}

edit_distance("geek", "geesek");
