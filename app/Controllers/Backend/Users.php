<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Models\GroupModel;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $groupModel;
    protected $userModel;
    protected $userEntity;

    public function __construct()
    {
        $this->groupModel = new GroupModel();
        $this->userModel = new UserModel();
        $this->userEntity = new UserEntity();
    }

    public function listing(string $status = null)
    {
        $getDateFilter = $this->request->getGet('dateFilter');
        $dateFilter = explode(' - ', $getDateFilter);
        $dateFilter = count($dateFilter) > 1 ? $dateFilter : null;

        $perPage = $this->request->getGet('perPage');
        $perPage = !empty($perPage) ? $perPage : 20;

        $search = $this->request->getGet('search');
        $search = !empty($search) ? $search : null;

        $group = $this->request->getGet('group');
        $group = !empty($group) ? $group : null;

        $data = [
            'perPage' => $perPage,
            'dateFilter' => $getDateFilter,
            'search' => $search,
            'groups' => $this->groupModel->findAll()
        ];

        $getModel = $this->userModel->getListing($status, $search, $group, $dateFilter, $perPage);

        $data = array_merge($data, $getModel);

        return view('admin/pages/user/listing', $data);
    }

}  