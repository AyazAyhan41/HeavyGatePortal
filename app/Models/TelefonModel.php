<?php


namespace App\Models;

use App\Entities\TelefonEntity;
use \CodeIgniter\Model;

class TelefonModel extends Model
{
    protected $table = 'telefon';
    protected $primaryKey = 'id';

    protected $returnType = TelefonEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'first_name',
        'sur_name',
        'phone',
        'status',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'first_name' => 'required|string|min_length[2]',
        'sur_name' => 'required|string|min_length[2]',
        'phone' => 'required|numeric|min_length[4]|is_unique[telefon.phone]',
        'status' => 'required'
    ];

    protected $validationMessages = [
        'first_name'    => [
            'required'  => 'Ad Alanı Zorunlu Bir Alandır.',
            'string'    => 'Ad Alanı Yanlızca Alfebetik Olmalıdır.',
            'min_length'    =>  'Ad Alanı Minimum 2 Karakterli Olmalıdır.',
        ],
        'sur_name'      => [
            'required'  => 'Soyad Alanı Zorunlu Bir Alandır.',
            'string'    => 'Soyad Alanı Yanlızca Alfebetik Olmalıdır.',
            'min_length'    =>  'Soyad Alanı Minimum 2 Karakterli Olmalıdır.',
        ],
        'phone' => [
            'required' => 'Telefon Alanı Zorunlı Bir Aladndır.',
            'numeric'   =>  'Telefon Alanı Sadece Numaralardan Oluşmalıdır.',
            'min_length' =>  'Telefon Alanı En Az 4 Karakterli Olmalıdır.',
            'is_unique' => 'Telefon Numarası Daha Önceden Kayıt Edilmiştir.'
        ],
        'status'    =>  [
            'required'  =>  'Status Alanı Zorunlu Bir Alandır.',
        ]
    ];

}