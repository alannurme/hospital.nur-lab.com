<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class DoctorAccessFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('user_role');

        if ($role === 'doctor') {
            $path = trim(uri_string(), '/');

            // If doctor hits hospital root or dashboard, redirect to doctor panel
            if ($path === 'hospital' || $path === 'hospital/dashboard' || $path === '') {
                return redirect()->to(base_url('hospital/panel/doctor'));
            }

            // Allowed path prefixes for Doctor role
            $allowedPrefixes = [
                'hospital/panel/doctor',
                'hospital/appointments',
                'hospital/patients',
                'hospital/lab-reports',
                'hospital/telemedicine',
                'hospital/doctors/return-admin',
                'logout',
            ];

            $isAllowed = false;
            foreach ($allowedPrefixes as $allowed) {
                if ($path === $allowed || strpos($path, $allowed . '/') === 0) {
                    $isAllowed = true;
                    break;
                }
            }

            if (!$isAllowed) {
                return redirect()->to(base_url('hospital/panel/doctor'))
                                 ->with('error', 'Access Denied: As a doctor, you only have access to Doctor Workstation modules.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
