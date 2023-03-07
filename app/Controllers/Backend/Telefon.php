<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\TelefonEntity;
use App\Models\TelefonModel;


class Telefon extends BaseController
{
    protected $telefonModel;
    protected $telefonEntity;
    public function __construct()
    {
        $this->telefonModel = new TelefonModel();
        $this->telefonEntity = new TelefonEntity();
    }

    public function index()
    {

        $data = [
            'telefons' => $this->telefonModel->paginate(1000),
        ];

        return view('admin/pages/telefon/listing',$data);
    }

    public function add()
    {

        if($this->request->getMethod() == 'post'){
            $this->telefonEntity->setFirstName($this->request->getPost('first_name'));
            $this->telefonEntity->setSurName($this->request->getPost('sur_name'));
            $this->telefonEntity->setPhone($this->request->getPost('phone'));
            $this->telefonEntity->setStatus($this->request->getPost('status'));

            $this->telefonModel->save($this->telefonEntity);

            if($this->telefonModel->errors()){
                return redirect()->back()->with('error', $this->telefonModel->errors());
            }

            return redirect()->back()->with('success', 'Telefon Başarılı Bir Şekilde Eklendi');

        }

        return view('admin/pages/telefon/add');
    }


    public function edit($id)
    {
        if ($this->request->getMethod() == 'post')
        {
            $first_name = $this->request->getPost('first_name');
            $sur_name = $this->request->getPost('sur_name');
            $phone = $this->request->getPost('phone');
            $status = $this->request->getPost('status');


            $this->telefonEntity->setId($id);
            $this->telefonEntity->setFirstName($first_name);
            $this->telefonEntity->setSurName($sur_name);
            $this->telefonEntity->setPhone($phone);
            $this->telefonEntity->setStatus($status);


            $this->telefonModel->update($id, $this->telefonEntity);

            if ($this->telefonModel->errors()) {
                return redirect()->back()->with('error', $this->telefonModel->errors());
            }
            return redirect()->back()->with('success', 'Güncelleme Başarılı');
        }

        $data = [
            'telefon' => $this->telefonModel->find($id)
        ];

        return view('admin/pages/telefon/edit', $data);
    }


    public function delete()
    {
        if($this->request->isAJAX()) {

            $data = $this->request->getPost('id');

            $telefon = $this->telefonModel->where('id',$data)->first();

            if(!$telefon){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Silme İşlemi Başarısız Oldu'
                ]);
            }

            $delete = $this->telefonModel->delete($data);

            if (!$delete){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Silme İşlemi Başarısız Oldu.'
                ]);
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Telefon Başarılı Bir Şekilde Silindi'
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Silme İşlemi Başarısız'
        ]);

    }
}
