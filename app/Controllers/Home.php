<?php namespace App\Controllers;

use App\Entities\GroupEntity;
use App\Models\GroupModel;
use App\Models\LanguageModel;

class Home extends BaseController
{
	public function index()
	{
      /* $lang = new LanguageModel();
       $get = $lang->findAll();

        foreach ($get as $key => $value) {
            echo $value->getCreatedAt(true);
            echo "<br>";

       }*/



        return redirect()->to(route_to('admin_login'));

	}
}
