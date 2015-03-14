<?php

class Dashboard extends Controller
{
    public function index()
    {
        $user = User::all();

        if (Session::exists('logged_in') && User::isAdmin(Session::get('logged_in'))) {
            $this->view('dashboard/index', array('user' => $user->last()), true);
        } else {
            Session::flash('log_in', 'You must log as admin to access the dashboard.');
            Redirect::to(get_base_url('/') . 'login');
        }
    }
}
