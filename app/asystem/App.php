<?php
error_reporting(E_ALL & ~E_NOTICE);

class App
{
    protected $nowPath;
    protected $nowMethod;
    protected static $routes = [];
    protected $home;

    public function __construct($config)
    {
        $this->nowPath = $_SERVER['REQUEST_URI'];
        $this->nowMethod = $_SERVER['REQUEST_METHOD'];
        $this->home = $config['home'];
        $this->startRoute();

    }

    //static olarak tanımladığımızda ram bellek üzerinde tutulur ve hızlı erişim imkanı sunar. Metotlara direkt olarak erişebilmemizi sağlar.
    //auth; parametresi session ile güvenlik kontrolü için.
    //area; o güvenli sayfanın fronted de mi backend de mi olduğunu sağlayacak.
    public static function getAction($link, $path, $auth = false, $area = null)
    {
        self::$routes[] = ['GET', $link, $path, $auth, $area];
    }

    public static function postAction($link, $path, $auth = false, $area = null)
    {
        self::$routes[] = ['POST', $link, $path, $auth, $area];
    }

    //App.php'nin yani ana motorun işlevini metot olarak üstlenmesini sağlıyoruz.
    public function startRoute()
    {
        foreach (self::$routes as $routes) {

            list($method, $link, $path, $auth, $area) = $routes;

            $methodCheck = $this->nowMethod == $method;
            $pathCheck = preg_match("@^{$link}$@", $this->nowPath, $params);

            if ($methodCheck && $pathCheck) {
                $uri = explode("/", $path);
                /*dizinin ilk elemanını yani boş olanı siliyoruz.*/
                array_shift($uri);


                @list($activeModul, $activeMethod) = $uri;
                if ($this->nowPath == "/") {
                    $module = $this->home['modul'];
                    $controller = $this->home['modul'] . "Controller";
                    $method = $this->home['method'];

                } else {

                    //güvenli sayfalar için yani root'da true olan yerler için
                    if (($auth == true && $area == "frontend" && isset($_SESSION['users'])) ||
                        ($auth == true && $area == "backend" && isset($_SESSION['admins'])) ||
                        $auth == false) {

                        $module = $activeModul;
                        $controller = $activeModul . "Controller";
                        $method = $activeMethod;

                    } else {
                        if ($area == "frontend") {
                            header("Location:/login");
                            exit();
                        } else if ($area == "backend") {
                            header("Location:/nedmin/login");
                            exit();
                        }
                    }
                }

                //controller var mı kontrolü
                if (file_exists($file = DIRECTORY . "/moduls/{$module}/controller/{$controller}.php")) {
                    require_once $file;

                    //controller içerisinde sınıf kontrolü yapıyoruz.
                    if (class_exists($controller)) {

                        $class = new $controller;

                        //method kontrolünü yapıyoruz.
                        if (method_exists($class, $method)) {
                            //ilk indisi siliyoruz.
                            array_shift($params);

                            //sınıfını ve method ismini bildiğimiz metotları otomatik olarak çalıştırılmasını sağlıyoruz.
                            return call_user_func_array([$class, $method], array_values($params));


                            //print_r($params);

                        } else {
                            echo "Method Not Found";
                            echo "<br>";
                        }

                    } else {
                        echo "Class Not Found";
                        echo "<br>";
                    }

                } else {
                    echo "controller not found";
                    echo "<br>";
                }


            }
        }

        echo "404 Sayfa Bulunamadı!";
    }
}