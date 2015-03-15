<?php

class Auth extends Controller
{
    public function index()
    {
        // Check session exists and user is logged in and redirect accordingly

        // else
        Redirect::to(getBaseUrl('/') . 'admin/auth/login');
    }

    public function login()
    {
        if (Input::exists()) {
            if (Input::get('log_out')) User::logout();
        }

        if (Session::exists('log_in')) echo Session::flash('log_in');

        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {
                $errorHandler = new ErrorHandler();
                $login_validation = new Validator($errorHandler);

                $login_validation->rules = array(
                    'email' => array(
                        'required' => true,
                        'email' => true,
                        'maxlength' => 64
                    )
                );

                $validation = $login_validation->check($_POST);

                if ($validation->fails()) {
                    $error = '<span style="color: red; font-weight: bold;">' . $validation->errors()->first('email') . '</span><br />';
                } else {
                    $user = array('email' => Input::get('email'));

                    if (User::exists($user)) {
                        if (User::login($user)) {
                            Session::flash('log_in', 'You have successfully logged in.');
                            Redirect::to(get_base_url('/') . 'admin');
                        } else {
                            $error = 'There was an error logging in.';
                        }
                    } else {
                        $error = 'There is no such user in the database';
                    }
                }
            }
        }
    }
}