<?php

class aboutsModel extends mainModel
{
    public function indexModel($abouts_slug)
    {
        $sql = $this->db->wread("abouts", "abouts_slug", $abouts_slug);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function detailsModel()
    {
        $sql = $this->db->read("abouts",
            [
                "columns_name" => "abouts_must",
                "columns_sort" => "ASC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}