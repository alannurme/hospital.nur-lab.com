<?php

namespace App\Models;

class InvoiceModel extends BaseTenantModel
{
    protected $table         = 'invoices';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['tenant_id', 'patient_id', 'invoice_code', 'total_amount', 'paid_amount', 'payment_status'];

    public function getInvoicesWithPatient()
    {
        return $this->forTenant()
                    ->select('invoices.*, patients.name as patient_name, patients.patient_code')
                    ->join('patients', 'patients.id = invoices.patient_id')
                    ->orderBy('invoices.created_at', 'DESC')
                    ->findAll();
    }
}
