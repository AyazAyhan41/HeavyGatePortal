<?php


namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Libraries\EmailTo;
use App\Models\GroupModel;
use App\Models\UserModel;

class Register extends BaseController
{
    protected $validation;
    protected $session;
    protected $userEntity;
    protected $userModel;
    protected $groupModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->userEntity = new UserEntity();
        $this->userModel = new UserModel();
        $this->groupModel = new GroupModel();
    }

    public function index()
    {
        if($this->request->getMethod() == 'post'){
            $data = [
                'first_name' => $this->request->getPost('first_name'),
                'sur_name' => $this->request->getPost('sur_name'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'password2' => $this->request->getPost('password2'),
            ];

            if(!$this->validation->run($data, 'register')){

                return redirect()->back()->with('error',$this->validation->getErrors());

            }
            $group = $this->groupModel->where('slug',DEFAULT_REGISTER_USER)->first();

            $this->userEntity->setGroupID($group->id);
            $this->userEntity->setFirstName($data['first_name']);
            $this->userEntity->setSurName($data['sur_name']);
            $this->userEntity->setEmail($data['email']);
            $this->userEntity->setVerifyKey();
            $this->userEntity->setVerifyCode();
            $this->userEntity->setStatus(USER_PENDING);
            $this->userEntity->setPassword($data['password']);

            $insert = $this->userModel->insert($this->userEntity);

            if($this->userModel->errors()){
                return redirect()->back()->with('error',$this->userModel->errors());
            }

            $email = new EmailTo();
            $user = $this->userModel->find($insert);
            $to = $email->settings()->setUser($user)->accountVerify()->send();
            if($to){
                return redirect()->back()->with('success',lang('Success.text.register'));
            }
            return redirect()->back()->with('error',lang('Errors.text.email_send_faild'));
        }

        return view('admin/pages/auth/register');
    }
}