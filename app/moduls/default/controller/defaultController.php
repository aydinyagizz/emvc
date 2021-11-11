<?php

class defaultController extends mainController
{
    public function index()
    {
        $data = [];
        $this->callLayout("frontend", "main", "default", "index", $data);
    }



}