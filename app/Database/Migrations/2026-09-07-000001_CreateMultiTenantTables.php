<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMultiTenantTables extends Migration
{
    public function up()
    {
        // 1. Tenants Table
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug'                  => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'pending_slug'          => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'custom_domain'         => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'pending_custom_domain' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'email'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'address'     => ['type' => 'TEXT', 'null' => true],
            'package'     => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'standard'],
            'status'      => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tenants');

        // 2. Users Table
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tenant_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 150],
            'username'      => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'email'         => ['type' => 'VARCHAR', 'constraint' => 150],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
            'role'          => ['type' => 'ENUM', 'constraint' => ['superadmin', 'hospital_admin', 'doctor', 'receptionist', 'patient'], 'default' => 'hospital_admin'],
            'phone'         => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'status'        => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tenant_id', 'tenants', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('users');

        // 3. Patients Table
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tenant_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'patient_code' => ['type' => 'VARCHAR', 'constraint' => 50],
            'name'         => ['type' => 'VARCHAR', 'constraint' => 150],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 30],
            'age'          => ['type' => 'INT', 'constraint' => 3],
            'gender'       => ['type' => 'ENUM', 'constraint' => ['Male', 'Female', 'Other'], 'default' => 'Male'],
            'blood_group'  => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'address'      => ['type' => 'TEXT', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tenant_id', 'tenants', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('patients');

        // 4. Doctors Table
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tenant_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'user_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'name'            => ['type' => 'VARCHAR', 'constraint' => 150],
            'bmdc_reg_no'     => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'department'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'designation'     => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'specialization'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'consultation_fee'=> ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
            'followup_fee'    => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
            'room_no'         => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'visiting_days'   => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'visiting_time'   => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'phone'           => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tenant_id', 'tenants', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('doctors');

        // 5. Appointments Table
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tenant_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'patient_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'doctor_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'appointment_date' => ['type' => 'DATETIME'],
            'fee'              => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
            'status'           => ['type' => 'ENUM', 'constraint' => ['pending', 'confirmed', 'completed', 'cancelled'], 'default' => 'pending'],
            'notes'            => ['type' => 'TEXT', 'null' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tenant_id', 'tenants', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('patient_id', 'patients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('doctor_id', 'doctors', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('appointments');
    }

    public function down()
    {
        $this->forge->dropTable('appointments', true);
        $this->forge->dropTable('doctors', true);
        $this->forge->dropTable('patients', true);
        $this->forge->dropTable('users', true);
        $this->forge->dropTable('tenants', true);
    }
}
