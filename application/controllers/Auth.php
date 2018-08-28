<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->respons_emessage = array('status' => false, 'message' => 'failed', 'mdata' => '');
    }

    /**
     * Login page.
     */
    public function index()
    {
        //load login page
        $this->load->view('auth/Login');
    }

    /**
     * Forgot password Page.
     */
    public function forgot_password()
    {
        //load the forgot password page
        $this->load->view('auth/Forgot_password');
    }

    /*
     *Register user page
     */
    public function register()
    {
        //load register page
        $this->load->view('auth/Register');
    }

    /*
     * Protected funcions area
     */
    /*
     *Post for login
     */
    public function request_login()
    {
        //validate captcha
        //login here
        echo json_encode($this->respons_emessage);
    }

    /**
     * Post register data.
     */
    public function request_register()
    {
        //validate captcha
        //register here
        echo json_encode($this->respons_emessage);
    }

    /**
     * post forgot password email id.
     */
    public function request_forgot()
    {
        //validate captcha
        //post the email
        echo json_encode($this->respons_emessage);
    }

    /**
     * Check login.
     */
    protected function check_login()
    {
        //check session token exist in db or not
    }
}
