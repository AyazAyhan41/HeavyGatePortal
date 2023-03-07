<?php

namespace App\Models;

use App\Entities\GroupEntity;
use CodeIgniter\Model;
use phpDocumentor\Reflection\Type;


class GroupModel extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';

    //TODO: group entity yazıldıgında bu alan değişicek
    protected $returnType = GroupEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'slug',
        'title',
        'permissions',
        'deleted_at'

    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'slug' => 'required|is_unique[groups.slug,id,{id}]',
        'title' => 'required',
        'permissions' => 'required'
    ];

    protected $validationMessages = [
        'slug' => [
            'required' => 'Validation.text.groups_slug_required',
            'is_unique' => 'Validation.text.group_slug_is_unique'
        ],
        'title' => [
            'required' => 'Validation.text.group_title_required'
        ],
        'permissions' => [
            'group_permissions_required' => 'Validation.text.group_title_required'
        ]
    ];

    public function getListing(string $type = null, string $search = null, int $pager = null)
    {

        $model = !is_null($search) ? $model = $this->like('title', $search) : $this;
        $model = $type == 'delete' ? $model->onlyDeleted() : $model;

        if (is_null($pager)) {
            return [
                'groups' => $model->findAll(),
            ];
        }
        return [
            'groups' => $model->paginate($pager),
            'pager' => $model->pager,
        ];
    }

} 