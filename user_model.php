<?php

class Register extends CI_controller{

  public function __construct(){
  
    parent::__construct();
  
  }
  public function index(){

    $this->register();
  }
 

  public function register()
   {

     $this->load->helper(array('form','url'));
     $this->load->library('form_validation');
     $this->form_validation->set_rules('username','Username','trim|required|max_length[10]|min_length[5]|xss_clean');
     $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
     $this->form_validation->set_rules('password','Password','trim|required|max_length[10]|min_length[5]|required|matches[password_match]|xss_clean');
     $this->form_validation->set_rules('username','Username','trim|required|max_length[10]|min_length[5]|required|xss_clean');
   
     if($this->form_validation->run()== FALSE)
       {

         $this->load->view('register');

        }
      else
        {

           $key=md5(uniqid());
           $this->load->model('user_model');
           if($this->user_model->add_temp_user($key))
             {
                 $config['protocol']='smtp';
                 $config['mailpath']='user/sbin/mail';
                 $config['mailtype']='html';
                 $config['charset']='iso-8859-1';
                 $config['wordwrap']='TRUE';
                 $this->load->library('email',$config);
                 $this->email->clear();
                 $extra='<html>
                          <head>
                            <style>
                             header{ backgound:maroon;color:white;border:1px solif black;}
                             section{background:gray;color:black;}
                             footer{clar:both;text-align:center;background:black;color:white;border:1px solid white;}  
                            </style>
                          </head>
                           <body>
                                        <header>
                                               WealthPro Email Verification
                                        <header>
                                        <section>
                                             <p>Please 
                                               <a href="www.wealthpro.in/register/register_user/$key"?>">
                                                 Click Here
                                               </a> 
                                               To Verify Your Email id
                                             </p>
                                        </section>
                                        <footer>
                                          <p>
                                            wealthpro-admin
                                           </p> 
                                        <footer>

                                    
                           </body>
                         </html>';
                 $this->email->from('info@employee.wealthpro.in','wealthpro-admin');
                 $this->email->to( $this->input->post('email'));
                 $this->email->subject('Email Verification');
                 $this->email->message($extra);

                 if($this->mail->send()== False)
                  {
                      return false;

                  }
                 else
                  {
                    return true;
                  }
               }
             else
               {
                 echo "user not added";
               }

            }

     }

 public function register_user($key)
 {
   $this->load->model('model_user');
   if($this->model_user->is_key_valid($key))
   {
         if( $newemail= user>model_$this->model('user_model'))
          {
            $data=array(
              'email'=>$newwmail,
              'is_log_in'=>1


              );
            $this->session->set_userdata($data);
            redirect('register/user-home');
          }

     //add furthe steps what to do next add data in to user table and delete data from temp user
     //and create session and send user to home page.
   }
   else
   {
     echo "invalid key user is not authonticate";

   }

 }    



}





   ?>
