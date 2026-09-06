<?php

namespace App\Models;

use CodeIgniter\Model;

abstract class BaseTenantModel extends Model
{
    protected $useTimestamps = true;

    /**
     * Get active tenant_id from session
     */
    protected function getTenantId()
    {
        return session()->get('tenant_id');
    }

    /**
     * Automatically scope find/findAll queries by tenant_id if user is not superadmin
     */
    public function forTenant()
    {
        $tenantId = $this->getTenantId();
        $userRole = session()->get('user_role');

        if ($userRole !== 'superadmin' && $tenantId) {
            return $this->where($this->table . '.tenant_id', $tenantId);
        }

        return $this;
    }

    /**
     * Automatically inject tenant_id into insert data if not provided
     */
    public function insert($data = null, bool $returnID = true)
    {
        $tenantId = $this->getTenantId();

        if (is_array($data) && !isset($data['tenant_id']) && $tenantId) {
            $data['tenant_id'] = $tenantId;
        }

        return parent::insert($data, $returnID);
    }
}
