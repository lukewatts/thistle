<?php

class Dashboard extends Controller
{
    public function index()
    {
        $user = User::all();

<<<<<<< HEAD
        $session_id = Session::get('logged_in');

        if (Session::exists('logged_in') && User::isAdmin($session_id)) {
=======
        if (Session::exists('logged_in') && User::isAdmin(Session::get('logged_in'))) {
>>>>>>> c61c17b09b3351c9981ebdf4c55fd88893f9392b
            $this->view('dashboard/index', array('user' => $user->last()), true);
        } else {
            Session::flash('log_in', 'You must log as admin to access the dashboard.');
            Redirect::to(get_base_url('/') . 'login');
        }
    }
}
