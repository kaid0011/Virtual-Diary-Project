<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class ForgotPassword extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('ForgotPassword_model');
        }

        public function index() 
        {
            $data['navbar'] = 'login';
            $this->sitelayout->loadTemplate('pages/authentication/forgotpassword', $data); 
        }

        public function validation()
        {
            $action = $this->input->post('action');

            if($action == 'Confirm')
            {
                $this->form_validation->set_rules('email', 'E-mail Address', 'required|trim|valid_email');

                if($this->form_validation->run())
                {
                    $email = $this->input->post('email');
                    $result = $this->ForgotPassword_model->checkEmail($email);

                    if($result)
                    {
                        $code = random_string('numeric', 6);
                        $userdata = array(
                            'email' => $email,
                            'code'  =>  $code
                        );
                        $this->session->set_userdata($userdata);
                        $this->sendEmail();
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'This email is not registered.');
                        $this->index();
                    }
                }
                else
                {
                    $data['navbar'] = 'login';
                    $this->sitelayout->loadTemplate('pages/authentication/forgotpassword', $data); 
                }
            }
            else    #if ($action == 'Back')
            {
                $data['navbar'] = 'login';
                $this->sitelayout->loadTemplate('pages/authentication/login', $data); 
            }
        }

        public function sendEmail()
        {
            $email = $this->session->userdata('email');
            $code = $this->session->userdata('code');
            $subject = "Forgot Password";
            $message = '
            <h4 align="center">This is an automated email for providing you a code to reset your password in Virtual Diary.</h4>

            <h1 align="center">'.$code.'</h1>

            <h4 align="center">If this request is done by you, take the code above in order to progress.
            If you did not request this, ignore this message.</h4>
            ';

            $this->load->library('email');
            $this->email->initialize($this->config->item('email'));
            $this->email->set_newline("\r\n");
            $this->email->from('Team6.VirtualDiary2022@gmail.com', 'Virtual Diary');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            $send = $this->email->send();

            if($send)
            {
                $data['navbar'] = 'login';
                $this->sitelayout->loadTemplate('pages/authentication/confirmation', $data);
            }
        }
    }