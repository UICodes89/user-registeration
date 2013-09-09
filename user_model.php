<?php
// model part for the user registration

 class user_model extends CI_Model{

    public function add_temp_user($key){

        $data=array(

            'email'=> $this->input->post('email'),
            'password'=>$this->input->post('password'),
            'key'=>$key

        	);
       $query= $this->db->insert('temp_user',$data);
       if($query){

       	return true;
       }
       else{

       	return false;
       }


    }

  public function is_key_valid($key)
   {
    $this->db->where('key',$key);
    $query=$this->db->get('temp_user');
    if($query->num->rows()==1)
    {
    	return true;
    }
    else
    {
         return false;
    }
   }  





}
?>
