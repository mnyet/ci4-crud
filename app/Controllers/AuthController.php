<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UserModel;

class AuthController extends BaseController
{

    protected $user;

    public function __construct()
    {
        helper(['url', 'form', 'Form']);
        $this->user = new UserModel();
    }

    public function index() // If url goes to '/'
    {
        if(session()->get('isLoggedIn')){
            return redirect()->to(base_url(relativePath: 'employee'));
        } else {
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginUser()
    {
        $validation = $this->validate([
            'loginEmail' => [
                'rules' => 'required|valid_email|is_not_unique[' . $this->user->table . '.email]',
                'errors' => [
                    'required' => 'Please fill up this field.',
                    'valid_email' => 'Please enter a valid email address.',
                    'is_not_unique' => 'This email is not registered.'
                ]
            ],

            'loginPassword' => [
                'rules' => 'required|max_length[20]|min_length[5]',
                'errors' => [
                    'required' => 'Please fill up this field.',
                    'min_length' => 'Please enter at least 5 characters long.',
                    'max_length' => 'Please enter within 20 characters long.'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $loginData = [
                'email' => $this->request->getPost('loginEmail'),
                'password' => $this->request->getPost('loginPassword')
            ];

            $userData = $this->user->findUserByEmail($loginData['email']);

            if (Hash::checkPassword($loginData['password'], $userData['password'])) {
                session()->set('isLoggedIn', true);
                session()->set('userId', $userData['id']);
                session()->set('userName', $userData['name']);

                return redirect()->to(base_url('employee'))->with('success', 'Logged in successfully.');
            } else {
                return redirect()->to(base_url('auth/login'))->with('error', 'Credentials does not match.');
            }
        }
    }

    public function signup()
    {
        return view('auth/signup');
    }

    public function createUser()
    {
        $validation = $this->validate([
            'signupName' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Please fill up this field.',
                    'min_length' => 'Please enter at least 3 characters long.'
                ]
            ],

            'signupEmail' => [
                'rules' => 'required|valid_email|is_unique[' . $this->user->table . '.email]', // [(table_name).(field to verify)]
                'errors' => [
                    'required' => 'Please fill up this field.',
                    'valid_email' => 'Please enter a valid email address.',
                    'is_unique' => 'Email already exists.'
                ]
            ],

            'signupPassword' => [
                'rules' => 'required|max_length[20]|min_length[5]',
                'errors' => [
                    'required' => 'Please fill up this field.',
                    'min_length' => 'Please enter at least 5 characters long.',
                    'max_length' => 'Please enter within 20 characters long.'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/signup', ['validation' => $this->validator]);
        } else {

            $signupData = [
                'name' => $this->request->getPost('signupName'),
                'email' => $this->request->getPost('signupEmail'),
                'password' => Hash::make($this->request->getPost('signupPassword'))
            ];

            if ($this->user->createNewUser($signupData)) {
                $userData = $this->user->findUserByEmail($signupData['email']);

                session()->set('isLoggedIn', true);
                session()->set('userId', $userData['id']);
                session()->set('userName', $userData['name']);

                return redirect()->to(base_url('employee'))->with('success', 'User created successfully.');
            } else {
                return redirect()->to(base_url('auth/signup'))->with('error', 'Something wrong happened.');
            }
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('auth/login'))->with('success', 'Successfully logged out.');
    }
}
