<?php

namespace App\Models;

class PharmacyModel extends BaseTenantModel
{
    protected $table         = 'pharmacy_items';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['tenant_id', 'item_name', 'category', 'stock_qty', 'unit_price'];
}
