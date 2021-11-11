<?php

class nedminController extends mainController
{
    public function index()
    {
        $data = [];
        $this->callLayout("backend", "main", "nedmin", "index", $data);

    }

    public function login()
    {
        $data = [];
        if (isset($_SESSION['admins'])) {
            header("Location:/nedmin");
            exit();
        } else {
            $this->callView("nedmin", "login", $data);
        }


    }

    public function loginControl()
    {

        $loginControlModel = new nedminModel();
        $_SESSION['messageManagement'] = $loginControlModel->loginControl();
        $data = $_SESSION['messageManagement'];


        if ($data['status']) {
            header("Location:/nedmin");
            exit();
            //$this->callLayout("backend", "main", "nedmin", "index", $data);
        } else {
            $this->callView("nedmin", "login", $data);
        }
    }

    public function logout()
    {
        $data = [];
        $logout = new nedminModel();
        $logout->logout();
        $this->callView("nedmin", "login", $data);
    }

    public function settings()
    {
        $data = [];
        $settingsModel = new nedminModel();
        $data['adminSettings'] = $settingsModel->settings();
        $this->callLayout("backend", "main", "nedmin", "settings", $data);
    }

    public function settingsUpdate($settings_id)
    {
        $data = [];
        $settingsUpdateModel = new nedminModel();
        $data['settingsUpdate'] = $settingsUpdateModel->settingsUpdate($settings_id);
        $this->callLayout("backend", "main", "nedmin", "settingsUpdate", $data);
    }

    public function settingsUpdateOp()
    {
        $settingsUpdateOpModel = new nedminModel();
        $_SESSION['messageManagement'] = $settingsUpdateOpModel->settingsUpdateOp();
        //bizi buraya yönlendiren sayfaya gitmek için kullandık.
        header("Location:{$_SERVER['HTTP_REFERER']}");
        exit();
    }

    public function admins()
    {
        $data = [];
        $adminsModel = new nedminModel();
        $data['admins'] = $adminsModel->admins();
        $this->callLayout("backend", "main", "nedmin", "admins", $data);
    }
}