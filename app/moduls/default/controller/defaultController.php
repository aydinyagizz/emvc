<?php

class defaultController extends mainController
{
    public function index()
    {
        $data = [];
        $indexModel = new defaultModel();
        $data['sliders'] = $indexModel->sliderModel();
        $data['blogs'] = $indexModel->blogsModel();
        $this->callLayout("frontend", "main", "default", "index", $data);
    }


}