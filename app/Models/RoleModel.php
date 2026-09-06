<?php

namespace App\Models;

class RoleModel extends BaseTenantModel
{
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'tenant_id',
        'role_name',
        'role_key',
        'description',
        'permissions',
        'status',
        'created_at',
        'updated_at'
    ];
}
