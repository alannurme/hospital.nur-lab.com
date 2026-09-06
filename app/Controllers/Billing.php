<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\PatientModel;

class Billing extends BaseController
{
    public function index()
    {
        $invoiceModel = new InvoiceModel();
        $patientModel = new PatientModel();

        $data = [
            'invoices' => $invoiceModel->getInvoicesWithPatient(),
            'patients' => $patientModel->forTenant()->findAll(),
        ];

        return view('billing/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            $invoiceModel = new InvoiceModel();

            $totalAmount = $this->request->getPost('total_amount');
            $paidAmount  = $this->request->getPost('paid_amount');

            $status = 'unpaid';
            if ($paidAmount >= $totalAmount) {
                $status = 'paid';
            } elseif ($paidAmount > 0) {
                $status = 'partial';
            }

            $invoiceModel->insert([
                'patient_id'     => $this->request->getPost('patient_id'),
                'invoice_code'   => 'INV-' . date('Y') . '-' . rand(1000, 9999),
                'total_amount'   => $totalAmount,
                'paid_amount'    => $paidAmount,
                'payment_status' => $status,
            ]);

            return redirect()->to('billing')->with('success', 'Invoice generated successfully.');
        }

        return redirect()->to('billing');
    }
}
