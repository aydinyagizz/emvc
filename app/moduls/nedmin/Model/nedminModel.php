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

}