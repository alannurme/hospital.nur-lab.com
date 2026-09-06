<?php

namespace App\Controllers;

use App\Models\TenantModel;
use App\Models\DoctorModel;

class Home extends BaseController
{
    public function index()
    {
        return view('frontend/landing');
    }

    public function hospitalIndex()
    {
        return redirect()->to('/');
    }

    public function hospital($slug = null)
    {
        if (!$slug) {
            return redirect()->to('/');
        }

        $tenantModel = new TenantModel();
        $tenant      = $tenantModel->where('slug', $slug)->first();

        if (!$tenant || $tenant['status'] !== 'active') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Hospital website not found.");
        }

        $doctorModel = new DoctorModel();
        $doctors     = $doctorModel->where('tenant_id', $tenant['id'])->findAll();

        // Group doctor counts by department
        $departmentCounts = [];
        foreach ($doctors as $doc) {
            $dept = $doc['department'] ?? 'General Medicine';
            if (!isset($departmentCounts[$dept])) {
                $departmentCounts[$dept] = 0;
            }
            $departmentCounts[$dept]++;
        }

        $allDepartments = [
            'Cardiology' => [
                'bn' => 'হৃদরোগ বিভাগ',
                'desc' => 'Heart diagnostics, ECG, Echocardiogram, and CCU care unit.',
                'icon' => 'bi-heart-pulse-fill',
                'color' => '#ef4444',
                'bg' => '#fef2f2',
                'rooms' => 'Room 301 - 305'
            ],
            'Neurology' => [
                'bn' => 'নিউরোমেডিসিন',
                'desc' => 'Brain, spine and neurological disorders specialist OPD.',
                'icon' => 'bi-cpu-fill',
                'color' => '#0284c7',
                'bg' => '#f0f9ff',
                'rooms' => 'Room 401 - 403'
            ],
            'Orthopedics' => [
                'bn' => 'অস্থিরোগ ও ট্রমা',
                'desc' => 'Bone fracture, joint replacement and physical rehabilitation care.',
                'icon' => 'bi-bandaid-fill',
                'color' => '#d97706',
                'bg' => '#fffbeb',
                'rooms' => 'Room 201 - 204'
            ],
            'Pediatrics' => [
                'bn' => 'শিশু রোগ বিভাগ',
                'desc' => 'Childcare, neonatal ICU & pediatric health consultations.',
                'icon' => 'bi-emoji-smile-fill',
                'color' => '#10b981',
                'bg' => '#ecfdf5',
                'rooms' => 'Room 105 - 108'
            ],
            'Gynecology & Obstetrics' => [
                'bn' => 'স্ত্রী ও প্রসূতি বিভাগ',
                'desc' => 'Maternity care, ante-natal checkups and delivery unit.',
                'icon' => 'bi-gender-female',
                'color' => '#ec4899',
                'bg' => '#fdf2f8',
                'rooms' => 'Room 501 - 506'
            ],
            'General Surgery' => [
                'bn' => 'সার্জারি বিভাগ',
                'desc' => 'Laparoscopic surgery, general surgery, and operation theatre.',
                'icon' => 'bi-scissors',
                'color' => '#8b5cf6',
                'bg' => '#f5f3ff',
                'rooms' => 'Room 205 - 208'
            ],
        ];

        $data = [
            'tenant'           => $tenant,
            'doctors'          => $doctors,
            'allDepartments'   => $allDepartments,
            'departmentCounts' => $departmentCounts,
        ];

        return view('frontend/hospital_public', $data);
    }
}
