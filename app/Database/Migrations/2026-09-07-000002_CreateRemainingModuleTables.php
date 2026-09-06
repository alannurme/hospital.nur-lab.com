<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRemainingModuleTables extends Migration
{
    public function up()
    {
        // 1. Lab Reports Table
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tenant_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'patient_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'doctor_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'test_name'      => ['type' => 'VARCHAR', 'constraint' => 150],
            'category'       => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Pathology'],
            'result_summary' => ['type' => 'TEXT', 'null' => true],
            'fee'            => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
            'status'         => ['type' => 'ENUM', 'constraint' => ['pending', 'completed', 'delivered'], 'default' => 'pending'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tenant_id', 'tenants', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('patient_id', 'patients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('lab_reports');

        // 2. Invoices & Billing Table
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tenant_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'patient_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'invoice_code'   => ['type' => 'VARCHAR', 'constraint' => 50],
            'total_amount'   => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
            'paid_amount'    => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
            'payment_status' => ['type' => 'ENUM', 'constraint' => ['paid', 'partial', 'unpaid'], 'default' => 'unpaid'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tenant_id', 'tenants', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('patient_id', 'patients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('invoices');

        // 3. Pharmacy Medicines Table
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tenant_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'item_name'   => ['type' => 'VARCHAR', 'constraint' => 150],
            'category'    => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Tablet'],
            'stock_qty'   => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'unit_price'  => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tenant_id', 'tenants', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pharmacy_items');
    }

    public function down()
    {
        $this->forge->dropTable('pharmacy_items', true);
        $this->forge->dropTable('invoices', true);
        $this->forge->dropTable('lab_reports', true);
    }
}
