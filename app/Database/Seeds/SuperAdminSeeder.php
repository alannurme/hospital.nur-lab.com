<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // 1. Create Super Admin User
        $db->table('users')->insert([
            'tenant_id'     => null,
            'name'          => 'Super System Admin',
            'email'         => 'admin@saas.com',
            'password_hash' => password_hash('admin123', PASSWORD_BCRYPT),
            'role'          => 'superadmin',
            'phone'         => '01700000000',
            'status'        => 'active',
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        // 2. Create Default Hospital Tenant
        $db->table('tenants')->insert([
            'name'       => 'Nur Lab General Hospital',
            'slug'       => 'nur-lab',
            'phone'      => '01811112222',
            'email'      => 'info@nurlab.com',
            'address'    => '123 Medical College Road, Dhaka',
            'package'    => 'enterprise',
            'status'     => 'active',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $tenantId = $db->insertID();

        // 3. Create Hospital Admin User
        $db->table('users')->insert([
            'tenant_id'     => $tenantId,
            'name'          => 'Hospital Admin',
            'email'         => 'admin@nurlab.com',
            'password_hash' => password_hash('hospital123', PASSWORD_BCRYPT),
            'role'          => 'hospital_admin',
            'phone'         => '01811112222',
            'status'        => 'active',
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        // 4. Create Sample Doctor for Tenant
        $db->table('doctors')->insert([
            'tenant_id'        => $tenantId,
            'name'             => 'Dr. Tanvir Hasan',
            'department'       => 'Cardiology',
            'specialization'   => 'Heart Specialist (MBBS, FCPS)',
            'consultation_fee' => 1000.00,
            'phone'            => '01711223344',
            'created_at'       => date('Y-m-d H:i:s'),
        ]);

        $doctorId = $db->insertID();

        // 4b. Create Doctor User Account for Login
        $db->table('users')->insert([
            'tenant_id'     => $tenantId,
            'name'          => 'Dr. Tanvir Hasan',
            'email'         => 'doctor@nurlab.com',
            'password_hash' => password_hash('doctor123', PASSWORD_BCRYPT),
            'role'          => 'doctor',
            'phone'         => '01711223344',
            'status'        => 'active',
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        // 5. Create Sample Patient for Tenant
        $db->table('patients')->insert([
            'tenant_id'    => $tenantId,
            'patient_code' => 'PAT-1001',
            'name'         => 'Rahim Ahmed',
            'phone'        => '01999887766',
            'age'          => 42,
            'gender'       => 'Male',
            'blood_group'  => 'O+',
            'address'      => 'Mirpur-10, Dhaka',
            'created_at'   => date('Y-m-d H:i:s'),
        ]);

        $patientId = $db->insertID();

        // 6. Create Sample Appointment for Tenant
        $db->table('appointments')->insert([
            'tenant_id'        => $tenantId,
            'patient_id'       => $patientId,
            'doctor_id'        => $doctorId,
            'appointment_date' => date('Y-m-d 10:30:00', strtotime('+1 day')),
            'fee'              => 1000.00,
            'status'           => 'confirmed',
            'notes'            => 'Routine cardiac checkup',
            'created_at'       => date('Y-m-d H:i:s'),
        ]);
    }
}
