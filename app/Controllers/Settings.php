<?php

namespace App\Controllers;

use App\Models\TenantModel;

class Settings extends BaseController
{
    public function index()
    {
        $tenantModel = new TenantModel();
        $tenantId    = session()->get('tenant_id');

        $tenant = $tenantModel->find($tenantId);
        if (!$tenant) {
            $tenant = [
                'slug' => '',
                'pending_slug' => null,
                'name' => session()->get('tenant_name') ?? 'Hospital Tenant',
                'phone' => '',
                'email' => '',
                'address' => ''
            ];
        } else {
            $tenant['slug'] = $tenant['slug'] ?? '';
            $tenant['pending_slug'] = $tenant['pending_slug'] ?? null;
            $tenant['name'] = $tenant['name'] ?? '';
            $tenant['phone'] = $tenant['phone'] ?? '';
            $tenant['email'] = $tenant['email'] ?? '';
            $tenant['address'] = $tenant['address'] ?? '';
        }

        $data['tenant'] = $tenant;
        return view('settings/index', $data);
    }

    public function update()
    {
        if ($this->request->getMethod() === 'POST') {
            $tenantModel = new TenantModel();
            $tenantId    = session()->get('tenant_id');
            $tenant      = $tenantModel->find($tenantId);

            $requestedSlug = strtolower(url_title(trim($this->request->getPost('slug')), '-', true));
            $msg           = 'Hospital profile settings updated successfully.';

            // Check if slug change is requested
            if ($requestedSlug && $requestedSlug !== $tenant['slug']) {
                // Check if already taken
                $existing = $tenantModel->where('slug', $requestedSlug)->where('id !=', $tenantId)->first();
                if ($existing) {
                    return redirect()->to('hospital/settings')->with('error', "Website URL slug '{$requestedSlug}' is already in use by another hospital.");
                }

                $tenantModel->update($tenantId, [
                    'pending_slug' => $requestedSlug,
                ]);
                $msg .= " URL Change Request for '{$requestedSlug}' submitted to Super Admin for approval.";
            }

            $tenantModel->update($tenantId, [
                'name'          => $this->request->getPost('name'),
                'phone'         => $this->request->getPost('phone'),
                'email'         => $this->request->getPost('email'),
                'address'       => $this->request->getPost('address'),
                'notice_ticker' => $this->request->getPost('notice_ticker'),
                'opd_hours'     => $this->request->getPost('opd_hours'),
            ]);

            session()->set('tenant_name', $this->request->getPost('name'));

            return redirect()->to('hospital/settings')->with('success', $msg);
        }

        return redirect()->to('hospital/settings');
    }

    public function customUrl()
    {
        $tenantModel = new TenantModel();
        $tenantId    = session()->get('tenant_id');

        $tenant = $tenantModel->find($tenantId);
        if (!$tenant) {
            $tenant = [
                'slug' => '',
                'pending_slug' => null,
                'custom_domain' => null,
                'pending_custom_domain' => null,
                'name' => session()->get('tenant_name') ?? 'Hospital Tenant',
            ];
        } else {
            $tenant['slug']                  = $tenant['slug'] ?? '';
            $tenant['pending_slug']          = $tenant['pending_slug'] ?? null;
            $tenant['custom_domain']         = $tenant['custom_domain'] ?? null;
            $tenant['pending_custom_domain'] = $tenant['pending_custom_domain'] ?? null;
        }

        $data['tenant'] = $tenant;
        return view('settings/custom_url', $data);
    }

    public function updateSlug()
    {
        if ($this->request->getMethod() === 'POST') {
            $tenantModel = new TenantModel();
            $tenantId    = session()->get('tenant_id');

            if (!$tenantId) {
                return redirect()->to('hospital/settings/custom-url')->with('error', 'Hospital session not found.');
            }

            $tenant = $tenantModel->find($tenantId);
            $requestedSlug = strtolower(url_title(trim($this->request->getPost('slug')), '-', true));

            if (!$requestedSlug) {
                return redirect()->to('hospital/settings/custom-url')->with('error', 'Please provide a valid URL slug.');
            }

            if ($requestedSlug === ($tenant['slug'] ?? '')) {
                return redirect()->to('hospital/settings/custom-url')->with('success', 'This is already your active URL slug.');
            }

            // Check if already taken
            $existing = (new TenantModel())->where('slug', $requestedSlug)->where('id !=', $tenantId)->first();
            if ($existing) {
                return redirect()->to('hospital/settings/custom-url')->with('error', "Website URL slug '{$requestedSlug}' is already in use by another hospital.");
            }

            (new TenantModel())->update($tenantId, [
                'pending_slug' => $requestedSlug,
            ]);

            return redirect()->to('hospital/settings/custom-url')->with('success', "URL Change Request for '{$requestedSlug}' submitted to Super Admin for approval.");
        }

        return redirect()->to('hospital/settings/custom-url');
    }

    public function updateDomain()
    {
        if ($this->request->getMethod() === 'POST') {
            $tenantModel = new TenantModel();
            $tenantId    = session()->get('tenant_id');

            if (!$tenantId) {
                return redirect()->to('hospital/settings/custom-url')->with('error', 'Hospital session not found.');
            }

            $tenant = $tenantModel->find($tenantId);
            $rawDomain = trim($this->request->getPost('custom_domain'));
            $requestedDomain = strtolower(preg_replace('/^https?:\/\//', '', $rawDomain));
            $requestedDomain = rtrim($requestedDomain, '/');

            if (!$requestedDomain) {
                return redirect()->to('hospital/settings/custom-url')->with('error', 'Please provide a valid custom domain name.');
            }

            if ($requestedDomain === ($tenant['custom_domain'] ?? '')) {
                return redirect()->to('hospital/settings/custom-url')->with('success', 'This is already your active custom domain.');
            }

            // Check if already taken
            $existing = (new TenantModel())->where('custom_domain', $requestedDomain)->where('id !=', $tenantId)->first();
            if ($existing) {
                return redirect()->to('hospital/settings/custom-url')->with('error', "Custom domain '{$requestedDomain}' is already bound to another hospital.");
            }

            (new TenantModel())->update($tenantId, [
                'pending_custom_domain' => $requestedDomain,
            ]);

            return redirect()->to('hospital/settings/custom-url')->with('success', "Custom Domain Request for '{$requestedDomain}' submitted to Super Admin for approval.");
        }

        return redirect()->to('hospital/settings/custom-url');
    }
}
