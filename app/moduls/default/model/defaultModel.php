<?php

class defaultModel extends mainModel
{
    public function indexModel()
    {
        $sql = $this->db->read("settings");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    //SLİDERS
    public function sliderModel()
    {
        $sql = $this->db->read("sliders",
            [
                "columns_name" => "sliders_must",
                "columns_sort" => "ASC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //BLOGS
    public function blogsModel()
    {
        $sql = $this->db->read("blogs",
            [
                "columns_name" => "blogs_must",
                "columns_sort" => "DESC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}
