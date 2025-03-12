<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    protected $employee;

    public function __construct()
    {
        helper(['url', 'Form']);
        $this->employee = new EmployeeModel();
    }

    public function index()
    {
        $data['employees'] = $this->employee->findAllEmployees();
        return view('employee/index', $data);
    }

    public function addEmployee(): string
    {
        return view('employee/addEmployee');
    }

    public function createEmployee()
    {
        $validation = $this->validate([
            'firstName' => [
                'rules' => 'required|min_length[5]|max_length[45]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'min_length' => 'Please enter at least 5 characters long.',
                    'max_length' => 'Please enter within 45 characters long.'
                ]
            ],
            'lastName' => [
                'rules' => 'required|min_length[5]|max_length[45]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'min_length' => 'Please enter at least 5 characters long.',
                    'max_length' => 'Please enter within 45 characters long.'
                ]
            ],
            'contactNum' => [
                'rules' => 'required|numeric|min_length[7]|max_length[11]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'numeric' => 'Please enter only numbers.',
                    'min_length' => 'Please enter at least 7 numbers long.',
                    'max_length' => 'Please enter within 11 numbers long.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique['. $this->employee->table .'.email]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'valid_email' => 'Please enter a valid email address.',
                    'is_unique' => 'Email is already taken. Please try another email address'
                ]
            ],
            'employeeRole' => [
                'rules' => 'required|min_length[5]|max_length[45]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'min_length' => 'Please enter at least 5 characters long.',
                    'max_length' => 'Please enter within 45 characters long.'
                ]
            ]
        ]);

        if (!$validation) {
            return view('employee/addEmployee', ['validation' => $this->validator]);
        } else {
            $formData = [
                'first_name' => $this->request->getPost('firstName'),
                'last_name' => $this->request->getPost('lastName'),
                'contact_num' => $this->request->getPost('contactNum'),
                'email' => $this->request->getPost('email'),
                'employee_role' => $this->request->getPost('employeeRole')
            ];
    
    
            if ($this->employee->createEmployeeProced($formData)) {
                return redirect()->to(base_url('employee'))->with('success', 'Employee added successfully.');
            } else {
                return redirect()->to(base_url('employee'))->with('error', 'Something wrong happened.');
            }
        }
    }

    public function editEmployee($id)
    {
        $data['employee'] = $this->employee->findEmployeeById($id);

        if ($data['employee']) {
            return view('employee/editEmployee', $data);
        } else {
            return redirect()->to(base_url('employee'))->with('error', 'Employee not found.');
        }
    }

    public function updateEmployee($id)
    {
        $employeeData = $this->employee->findEmployeeById($id);

        $validation = $this->validate([
            'firstName' => [
                'rules' => 'required|min_length[5]|max_length[45]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'min_length' => 'Please enter at least 5 characters long.',
                    'max_length' => 'Please enter within 45 characters long.'
                ]
            ],
            'lastName' => [
                'rules' => 'required|min_length[5]|max_length[45]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'min_length' => 'Please enter at least 5 characters long.',
                    'max_length' => 'Please enter within 45 characters long.'
                ]
            ],
            'contactNum' => [
                'rules' => 'required|numeric|min_length[7]|max_length[11]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'numeric' => 'Please enter only numbers.',
                    'min_length' => 'Please enter at least 7 numbers long.',
                    'max_length' => 'Please enter within 11 numbers long.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email'. ($employeeData['email'] == $this->request->getPost('email') ? '' : '|is_unique['. $this->employee->table .'.email]'),
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'valid_email' => 'Please enter a valid email address.',
                    'is_unique' => 'Email is already taken. Please try another email address'
                ]
            ],
            'employeeRole' => [
                'rules' => 'required|min_length[5]|max_length[45]',
                'errors' => [
                    'required' => 'Please do not leave the field blank.',
                    'min_length' => 'Please enter at least 5 characters long.',
                    'max_length' => 'Please enter within 45 characters long.'
                ]
            ]
        ]);

        if (!$validation) {
            //return view('employee/editEmployee', ['validation' => $this->validator]);
            return redirect()->to(base_url('employee/edit/'. $id))->withInput()->with('validation', $this->validator);
        } else {
            $formData = [
                'first_name' => $this->request->getPost('firstName'),
                'last_name' => $this->request->getPost('lastName'),
                'contact_num' => $this->request->getPost('contactNum'),
                'email' => $this->request->getPost('email'),
                'employee_role' => $this->request->getPost('employeeRole')
            ];
            $this->employee->update($id, $formData);
            return redirect()->to(base_url('employee'))->with('success', 'Employee updated successfully.');
        }

    }

    public function deleteEmployee($id)
    {
        $deleteUser = $this->employee->findEmployeeById($id);

        if ($deleteUser) {
            $this->employee->delete($deleteUser['id']);
            return redirect()->back()->with('error', 'Employee deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Employee cannot be deleted as it does not exist.');
        }

    }
}
