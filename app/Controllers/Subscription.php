<?php

namespace App\Controllers;

use App\Models\TenantModel;

class Subscription extends BaseController
{
    public function index()
    {
        $tenantModel = new TenantModel();
        $tenantId    = session()->get('tenant_id');

        $tenant = $tenantModel->find($tenantId);

        $data = [
            'tenant' => $tenant,
        ];

        return view('subscription/index', $data);
    }

    public function upgrade()
    {
        if ($this->request->getMethod() === 'POST') {
            $tenantModel = new TenantModel();
            $tenantId    = session()->get('tenant_id');
            $newPlan     = $this->request->getPost('package');

            $tenantModel->update($tenantId, [
                'package' => $newPlan,
            ]);

            return redirect()->to('subscription')->with('success', "Hospital subscription plan upgraded to " . strtoupper($newPlan) . "!");
        }

        return redirect()->to('subscription');
    }
}
