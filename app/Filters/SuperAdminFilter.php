<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SuperAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // If user was impersonating a tenant and navigates back to superadmin, restore superadmin session automatically!
        if (session()->get('isImpersonated')) {
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
            return;
        }

        if (session()->get('user_role') !== 'superadmin') {
            return redirect()->to(base_url('dashboard'))->with('error', 'Access denied. Super Admin privileges required.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
