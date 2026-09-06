<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ModulesSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        $tenant = $db->table('tenants')->get()->getFirstRow('array');
        $patient = $db->table('patients')->get()->getFirstRow('array');
        $doctor = $db->table('doctors')->get()->getFirstRow('array');

        if ($tenant && $patient) {
            // Seed Lab Report
            $db->table('lab_reports')->insert([
                'tenant_id'      => $tenant['id'],
                'patient_id'     => $patient['id'],
                'doctor_id'      => $doctor['id'] ?? null,
                'test_name'      => 'Complete Blood Count (CBC)',
                'category'       => 'Hematology',
                'result_summary' => 'Hemoglobin: 14.2 g/dL (Normal), WBC: 7,500 /uL',
                'fee'            => 500.00,
                'status'         => 'completed',
                'created_at'     => date('Y-m-d H:i:s'),
            ]);

            // Seed Invoice
            $db->table('invoices')->insert([
                'tenant_id'      => $tenant['id'],
                'patient_id'     => $patient['id'],
                'invoice_code'   => 'INV-2026-001',
                'total_amount'   => 1500.00,
                'paid_amount'    => 1500.00,
                'payment_status' => 'paid',
                'created_at'     => date('Y-m-d H:i:s'),
            ]);

            // Seed Pharmacy Item
            $db->table('pharmacy_items')->insert([
                'tenant_id'  => $tenant['id'],
                'item_name'  => 'Paracetamol 500mg (Napa)',
                'category'   => 'Tablet',
                'stock_qty'  => 1200,
                'unit_price' => 1.50,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
