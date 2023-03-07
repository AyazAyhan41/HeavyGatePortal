<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;
use phpDocumentor\Reflection\Types\True_;

class GroupEntity extends Entity
{

    protected $id;
    protected $slug;
    protected $title;
    protected $permissions;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function setSlug($title)
    {
        $defaultLang = config('app')->defaultLocale;
        if(is_array($title))
        {
            $slug = devx_slug_creator($title[$defaultLang]);
        }else{
            $slug = devx_slug_creator($title);
        }

        $this->attributes['slug'] = $slug;
    }

    public function setTitle(array $title)
    {
        $this->attributes['title'] = json_encode($title,JSON_UNESCAPED_UNICODE);
    }

    public function setPermit($permissions = null)
    {
        $permissions = !is_null($permissions) ? array_keys($permissions) : [];
        $this->attributes['permissions'] = json_encode($permissions);
    }

    public function getSlug()
    {
        return $this->attributes['slug'];
    }

    public function getTitle(string $lang = null)
    {
        $locale = !is_null($lang) ? $lang : service('request')->getLocale();
        $title = json_decode($this->attributes['title']);
        return $title->$locale;
    }

    public function getTitleLang(string $lang)
    {
        $title = json_decode($this->attributes['title']);

        return $title->$lang;
    }

    public function getPermit()
    {
        return json_decode($this->attributes['permissions'], JSON_UNESCAPED_UNICODE);
    }

    public function haveLoginPermit()
    {
        if ($this->attributes['slug'] == DEFAULT_ADMIN_GROUP) {
            return true;
        }
        $permit = json_decode($this->attributes['permissions']);
        if (in_array(LOGIN_PERMIT_KEY, $permit)) {
            return true;
        }

        return false;
    }

    public function permitControl(string $permit)
    {
        if ($this->attributes['slug'] == DEFAULT_ADMIN_GROUP) {
            return true;
        }
        $userPermissionList = json_decode($this->attributes['permissions']);
        if (in_array($permit, $userPermissionList)) {
            return true;
        }

        return false;
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
