<?php


namespace App\Models;

use App\Entities\RaporEntity;
use App\Entities\TelefonEntity;
use \CodeIgniter\Model;

class RaporModel extends Model
{
    protected $table = 'raporserver';
    protected $primaryKey = 'id';

    protected $returnType = RaporEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'baslik',
        'aciklama',
        'sql',
        'form_adi'
    ];

    protected $validationRules = [
        'baslik' => 'required|string|min_length[2]',
        'sql' => 'required|string|min_length[2]',
        'form_adi' => 'required|string|min_length[2]'
    ];

    protected $validationMessages = [
        'baslik'    => [
            'required'  => 'Başlık Alanı Zorunlu Bir Alandır.',
            'string'    => 'Başlık Alanı Yanlızca Alfebetik Olmalıdır.',
            'min_length'    =>  'Başlık Alanı Minimum 2 Karakterli Olmalıdır.',
        ],
        'sql' => [
            'required' => 'Sql Alanı Zorunlı Bir Aladndır.',
            'string'   =>  'Sql Alanı Sadece Numaralardan Oluşmalıdır.',
            'min_length' =>  'Sql Alanı En Az 2 Karakterli Olmalıdır.',
        ],
        'form_adi'    =>  [
            'required' => 'Form Adı Alanı Zorunlı Bir Aladndır.',
            'string'   =>  'Form Adı Alanı Sadece Numaralardan Oluşmalıdır.',
            'min_length' =>  'Form Adı Alanı En Az 2 Karakterli Olmalıdır.',
        ]
    ];


}