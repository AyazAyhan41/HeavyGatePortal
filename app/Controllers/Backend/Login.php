<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Libraries\EmailTo;
use App\Models\GroupModel;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $validation;
    protected $session;
    protected $userModel;
    protected $userEntity;
    protected $emailTo;
    protected $groupModel;


    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
        $this->userEntity = new UserEntity();
        $this->groupModel = new GroupModel();
        $this->emailTo = new EmailTo();
    }

    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ];
            if (!$this->validation->run($data, 'login')) {

                return redirect()->back()->with('error',$this->validation->getErrors());

            }

            $user = $this->userModel->where('email', $data['email'])->first();
            if (!$user) {
                return redirect()->back()->with('error',lang('Errors.text.user_not_found'));
            }

            $group = $this->groupModel->find($user->getGroupID());

            if(!$group->haveLoginPermit())
            {
                return redirect()->back()->with('error',lang('Permissions.text.login_error'));
            }

            
            if(!$user->getPasswordVerify($data['password']))
            {
                return redirect()->back()->with('error',lang('Errors.text.user_password_error'));

            }
            
            if ($user->getStatus() == USER_PENDING) {
                $this->emailTo->settings()->setUser($user)->accountVerify()->send();

                return redirect()->back()->with('error',lang('Errors.text.user_login_status_pending'));

            }
            if ($user->getStatus() == USER_PASSIVE) {
                return redirect()->back()->with('error',lang('Errors.text.user_login_status_passive'));

            }



            $this->session->set([
                'isLogin' => true,
                'userData' => [
                    'id' => $user->id,
                    'email' => $user->getEmail(),
                    'name' => $user->getFullName(),
                    'group' => $group->getSlug()
                ],
                'permissions' => $group->getPermit()
            ]);

            return redirect()->to(route_to('admin_dashboard_test'));

        }

        return view('admin/pages/auth/login');

    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(route_to('admin_login'));
    }

}  