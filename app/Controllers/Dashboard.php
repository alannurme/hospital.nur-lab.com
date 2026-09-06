<?php

namespace App\Controllers;

use App\Models\PatientModel;
use App\Models\DoctorModel;
use App\Models\AppointmentModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $patientModel     = new PatientModel();
        $doctorModel      = new DoctorModel();
        $appointmentModel = new AppointmentModel();

        $labReportModel   = new \App\Models\LabReportModel();
        $invoiceModel     = new \App\Models\InvoiceModel();
        $pharmacyModel    = new \App\Models\PharmacyModel();

        if (session()->get('user_role') === 'doctor') {
            return redirect()->to('hospital/panel/doctor');
        }

        $invoices = $invoiceModel->forTenant()->findAll();
        $totalRevenue = 0;
        $pendingRevenue = 0;
        foreach ($invoices as $inv) {
            $totalRevenue += (float)($inv['paid_amount'] ?? 0);
            $pendingRevenue += ((float)($inv['total_amount'] ?? 0) - (float)($inv['paid_amount'] ?? 0));
        }

        $data = [
            'total_patients'     => $patientModel->forTenant()->countAllResults(),
            'total_doctors'      => $doctorModel->forTenant()->countAllResults(),
            'total_appointments' => $appointmentModel->forTenant()->countAllResults(),
            'recent_appointments'=> $appointmentModel->getAppointmentsWithDetails(),
            'total_lab_reports'  => $labReportModel->forTenant()->countAllResults(),
            'recent_lab_reports' => $labReportModel->forTenant()->orderBy('id', 'DESC')->findAll(5),
            'total_invoices'     => $invoiceModel->forTenant()->countAllResults(),
            'recent_invoices'    => $invoiceModel->getInvoicesWithPatient(),
            'total_pharmacy'     => $pharmacyModel->forTenant()->countAllResults(),
            'active_doctors'     => $doctorModel->forTenant()->findAll(4),
            'total_revenue'      => $totalRevenue,
            'pending_revenue'    => max(0, $pendingRevenue),
        ];

        return view('dashboard', $data);
    }
}
