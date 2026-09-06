<?php

namespace App\Controllers;

use App\Models\TenantModel;
use App\Models\UserModel;
use App\Models\PatientModel;
use App\Models\AppointmentModel;

class SuperAdmin extends BaseController
{
    public function index()
    {
        $tenantModel      = new TenantModel();
        $userModel        = new UserModel();
        $patientModel     = new PatientModel();
        $appointmentModel = new AppointmentModel();

        $data = [
            'total_tenants'      => $tenantModel->countAllResults(),
            'active_tenants'     => $tenantModel->where('status', 'active')->countAllResults(),
            'total_users'        => $userModel->countAllResults(),
            'total_patients'     => $patientModel->countAllResults(),
            'total_appointments' => $appointmentModel->countAllResults(),
            'tenants'            => $tenantModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('superadmin/dashboard', $data);
    }

    public function tenants()
    {
        $tenantModel = new TenantModel();
        $data['tenants'] = $tenantModel->orderBy('created_at', 'DESC')->findAll();
        return view('superadmin/tenants', $data);
    }

    public function loginAsTenant($id)
    {
        $tenantModel = new TenantModel();
        $tenant      = $tenantModel->find($id);

        if (!$tenant) {
            return redirect()->back()->with('error', 'Tenant not found.');
        }

        if ($tenant['status'] !== 'active') {
            return redirect()->back()->with('error', 'Cannot login to an inactive tenant.');
        }

        $userModel = new UserModel();
        $hospitalAdmin = $userModel->where('tenant_id', $id)
                                   ->where('role', 'hospital_admin')
                                   ->first();

        if (!$hospitalAdmin) {
            $hospitalAdmin = $userModel->where('tenant_id', $id)->first();
        }

        // Set impersonated session
        session()->set([
            'user_id'        => $hospitalAdmin['id'] ?? null,
            'user_name'      => $hospitalAdmin['name'] ?? 'Hospital Admin',
            'user_email'     => $hospitalAdmin['email'] ?? $tenant['email'],
            'user_role'      => 'hospital_admin',
            'tenant_id'      => $tenant['id'],
            'tenant_name'    => $tenant['name'],
            'isLoggedIn'     => true,
            'isImpersonated' => true,
        ]);

        return redirect()->to('hospital/dashboard')->with('success', "Switched into hospital environment: {$tenant['name']}");
    }

    public function returnToSuperAdmin()
    {
        session()->set([
            'user_id'        => 1,
            'user_name'      => 'Super System Admin',
            'user_email'     => 'admin@saas.com',
            'user_role'      => 'superadmin',
            'tenant_id'      => null,
            'tenant_name'    => 'SaaS Platform',
            'isLoggedIn'     => true,
            'isImpersonated' => false,
        ]);

        return redirect()->to('superadmin')->with('success', 'Returned to Super Admin Control Center.');
    }

    public function users()
    {
        $userModel = new UserModel();
        $db        = \Config\Database::connect();

        $data['users'] = $db->table('users')
                            ->select('users.*, tenants.name as hospital_name')
                            ->join('tenants', 'tenants.id = users.tenant_id', 'left')
                            ->orderBy('users.created_at', 'DESC')
                            ->get()
                            ->getResultArray();

        return view('superadmin/users', $data);
    }

    public function plans()
    {
        $tenantModel = new TenantModel();

        $data['standard_count']   = $tenantModel->where('package', 'standard')->countAllResults();
        $data['premium_count']    = $tenantModel->where('package', 'premium')->countAllResults();
        $data['enterprise_count'] = $tenantModel->where('package', 'enterprise')->countAllResults();

        return view('superadmin/plans', $data);
    }

    public function analytics()
    {
        $tenantModel      = new TenantModel();
        $userModel        = new UserModel();
        $patientModel     = new PatientModel();
        $appointmentModel = new AppointmentModel();

        $data = [
            'total_tenants'      => $tenantModel->countAllResults(),
            'total_users'        => $userModel->countAllResults(),
            'total_patients'     => $patientModel->countAllResults(),
            'total_appointments' => $appointmentModel->countAllResults(),
            'monthly_revenue'    => 49990.00,
        ];

        return view('superadmin/analytics', $data);
    }

    public function settings()
    {
        return view('superadmin/settings');
    }

    public function toggleTenantStatus($id)
    {
        $db     = \Config\Database::connect();
        $tenant = $db->table('tenants')->where('id', $id)->get()->getRowArray();

        if ($tenant) {
            $newStatus = ($tenant['status'] === 'active') ? 'inactive' : 'active';
            $db->table('tenants')->where('id', $id)->update([
                'status'     => $newStatus,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->to('superadmin/tenants')->with('success', "Hospital status changed to {$newStatus}.");
        }

        return redirect()->to('superadmin/tenants');
    }

    public function approveSlug($id)
    {
        $tenantModel = new TenantModel();
        $tenant      = $tenantModel->find($id);

        if ($tenant && !empty($tenant['pending_slug'])) {
            $newSlug = $tenant['pending_slug'];
            // Ensure unique
            $existing = (new TenantModel())->where('slug', $newSlug)->where('id !=', $id)->first();
            if ($existing) {
                return redirect()->to('superadmin/tenants')->with('error', "Cannot approve: Slug '{$newSlug}' is already taken by another hospital.");
            }

            (new TenantModel())->update($id, [
                'slug'         => $newSlug,
                'pending_slug' => null,
            ]);

            return redirect()->to('superadmin/tenants')->with('success', "Website URL slug '{$newSlug}' approved for {$tenant['name']}!");
        }

        return redirect()->to('superadmin/tenants');
    }

    public function updateSlug($id)
    {
        if ($this->request->getMethod() === 'POST') {
            $newSlug = strtolower(url_title(trim($this->request->getPost('slug')), '-', true));

            if (!$newSlug) {
                return redirect()->to('superadmin/tenants')->with('error', 'Please provide a valid slug.');
            }

            $existing = (new TenantModel())->where('slug', $newSlug)->where('id !=', $id)->first();
            if ($existing) {
                return redirect()->to('superadmin/tenants')->with('error', "Slug '{$newSlug}' is already assigned to another hospital.");
            }

            (new TenantModel())->update($id, [
                'slug'         => $newSlug,
                'pending_slug' => null,
            ]);

            return redirect()->to('superadmin/tenants')->with('success', "Website URL slug updated to '{$newSlug}'.");
        }

        return redirect()->to('superadmin/tenants');
    }

    public function approveDomain($id)
    {
        $tenantModel = new TenantModel();
        $tenant      = $tenantModel->find($id);

        if ($tenant && !empty($tenant['pending_custom_domain'])) {
            $newDomain = $tenant['pending_custom_domain'];
            // Ensure unique
            $existing = (new TenantModel())->where('custom_domain', $newDomain)->where('id !=', $id)->first();
            if ($existing) {
                return redirect()->to('superadmin/tenants')->with('error', "Cannot approve: Custom domain '{$newDomain}' is already bound to another hospital.");
            }

            (new TenantModel())->update($id, [
                'custom_domain'         => $newDomain,
                'pending_custom_domain' => null,
            ]);

            return redirect()->to('superadmin/tenants')->with('success', "Custom domain '{$newDomain}' approved for {$tenant['name']}!");
        }

        return redirect()->to('superadmin/tenants');
    }

    public function updateDomain($id)
    {
        if ($this->request->getMethod() === 'POST') {
            $rawDomain   = trim($this->request->getPost('custom_domain'));
            $newDomain   = strtolower(preg_replace('/^https?:\/\//', '', $rawDomain));
            $newDomain   = rtrim($newDomain, '/');

            if (!$newDomain) {
                // Clear domain if empty
                (new TenantModel())->update($id, [
                    'custom_domain'         => null,
                    'pending_custom_domain' => null,
                ]);
                return redirect()->to('superadmin/tenants')->with('success', "Custom domain cleared for hospital.");
            }

            $existing = (new TenantModel())->where('custom_domain', $newDomain)->where('id !=', $id)->first();
            if ($existing) {
                return redirect()->to('superadmin/tenants')->with('error', "Domain '{$newDomain}' is already bound to another hospital.");
            }

            (new TenantModel())->update($id, [
                'custom_domain'         => $newDomain,
                'pending_custom_domain' => null,
            ]);

            return redirect()->to('superadmin/tenants')->with('success', "Custom domain updated to '{$newDomain}'.");
        }

        return redirect()->to('superadmin/tenants');
    }

    public function deleteTenant($id)
    {
        $tenantModel = new TenantModel();
        $tenant      = $tenantModel->find($id);

        if ($tenant) {
            $tenantModel->delete($id);
            return redirect()->to('superadmin/tenants')->with('success', "Hospital '{$tenant['name']}' deleted from system.");
        }

        return redirect()->to('superadmin/tenants');
    }
}
