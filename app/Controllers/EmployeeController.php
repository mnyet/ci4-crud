<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            $employee = new EmployeeModel();
            $data['employees'] = $employee->findAllEmployees();
            return view('employee/index', $data);
        } else {
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function addEmployee(): string
    {
        return view('employee/addEmployee');
    }

    public function createEmployee()
    {
        $employee = new EmployeeModel();
        $formData = [
            'first_name' => $this->request->getPost('firstName'),
            'last_name' => $this->request->getPost('lastName'),
            'contact_num' => $this->request->getPost('contactNum'),
            'email' => $this->request->getPost('email'),
            'employee_role' => $this->request->getPost('employeeRole')
        ];


        if ($employee->createEmployeeProced($formData)) {
            return redirect()->to(base_url('employee'))->with('success', 'Employee added successfully.');
        } else {
            return redirect()->to(base_url('employee'))->with('error', 'Something wrong happened.');
        }
    }

    public function editEmployee($id)
    {
        $employee = new EmployeeModel();
        $data['employee'] = $employee->findEmployeeById($id);

        if ($data['employee']) {
            return view('employee/editEmployee', $data);
        } else {
            return redirect()->to(base_url('employee'))->with('error', 'Employee not found.');
        }
    }

    public function updateEmployee($id)
    {
        $employee = new EmployeeModel();
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

    public function deleteEmployee($id)
    {
        $employee = new EmployeeModel();
        $employee->delete($id);

        return redirect()->to(base_url('employee'))->with('error', 'Employee deleted successfully.');
    }
}
