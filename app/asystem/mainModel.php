<?php

//ana veritabanı işlemleri sınıfımızı başlatıyoruz.
class mainModel extends CrudPDO
{

    public $db;

    public function __construct()
    {
        //veritabanı bağlantı işlemi
        $this->db = new CrudPDO();
    }

}