<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\GroupEntity;
use App\Models\GroupModel;
use App\Models\UserModel;

class Group extends BaseController
{
    protected $groupModel;
    protected $groupEntity;
    protected $userModel;

    public function __construct()
    {
        $this->groupModel = new GroupModel();
        $this->groupEntity = new GroupEntity();
        $this->userModel = new UserModel();
    }

    public function listing()
    {

        $data = ['groups' => $this->groupModel->paginate()];


        return view('admin/pages/group/listing', $data);
    }

    public function create()
    {

        if ($this->request->getMethod() == 'post') {

            $title = $this->request->getPost('title');
            $permissions = $this->request->getPost('permission');
            $this->groupEntity->setSlug($title);
            $this->groupEntity->setTitle($title);
            $this->groupEntity->setPermit($permissions);

            $this->groupModel->insert($this->groupEntity);

            if ($this->groupModel->errors()) {
                return redirect()->back()->with('error', $this->groupModel->errors());
            }
            return redirect()->back()->with('success', lang('Success.text.group_create'));

        }

        return view('admin/pages/group/create');
    }

    public function edit(int $id)
    {
        if ($this->request->getMethod() == 'post') {
            $title = $this->request->getPost('title');
            $permissions = $this->request->getPost('permission') ;

            $this->groupEntity->setId($id);
            $this->groupEntity->setSlug($title);
            $this->groupEntity->setTitle($title);
            $this->groupEntity->setPermit($permissions);

            $this->groupModel->update($id, $this->groupEntity);

            if ($this->groupModel->errors()) {
                return redirect()->back()->with('error', $this->groupModel->errors());
            }
            return redirect()->back()->with('success', lang('Success.text.group_update'));
        }

        $data = [
            'group' => $this->groupModel->find($id)
        ];

        return view('admin/pages/group/edit', $data);
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost('id');

            if (is_array($data)) {
                $adminGroup = $this->groupModel->where('slug', DEFAULT_ADMIN_GROUP)->first();
                if (in_array($adminGroup->id, $data)) {
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => lang('Errors.text.group_delete_admin')
                    ]);
                }

                $isStatus = false;
                foreach ($data as $key => $value){
                    $isUser = $this->userModel->where('group_id',$value)->first();
                    if($isUser)
                    {
                        $isStatus = true;
                        break;
                    }
                }

                if($isStatus)
                {
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => lang('Errors.text.group_delete_user_control')
                    ]);
                }
            } else {
                $group = $this->groupModel->find($data);
                if ($group->getSlug() == DEFAULT_ADMIN_GROUP) {
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => lang('Errors.text.group_delete_admin')
                    ]);
                }

                $isUser = $this->userModel->where('group_id',$data)->first();
                if($isUser)
                {
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => lang('Errors.text.group_delete_user_control')
                    ]);
                }
            }

            $delete = $this->groupModel->delete($data);

            if (!$delete) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => lang('Errors.text.group_delete_error')
                ]);
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => lang('Success.text.group_delete')
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => lang('Errors.text.group_delete_error')
        ]);
    }

    public function undoDelete()
    {
        if($this->request->isAJAX())
        {
            $data = $this->request->getPost('id');

            $update = $this->groupModel->update($data,['deleted_at'=>null]);

            if(!$update)
            {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => lang('Errors.text.group_undo_delete_error')
                ]);
            }
            return $this->response->setJSON([
                'status' => true,
                'message' => lang('Success.text.group_undo_success')
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => lang('Errors.text.group_delete_error')
        ]);
    }

    public function purgeDelete()
    {
        if($this->request->isAJAX())
        {
            $data = $this->request->getPost('id');

            $delete = $this->groupModel->delete($data,true);

            if(!$delete)
            {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => lang('Errors.text.group_purge_delete_error')
                ]);
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => lang('Success.text.group_purge_delete_success')
            ]);

        }

        return $this->response->setJSON([
            'status' => false,
            'message' => lang('Errors.text.group_purge_delete_error')
        ]);
    }

}  