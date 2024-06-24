<?php

namespace App\Controllers;
use \App\Models\UserModel;

class Auth extends BaseController
{

    public function __construct() {
        helper(['url','form','session']);
    }

    public function show_view()
    {
        // if (session()->has("loggedInUser")){
        //     return redirect()->route("UserController::shop_view");
        // }
        return view('header')
        . view('login_page');
    }

    public function registerUser() {
        $validated = $this -> validate([
            'firstName'=>[
                'rules'=>'required|max_length[50]',
                'errors'=> [
                    'required'=> "First name is required",
                    'max_length'=>"First name must be at most 50 characters long"
                ]
            ],
            'lastName'=>[
                'rules'=>'required|max_length[50]',
                'errors'=> [
                    'required'=> "Last name is required",
                    'max_length'=>"Last name must be at most 50 characters long"
                ]
            ],
            'email'=>[
                'rules'=>'required|valid_email',
                'errors'=> [
                    'required'=> "Email is required",
                    'valid_email'=>"Email is already used"
                ]
            ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required'=> "Password is required",
                    'min_length'=>"Password must be at least 5 characters long",
                    'max_length'=>"Password must be at most 20 characters long"
                ]
            ],
            'passwordConf'=>[
                'rules'=>'required|min_length[5]|max_length[20]|matches[password]',
                'errors'=> [
                    'required'=> "Password is required",
                    'min_length'=>"Password must be at least 5 characters long",
                    'max_length'=>"Password must be at most 20 characters long",
                    'matches'=>'Passwords don\'t match'
                ]
            ]
        ]);

        if (! $validated) {
            return view('header') 
            . view('login_page',['validation'=>$this->validator]);
        }
        
        $firstName = $this->request->getPost('firstName');
        $lastName = $this->request->getPost('lastName');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordConf = $this->request->getPost('passwordConf');


        $role = (session()->get('userRole') == 'admin') ? "seller" : "user";

        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'pass_hash' => password_hash($password, PASSWORD_BCRYPT),
            'user_role' => $role
        ];

        $userModel = new UserModel();
        $queary = $userModel->insert($data);

        if(!$queary){
            return redirect() ->back()->with('fail', 'Saving user failed');
        }
        else{
            return redirect() ->back()->with('success', 'User added successfull');
        }
    }

    public function loginUser() {

        $validated = $this -> validate([
            'email'=>[
                'rules'=>'required|valid_email',
                'errors'=> [
                    'required'=> "Email is required",
                    'valid_email'=>"Email is already used"
                ]
            ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required'=> "Password is required",
                    'min_length'=>"Password must be at least 5 characters long",
                    'max_length'=>"Password must be at most 20 characters long"
                ]
            ]
        ]);

        if (! $validated) {
            return view('header')
            . view('login_page',['validation'=>$this->validator]);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $userInfo = $userModel->where('email', $email)->first();

        if( empty($userInfo) || !password_verify($password, $userInfo['pass_hash'])){
            session()->setFlashdata('fail_L', 'Incorrect password provided');
            return redirect()->to('login');
        }
        else{
            
            session()->set("loggedInUser",$userInfo['ID']);
            session()->set("userRole",$userInfo['user_role']);

            return redirect()->route("UserController::shop_view");
            
        }
    }



        public function logout() {
            if (session()->has("loggedInUser")){
                session()->remove("loggedInUser");
                session()->remove("userRole");
                session()->destroy();
            }
            return redirect()->route("Auth::show_view");
        }

    }

