<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public routes
$routes->get('/', 'Home::index');
$routes->get('h', 'Home::hospitalIndex');
$routes->get('h/(:segment)', 'Home::hospital/$1');
$routes->get('hospital-site/(:segment)', 'Home::hospital/$1');
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->match(['get', 'post'], 'register-hospital', 'Auth::registerHospital');
$routes->get('logout', 'Auth::logout');

// Super Admin Protected Routes
$routes->group('superadmin', ['filter' => ['auth', 'superadmin']], function ($routes) {
    $routes->get('/', 'SuperAdmin::index');
    $routes->get('tenants', 'SuperAdmin::tenants');
    $routes->get('users', 'SuperAdmin::users');
    $routes->get('plans', 'SuperAdmin::plans');
    $routes->get('analytics', 'SuperAdmin::analytics');
    $routes->get('settings', 'SuperAdmin::settings');
    $routes->get('return', 'SuperAdmin::returnToSuperAdmin');
    $routes->get('login-as-tenant/(:num)', 'SuperAdmin::loginAsTenant/$1');
    $routes->get('tenant-toggle/(:num)', 'SuperAdmin::toggleTenantStatus/$1');
    $routes->get('tenant-approve-slug/(:num)', 'SuperAdmin::approveSlug/$1');
    $routes->post('tenant-update-slug/(:num)', 'SuperAdmin::updateSlug/$1');
    $routes->get('tenant-approve-domain/(:num)', 'SuperAdmin::approveDomain/$1');
    $routes->post('tenant-update-domain/(:num)', 'SuperAdmin::updateDomain/$1');
    $routes->get('tenant-delete/(:num)', 'SuperAdmin::deleteTenant/$1');
});

// Tenant Protected Routes
$routes->group('hospital', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    // Medical Departments
    $routes->get('departments', 'Departments::index');

    // Patients
    $routes->get('patients', 'Patients::index');
    $routes->match(['get', 'post'], 'patients/create', 'Patients::create');

    // Doctors
    $routes->get('doctors', 'Doctors::index');
    $routes->match(['get', 'post'], 'doctors/create', 'Doctors::create');
    $routes->match(['get', 'post'], 'doctors/edit/(:num)', 'Doctors::edit/$1');
    $routes->get('doctors/delete/(:num)', 'Doctors::delete/$1');
    $routes->get('doctors/login-as/(:num)', 'Doctors::loginAs/$1');
    $routes->get('doctors/return-admin', 'Doctors::returnToAdmin');

    // Hospital Staff & Duty Shifts
    $routes->get('staff', 'Staff::index');
    $routes->post('staff/create', 'Staff::create');
    $routes->get('staff/shifts', 'Staff::shifts');
    $routes->post('staff/shifts/update', 'Staff::updateShift');
    $routes->get('appointments', 'Appointments::index');
    $routes->post('appointments/create', 'Appointments::create');

    // Lab Reports
    $routes->get('lab-reports', 'LabReports::index');
    $routes->post('lab-reports/create', 'LabReports::create');

    // Invoices & Billing
    $routes->get('billing', 'Billing::index');
    $routes->post('billing/create', 'Billing::create');

    // Pharmacy
    $routes->get('pharmacy', 'Pharmacy::index');
    $routes->post('pharmacy/create', 'Pharmacy::create');

    // Emergency & ICU
    $routes->get('emergency', function() { return view('emergency/index'); });

    // Bed & Ward Management
    $routes->get('beds', function() { return view('beds/index'); });

    // Radiology & Imaging
    $routes->get('radiology', function() { return view('radiology/index'); });

    // Blood Bank
    $routes->get('blood-bank', function() { return view('blood_bank/index'); });

    // Ambulance Service
    $routes->get('ambulance', function() { return view('ambulance/index'); });

    // Human Resources & Payroll
    $routes->get('hr-payroll', 'HrPayroll::index');
    $routes->post('hr-payroll/process', 'HrPayroll::processSalary');

    // Operation Theatre (OT)
    $routes->get('ot-schedules', function() { return view('ot/index'); });

    // Telemedicine
    $routes->get('telemedicine', function() { return view('telemedicine/index'); });

    // Inventory & Supplies
    $routes->get('inventory', function() { return view('inventory/index'); });

    // Organ Donation & Transplant
    $routes->get('organ-donation', function() { return view('organ_donation/index'); });

    // Vaccination Center
    $routes->get('vaccination', function() { return view('vaccination/index'); });

    // Birth & Death Records
    $routes->get('birth-death-records', function() { return view('birth_death/index'); });

    // Diabetic & Chronic Care
    $routes->get('diabetic-care', function() { return view('diabetic_care/index'); });

    // Physiotherapy & Rehab
    $routes->get('physiotherapy', function() { return view('physiotherapy/index'); });

    // Dietary & Canteen
    $routes->get('dietary', function() { return view('dietary/index'); });

    // Insurance & TPA Claims
    $routes->get('insurance', function() { return view('insurance/index'); });

    // Bio-Medical Waste Management
    $routes->get('waste-management', function() { return view('waste_mgmt/index'); });

    // Patient Feedback & Quality Assurance
    $routes->get('feedback', function() { return view('feedback/index'); });

    // Role-Based Specialized Portals & Workstations
    $routes->get('panel/doctor', 'Doctors::panel');
    $routes->get('panel/receptionist', function() { return view('panels/receptionist'); });
    $routes->get('panel/nurse', function() { return view('panels/nurse'); });
    $routes->get('panel/pathologist', function() { return view('panels/pathologist'); });
    $routes->get('panel/pharmacist', function() { return view('panels/pharmacist'); });
    $routes->get('panel/accountant', function() { return view('panels/accountant'); });

    // Reports & Analytics
    $routes->get('reports', function() { return view('reports/index'); });

    // Settings & Subscription
    $routes->get('subscription', 'Subscription::index');
    $routes->post('subscription/upgrade', 'Subscription::upgrade');
    $routes->get('settings', 'Settings::index');
    $routes->post('settings/update', 'Settings::update');
    $routes->get('settings/custom-url', 'Settings::customUrl');
    $routes->post('settings/update-slug', 'Settings::updateSlug');
    $routes->post('settings/update-domain', 'Settings::updateDomain');
});
