<?php 
    class Admin{
        private $db_connect;
        public function __construct()
        {
            $host_name = 'localhost';
            $user_name = 'root';
            $password = '';
            $db_name = 'db_eshopper';
            $this->db_connect = mysqli_connect($host_name,$user_name,$password,$db_name);
            if(!$this->db_connect){
                die('Connection Fail'.mysqli_error($this->db_connect));
            }
        }
        public function admin_login_check($data){
          $email_address = $data['email_address'];
          $password = md5($data['password']);
          $sql = "SELECT * FROM tbl_admin WHERE email_address = '$email_address' AND password = '$password' ";
          if(mysqli_query($this->db_connect,$sql)){
              $query_result = mysqli_query($this->db_connect,$sql);
              $admin_info = mysqli_fetch_assoc($query_result);
              if($admin_info){
                  session_start();
                  $_SESSION['admin_name'] = $admin_info['admin_name'];
                  $_SESSION['admin_id'] = $admin_info['admin_id'];
                header('location:admin_master.php');
              }else{
                 $message = "Your email or password Invalid"; 
                 return $message;
              }
          }else{
              die('Query Problem'.mysqli_error($this->db_connect));
          }

        }
        
    }

?>