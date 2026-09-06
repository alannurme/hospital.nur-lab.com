<?php

namespace App\Models;

use CodeIgniter\Model;

class TenantModel extends Model
{
    protected $table            = 'tenants';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'slug', 'pending_slug', 'custom_domain', 'pending_custom_domain', 'phone', 'email', 'address', 'package', 'status', 'notice_ticker', 'opd_hours'];
    protected $useTimestamps    = true;
}
