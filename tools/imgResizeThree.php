<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 05.01.2018
 * Time: 22:55
 * http://www.webchaynik.ru/PHP/sozdanie_preview_izobrazhenij_na_letu.html
 */


class imageResize {
    public function __construct($src, $width=100) {
//$filename – полный путь к файлу.
        $filename=$_SERVER['DOCUMENT_ROOT'].$src;
//функция getimagesize() возвращает информацию о файле.
        $size = getimagesize ($filename);
//ширина изображения:
        $w=$size['0'];
//высота изображения:
        $h=$size['1'];
//mime тип файла:
        $type = $size['mime'];
//отношение ширины к высоте, далее будет использовано для пропорционального ресайза изображения
        $ratio = $w/$h;
//ширина превью:
        $th_w = $width;
//высота превью:
        $th_h = $th_w/$ratio;
//передаем браузеру заголовок типа контента:
        header("Content-type: $type");
//переключатель типов, возможные варианты изображений: jpg, png и gif:
        switch ($type) {
            case 'image/jpeg':
//создаем изображение из исходного большого изображения:
                $src_img = imagecreatefromjpeg($filename);
//устанавливаем параметры наложения, в данном случае эта строка не пригодится, но она будет нужна, если нужно добавить водяной знак на картинку:
                imagealphablending($src_img, true);
//создаем пустое изображение нужной высоты и ширины, в которое будет скопировно исходное изображение:
                $thumbImage = imagecreatetruecolor($th_w, $th_h);
//копируем большое изображение в маленькое:
                imagecopyresampled($thumbImage, $src_img, 0, 0, 0, 0, $th_w, $th_h, $w, $h);
//выводим в браузер маленькое изображение:
                imagejpeg($thumbImage, '', 100);
                break;
//для остальных форматов все аналогично:
            case 'image/png':
                $src_img = imagecreatefrompng($filename);
                imagealphablending($src_img, true);
                $thumbImage = imagecreatetruecolor($th_w, $th_h);
                imagecopyresampled($thumbImage, $src_img, 0, 0, 0, 0, $th_w, $th_h, $w, $h);
                imagepng($thumbImage, '', 0);
                break;
            case 'image/gif':
                $src_img = imagecreatefromgif($filename);
                imagealphablending($src_img, true);
                $thumbImage = imagecreatetruecolor($th_w, $th_h);
                imagecopyresampled($thumbImage, $src_img, 0, 0, 0, 0, $th_w, $th_h, $w, $h);
                imagegif($thumbImage, '', 100);
                break;
            default:
//echo "Формат изображения не поддерживается.";
                break;
        }
//удаляем изображение из памяти.
        imagedestroy($thumbImage);
    }
}

/*
Чтобы создать экземпляр класса imageResize, нужно сделать следующую запись:
$imageObject = new imageResize();
Как только интерпретатор видит такую запись, он вызывает функцию __construct(). Как можно заметить, у этой функции в нашем классе есть два атрибута, $src – относительный путь к изображению, обязательный, $width – необязательный параметр, по умолчанию равен 100, но можно задать свою ширину для превью изображения.
Ну и теперь можно делать вывод превью на странице. Для этого нам понадобится два файла: первый – сам класс imageResize, назовем его imageResize.class.php и файл, на который будет ссылаться атрибут src превью изображения, например resize.php. Положим оба файла в корневую папку сайта. Содержимое файла imageResize.class.php у нас уже есть, нужно просто скопировать код выше. Код файла resize.php будет содержать всего две строки: подключение класса imageResize и создание объекта класса:

<?php
include_once 'imageResize.class.php';
$im = new ImageResize($_GET['src']);

Вторая строка создает объект класса ImageResize() и передает ему путь к большому изображению из $_GET переменной src. Обратите внимание, что данный пример работает в случае, если оба файла лежат в корне сервера, для другой конфигурации прийдется прописать в инструкции include_once путь к классу imageResize.
Ну и самое главное, как же нам вывести на странице собственно превью. Ничего сложного, в коде страницы нужно всего-лишь записать:
<img src=”/resize.php?src=ПУТЬ_К_БОЛЬШОМУ_ИЗОБРАЖЕНИЮ” />
Ну вот и все, теперь у нас есть готовый функционал для создания превью больших картинок, без сохранения превью на сервере.

 */
