<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class LanguageEntity extends Entity
{

    protected $code;
    protected $flag;
    protected $title;
    protected $status;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setCode(string $code)
    {
        $this->attributes['code'] = $code;
    }

    public function setFlag(string $flag)
    {
        $this->attributes['flag'] = $flag;
    }

    public function setTitle(array $title)
    {
        $this->attributes['title'] = json_encode($title, JSON_UNESCAPED_UNICODE);
    }

    public function setStatus($status = STATUS_PASSIVE)
    {
        $this->attributes['status'] = $status;
    }

    public function setDeletedAt()
    {
        $this->attributes['deleted_at'] =  date('Y-m-d H:i:s');
    }


    public function getCode()
    {
        return $this->attributes['code'];
    }

    public function getFlag()
    {
        return base_url('public/admin/flag/'. $this->attributes['flag'].'.svg') ;
    }

    public function getTitle(string $lang = null)
    {
        $locale = !is_null($lang) ? $lang : service('request')->getLocale();
        $title = json_decode($this->attributes['title']);
        return $title->$locale;
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


}  
