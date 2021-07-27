<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class GeneralController extends Controller
{
    //
    public function sendPic(Request $data){
    
    //dump($data->imgRead); 
    $fileUploaded = request()->file('imgRead');
    $file_name= $fileUploaded->getClientOriginalName();
    $file_path = public_path('/img');
    $fileUploaded ->move($file_path,$file_name);
    //dump($file_name);

    $extension = substr($file_name,-3);
    //dump($extension);
    if(strcmp($extension,"png") == 0){
        $i = imagecreatefrompng($file_path."/".$file_name);
    }else if(strcmp($extension,"gif") == 0){
        $i = imagecreatefromgif($file_path."/".$file_name);
    }
    else{
        $i = imagecreatefromjpeg($file_path."/".$file_name);
    }


    $rTotal = 0;
    $vTotal = 0;
    $aTotal = 0;
    $total = 0;

    for ($x=0;$x<imagesx($i);$x++) {
        for ($y=0;$y<imagesy($i);$y++) {
            $rgb = imagecolorat($i,$x,$y);
            $r   = ($rgb >> 16) & 0xFF;
            $v   = ($rgb >> 8) & 0xFF;
            $a   = $rgb & 0xFF;
            $rTotal += $r;
            $vTotal += $v;
            $aTotal += $a;
            $total++;
        }
    }

    $rPromedio = round($rTotal/$total);
    $vPromedio = round($vTotal/$total);
    $aPromedio = round($aTotal/$total);
    
    echo "<div style='display:block;height:50px;width:400px;background-color:rgb(".$rPromedio.",".$vPromedio.",".$aPromedio.")'>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    

    $color = sprintf("#%02x%02x%02x",$rPromedio,$vPromedio,$aPromedio);
    dump($color);


   

    

    
}


}

