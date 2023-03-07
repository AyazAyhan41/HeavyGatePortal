<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;
use phpDocumentor\Reflection\Types\True_;

class RaporEntity extends Entity
{
    protected $id;
    protected $baslik;
    protected $aciklama;
    protected $form_adi;
    protected $sql;


    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function setBaslik(string $baslik)
    {
        $this->attributes['baslik'] = $baslik;
    }

    public function setAciklama(string $aciklama)
    {
        $this->attributes['aciklama'] = $aciklama;
    }

    public function setSQL(string $sql)
    {
        $this->attributes['sql'] = $sql;
    }

    public function setFormAdi(string $form_adi)
    {
        $this->attributes['form_adi'] = $form_adi;
    }

    public function getBaslik()
    {
        return $this->attributes['baslik'];
    }

    public function getAciklama()
    {
        return $this->attributes['aciklama'];
    }

    public function getSQL()
    {
        return $this->attributes['sql'];
    }

    public function getFormAdi()
    {
        return $this->attributes['form_adi'];
    }


}