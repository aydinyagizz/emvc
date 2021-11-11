<?php
/*ön yükleme olarak aklımıza gelir.
Klasör altlarında oluşturduğumuz model, view ve controller yapılarını projemize dahil edecek sistem burası.*/

require_once 'config.php';
require_once 'library/CrudPDO.php';
require_once 'asystem/App.php';
require_once 'asystem/mainModel.php';
require_once 'asystem/mainController.php';
require_once 'asystem/mainView.php';
require_once 'route.php';


//__autoload; yolunu belirttiğimiz sınıfı otomatik olarak dahil ediyor. bu değişti spl_autoload_register() fonksiyonu oldu.
//dinamik bir şekilde modullerimizin eklenmesini sağlıyoruz.
spl_autoload_register(function ($class_name) {
    $modul = explode("Model", $class_name);

    if (file_exists($inc = DIRECTORY . "/moduls/{$modul[0]}/model/{$class_name}.php")) {
        require_once $inc;
    }
});