<?php

class nedminModel extends mainModel
{
    public function indexModel()
    {

    }

    public function loginControl()
    {
        $sonuc = $this->db->adminsLogin(
            htmlspecialchars($_POST['admins_username']),
            htmlspecialchars($_POST['admins_pass']),
            @$_POST['remember_me']
        );
        //return ettiğimiz şey nedminController'a gidiyor.

        return $sonuc;
    }

    public function logout()
    {
        $this->nedminLogout();

    }


    //SETTİNGS
    public function settings()
    {
        $sql = $this->db->read("settings",
            [
                "columns_name" => "settings_must",
                "columns_sort" => "ASC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function settingsUpdate($settings_id)
    {
        //wread tekil işlemler için
        $sql = $this->db->wread("settings", "settings_id", $settings_id);
        //tekil olarak ileteceğimiz için fetch kullanıyoruz.
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function settingsUpdateOp()
    {
        $sql = $this->db->update("settings", $_POST,
            [
                "form_name" => "settings_update",
                "columns" => "settings_id",
                "dir" => "settings",
                "file_name" => "settings_value",
                "file_delete" => "delete_file"
            ]);

        return $sql;
    }


    //ADMİNS
    public function admins()
    {
        //sıralamalar için options'u yani []'yi kullanıyoruz. Yoksa tüm veriler sadece tablodan çekilebilir.
        $sql = $this->db->read("admins",
            [
                "columns_name" => "admins_must",
                "columns_sort" => "ASC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adminsSortable()
    {
        $sql = $this->db->orderUpdate("admins", $_POST['item'], "admins_must", "admins_id");
        echo $sql['status'];
    }

    public function adminsUpdate($admins_id)
    {
        $sql = $this->db->wread("admins", "admins_id", $admins_id);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function adminsUpdateOp()
    {
        $sql = $this->db->update("admins", $_POST,
            [
                "form_name" => "admins_update",
                "columns" => "admins_id",
                "dir" => "admins",
                "file_name" => "admins_file",
                "file_delete" => "delete_file",
                "pass" => "admins_pass"
            ]);

        return $sql;
    }

    public function adminsDelete($admins_id)
    {
        $sql = $this->db->delete("admins", "admins_id", $admins_id);
        return $sql;
    }

    public function adminsInsertOp()
    {
        $sql = $this->db->insert("admins", $_POST,
            [
                "form_name" => "admins_insert",
                "dir" => "admins",
                "file_name" => "admins_file",
                "pass" => "admins_pass"
            ]);
        return $sql;
    }


    //SLİDERS
    public function sliders()
    {
        //sıralamalar için options'u yani []'yi kullanıyoruz. Yoksa tüm veriler sadece tablodan çekilebilir.
        $sql = $this->db->read("sliders",
            [
                "columns_name" => "sliders_must",
                "columns_sort" => "ASC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function slidersInsertOp()
    {
        $sql = $this->db->insert("sliders", $_POST,
            [
                "form_name" => "sliders_insert",
                "dir" => "sliders",
                "file_name" => "sliders_file"
            ]);
        return $sql;
    }

    public function slidersDelete($sliders_id)
    {
        $sql = $this->db->delete("sliders", "sliders_id", $sliders_id);
        return $sql;
    }

    public function slidersSortable()
    {
        $sql = $this->db->orderUpdate("sliders", $_POST['item'], "sliders_must", "sliders_id");
        echo $sql['status'];
    }


    //BLOGS
    public function blogs()
    {
        //sıralamalar için options'u yani []'yi kullanıyoruz. Yoksa tüm veriler sadece tablodan çekilebilir.
        $sql = $this->db->read("blogs",
            [
                "columns_name" => "blogs_must",
                "columns_sort" => "ASC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function blogsInsertOp()
    {
        $sql = $this->db->insert("blogs", $_POST,
            [
                "form_name" => "blogs_insert",
                "slug" => "blogs_slug",
                "title" => "blogs_title",
                "dir" => "blogs",
                "file_name" => "blogs_file"
            ]);
        return $sql;
    }

    public function blogsUpdate($blogs_id)
    {
        $sql = $this->db->wread("blogs", "blogs_id", $blogs_id);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function blogsUpdateOp()
    {
        $sql = $this->db->update("blogs", $_POST,
            [
                "form_name" => "blogs_update",
                "slug" => "blogs_slug",
                "title" => "blogs_title",
                "columns" => "blogs_id",
                "dir" => "blogs",
                "file_name" => "blogs_file",
                "file_delete" => "delete_file"
            ]);

        return $sql;
    }

    public function blogsDelete($blogs_id)
    {
        $sql = $this->db->delete("blogs", "blogs_id", $blogs_id);
        return $sql;
    }

    public function blogsSortable()
    {
        $sql = $this->db->orderUpdate("blogs", $_POST['item'], "blogs_must", "blogs_id");
        echo $sql['status'];
    }


    //ABOUTS
    public function abouts()
    {
        //sıralamalar için options'u yani []'yi kullanıyoruz. Yoksa tüm veriler sadece tablodan çekilebilir.
        $sql = $this->db->read("abouts",
            [
                "columns_name" => "abouts_must",
                "columns_sort" => "ASC"
            ]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function aboutsInsertOp()
    {
        $sql = $this->db->insert("abouts", $_POST,
            [
                "form_name" => "abouts_insert",
                "slug" => "abouts_slug",
                "title" => "abouts_title",
                "dir" => "abouts",
                "file_name" => "abouts_file"
            ]);
        return $sql;
    }

    public function aboutsUpdate($abouts_id)
    {
        $sql = $this->db->wread("abouts", "abouts_id", $abouts_id);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function aboutsUpdateOp()
    {
        $sql = $this->db->update("abouts", $_POST,
            [
                "form_name" => "abouts_update",
                "slug" => "abouts_slug",
                "title" => "abouts_title",
                "columns" => "abouts_id",
                "dir" => "abouts",
                "file_name" => "abouts_file",
                "file_delete" => "delete_file"
            ]);

        return $sql;
    }

    public function aboutsDelete($abouts_id)
    {
        $sql = $this->db->delete("abouts", "abouts_id", $abouts_id);
        return $sql;
    }

    public function aboutsSortable()
    {
        $sql = $this->db->orderUpdate("abouts", $_POST['item'], "abouts_must", "abouts_id");
        echo $sql['status'];
    }

}