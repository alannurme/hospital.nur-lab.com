<?php

namespace App\Controllers;

use App\Models\PharmacyModel;

class Pharmacy extends BaseController
{
    public function index()
    {
        $pharmacyModel = new PharmacyModel();
        $data['items'] = $pharmacyModel->forTenant()->orderBy('created_at', 'DESC')->findAll();
        return view('pharmacy/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            $pharmacyModel = new PharmacyModel();

            $pharmacyModel->insert([
                'item_name'  => $this->request->getPost('item_name'),
                'category'   => $this->request->getPost('category'),
                'stock_qty'  => $this->request->getPost('stock_qty'),
                'unit_price' => $this->request->getPost('unit_price'),
            ]);

            return redirect()->to('pharmacy')->with('success', 'Medicine item added to inventory.');
        }

        return redirect()->to('pharmacy');
    }
}
