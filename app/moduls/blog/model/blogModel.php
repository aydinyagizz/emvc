<?php

class blogModel extends mainModel
{
    public function indexModel()
    {
        $sql = $this->db->read("blogs",
            [
                "columns_name" => "blogs_must",
                "columns_sort" => "DESC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function detailModel($blogs_id)
    {
        $sql = $this->db->wread("blogs", "blogs_id", $blogs_id);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}