<?php

namespace App\Controllers;

use App\Models\Employee;
use CodeIgniter\HTTP\RedirectResponse;

class EmployeeController extends BaseController
{
    
    public function index(): string
    {
        $employee = new Employee();
        $data['employees'] = $employee->findAll();
        return view('employee/index', $data);
    }

    public function addEmployee(): string {
        return view('employee/addEmployee');
    }

    public function createEmployee(): RedirectResponse {
        $employee = new Employee();
        $formData = [
            'first_name' => $this->request->getPost('firstName'),
            'last_name' => $this->request->getPost('lastName'),
            'contact_num' => $this->request->getPost('contactNum'),
            'email' => $this->request->getPost('email'),
            'employee_role' => $this->request->getPost('employeeRole')
        ];

        $employee->save($formData);

        return redirect()->to(base_url('employee'))->with('success', 'Employee added successfully.');
    }

    public function editEmployee($id) {
        $employee = new Employee();
        $data['employee'] = $employee->find($id);

        return view('employee/editEmployee', $data);
    }

    public function updateEmployee($id) {
        $employee = new Employee();
        $employee->find($id);
        $formData = [
            'first_name' => $this->request->getPost('firstName'),
            'last_name' => $this->request->getPost('lastName'),
            'contact_num' => $this->request->getPost('contactNum'),
            'email' => $this->request->getPost('email'),
            'employee_role' => $this->request->getPost('employeeRole')
        ];
        $employee->update($id, $formData);
        return redirect()->to(base_url('employee'))->with('success', 'Employee updated successfully.');

    }

    public function deleteEmployee($id) {
        $employee = new Employee();
        $employee->delete($id);

        return redirect()->to(base_url('employee'))->with('success', 'Employee deleted successfully.');
    }
}
