<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 05.01.2018
 * Time: 21:19
 *
 * https://sites.google.com/site/kamaikin/rabota-s-fotografiami/izmenenie-razmerov-izobrazenia
 *
 */

$sourse="/dir";          //- Путь к исходному изображению
$new_image="newImgName"; //- Путь к изображению которое должно получится)))
$width=200;     //- Ширина нового изображения
$height=200;    //- Высота нового изображения


function image_resize($sourse,$new_image,$width,$height){
    $size = GetImageSize($sourse);
    // определяем изначальную высоту и ширину картинки
    $srcWidth  = $size[0];
    $srcHeight = $size[1];
    // следующий код проверяет если ширина больше высоты
    // или высота больше ширины картинки так, чтобы
    // при изменении сохранилась правильная пропорция
    $ratioWidth  = $srcWidth/$width;
    $ratioHeight = $srcHeight/$height;
    if( $srcWidth < $srcHeight){
        $destWidth  = $srcWidth/$ratioHeight;
        $destHeight = $height;
    } else {
        $destWidth = $width;
        $destHeight = $srcHeight/$ratioWidth;
    }
    if($destHeight > $height){
        $destWidth = $srcWidth/$ratioHeight;
        $destHeight = $height;
    }
    $image_p = @imagecreatetruecolor($destWidth, $destHeight);
         if ($size[2]==2){ $image_cr = imagecreatefromjpeg($sourse); }
    else if ($size[2]==3){ $image_cr = imagecreatefrompng($sourse);  }
    else if ($size[2]==1){ $image_cr = imagecreatefromgif($sourse);  }
    else if ($size[2]==6){ $image_cr = imagecreatefromwbmp($sourse); }

    imagecopyresampled($image_p, $image_cr, 0, 0, 0, 0, $destWidth, $destHeight, $size[0], $size[1]);
         if ($size[2]==2){ imagejpeg($image_p, $new_image, 75); }
    else if ($size[2]==1){ imagegif($image_p, $new_image); }
    else if ($size[2]==3){ imagepng($image_p, $new_image); }
    else                 { imagepng($image_p, $new_image); }
}
