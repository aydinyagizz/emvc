<?php

class aboutsController extends mainController
{
    public function index($abouts_slug)
    {
        $data = [];
        $indexModel = new aboutsModel();
        $data['aboutsDetails'] = $indexModel->indexModel($abouts_slug);
        //page'larde sidebar için
        $data['aboutsList'] = $indexModel->detailsModel();
        $this->callLayout("frontend", "main", "abouts", "index", $data);
    }

}