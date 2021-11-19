<?php

class View
{

    //ön arayüzü gösteren method.
    public static function frontView($module, $method, $data = null, $return = false)
    {

        $db = new CrudPDO();
        $indexModel = new defaultModel();
        $data['settings'] = $indexModel->indexModel();

        foreach ($data['settings'] as $key) {
            $data[$key['settings_key']] = $key['settings_value'];
        }


        if ($return == false) {

            if (file_exists($file = DIRECTORY . "/moduls/{$module}/view/{$method}View.php")) {
                require_once $file;

            } else {
                echo "Page Not Found";
            }
        } else {
            ob_start();
            if (file_exists($file = DIRECTORY . "/moduls/{$module}/view/{$method}View.php")) {
                require_once $file;

                //sayfayı header ve footer arasına almak için gerekli.
                $text = ob_get_contents();
                ob_end_clean();
                return $text;

            } else {
                echo "Page Not Found";
            }
        }
    }

    //$area dediğimiz değişken fronted mi backend mi doğruluğunu yapacak.
    public static function frontLayout($area, $layout, $module, $method, $data = null)
    {

        $db = new CrudPDO();
        $indexModel = new defaultModel();
        $data['settings'] = $indexModel->indexModel();

        foreach ($data['settings'] as $key) {
            $data[$key['settings_key']] = $key['settings_value'];
        }


        $data['VIEW'] = $method != NULL ? view::frontView($module, $method, $data, true) : null;
        require_once DIRECTORY . "/layout/{$area}/{$layout}Layout.php";
    }
}