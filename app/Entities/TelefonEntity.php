<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class TelefonEntity extends Entity
{
    protected $id;
    protected $first_name;
    protected $sur_name;
    protected $phone;
    protected $status;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getFirstName()
    {
        return $this->attributes['first_name'];
    }

    public function getSurName()
    {
        return $this->attributes['sur_name'];
    }

    public function getFullName()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['sur_name'];
    }

    public function getPhone()
    {
        return $this->attributes['phone'];
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function getCreatedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['created_at']);
            return $date->humanize();
        }

        return $this->attributes['created_at'];
    }

    public function getUpdatedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['updated_at']);
            return $date->humanize();
        }

        return $this->attributes['updated_at'];
    }

    public function getDeletedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['deleted_at']);
            return $date->humanize();
        }

        return $this->attributes['deleted_at'];
    }


    public function setFirstName(string $first_name)
    {
        $this->attributes['first_name'] = $first_name;
    }

    public function setSurName(string $sur_name)
    {
        $this->attributes['sur_name'] = $sur_name;
    }

    public function setPhone(string $phone)
    {
        $this->attributes['phone'] = $phone;
    }

    public function setStatus($status = USER_ACTIVE){
        $this->attributes['status'] = $status;
    }

    public function setDeletedAt()
    {
        $this->attributes['deleted_at'] =  date('Y-m-d H:i:s');
    }


}
