<?php

 class user_model extends CI_Model{

    public function add_temp_user($key){

        $data=array(

            'email'=> $this->input->post('email'),
            'password'=>$this->input->post('password'),
            'key'=>$key

        	);
       $temp_user= $this->db->insert('temp_user',$data);
       if($temp_user){
                   $row=$temp_user->row();
                    $data=arrar(
                                 'username'=>$row->username,
                                 'email'=>$row->email,
                                 'password'=>$row->password
                              

                      );
       	 $did_add_user=$this->db->insert('user',$data);
         if($did_add_user){
             $this->db->where('key',$key)
             $this->db->delete('temp_user');
             return $data['email'];

         }else{

              return false;
         }

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
