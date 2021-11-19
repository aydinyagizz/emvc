<?php

class blogController extends mainController
{
    public function index()
    {
        $data = [];
        $indexModel = new blogModel();
        $data['blogs'] = $indexModel->indexModel();
        $this->callLayout("frontend", "main", "blog", "index", $data);
    }

    public function detail($blogs_id)
    {
        $data = [];
        $blogModel = new blogModel();
        $data['blogsDetails'] = $blogModel->detailModel($blogs_id);
        $this->callLayout("frontend", "main", "blog", "detail", $data);
    }
}