<?php

namespace App\Controllers;

use App\Models\DoctorModel;

class Departments extends BaseController
{
    public function index()
    {
        $doctorModel = new DoctorModel();

        // Fetch doctors registered under this tenant
        $doctors = $doctorModel->forTenant()->findAll();

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
                'icon' => 'bi-heart-pulse',
                'color' => 'primary',
                'rooms' => 'Room 301-305'
            ],
            'Neurology' => [
                'bn' => 'নিউরোমেডিসিন',
                'desc' => 'Brain, spine and neurological disorders specialist OPD.',
                'icon' => 'bi-cpu',
                'color' => 'info',
                'rooms' => 'Room 401-403'
            ],
            'Orthopedics' => [
                'bn' => 'অস্থিরোগ ও ট্রমা',
                'desc' => 'Bone fracture, joint replacement and physical rehabilitation care.',
                'icon' => 'bi-bandaid',
                'color' => 'warning',
                'rooms' => 'Room 201-204'
            ],
            'Pediatrics' => [
                'bn' => 'শিশু রোগ বিভাগ',
                'desc' => 'Childcare, neonatal ICU & pediatric health consultations.',
                'icon' => 'bi-emoji-smile',
                'color' => 'success',
                'rooms' => 'Room 105-108'
            ],
            'Gynecology & Obstetrics' => [
                'bn' => 'স্ত্রী ও প্রসূতি বিভাগ',
                'desc' => 'Maternity care, ante-natal checkups and delivery unit.',
                'icon' => 'bi-gender-female',
                'color' => 'danger',
                'rooms' => 'Room 501-506'
            ],
            'General Surgery' => [
                'bn' => 'সার্জারি বিভাগ',
                'desc' => 'General surgery, laparoscopy and wound care.',
                'icon' => 'bi-scissors',
                'color' => 'secondary',
                'rooms' => 'Room 205-208'
            ],
        ];

        $data = [
            'departmentCounts' => $departmentCounts,
            'allDepartments'   => $allDepartments,
            'totalDoctors'      => count($doctors),
        ];

        return view('departments/index', $data);
    }
}
