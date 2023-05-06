<?php
require_once '../Models/user.php';
require_once '../Controllers/DBcontrol.php';
require_once '../Models/notification.php';

class authControl {
    protected $db;
    public $er;
 
    public function register(User $user){
        $this->db = new DBcontrol;
        if($this->db->openConnection())
        {
           
            $query="INSERT INTO `user`(`u_id`, `u_name`, `u_email`, `u_password`, `date_of_regist`, `profile_pic`, `gender`) VALUES ('','$user->u_name','$user->u_email','$user->u_password','$user->date_of_regist','$user->profile_img','$user->gender')";            
            $result=$this->db->insert($query);
            if($result!=false)
            {
//session_start();
                //$_SESSION["u_id"]=;
                $_SESSION["username"]=$user->u_name;
                $_SESSION["u_email"]=$user->u_email;
                $_SESSION["gender"]=$user->gender;
                $_SESSION["profile_pic"]=$user->profile_img;
                $this->db->closeConnection();
                return true;
            }
            else
            {
              //  session_start();
                $_SESSION["errMsg"]="Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function login(User $user){
        $this->db = new DBcontrol;
        if($this->db->openConnection())
        {
            $query = "SELECT * FROM user WHERE u_name='$user->u_name'";
            $result = $this->db->select($query);
            if($result===false)
            {
                echo "error in connection";
                return false;
            }
            else{
                // if($result[0]["u_password"]==null){
                //     return false;
                // }
                // else{
                // $hashpass= password_verify($user->u_password , $result[0]["u_password"]);
                // }
                if(count($result)!=0){
                 $hashpass= password_verify($user->u_password , $result[0]["u_password"]);
                }
                if(count($result)==0){
                // session_start();
                 $er = true;
                 $this->db->closeConnection(); 
                 return false;
                }
                else if(count($result)!=0 && $hashpass==false){
                    return false;
                }
                else{
                    session_start();
                    $hashpass= password_verify($user->u_password , $result["u_password"]);
                    $_SESSION["u_id"]=$result[0]["u_id"];
                    $_SESSION["u_name"]=$result[0]["u_name"];
                    $_SESSION["u_email"]=$result[0]["u_email"];
                    $_SESSION["gender"]=$result[0]["gender"];
                    $_SESSION["profile_pic"]=$result[0]["profile_pic"];
                    $this->db->closeConnection();
                    return true;
                }
         }
       }
  } 
  public function update_profile(User $user){
    $this->db = new DBcontrol;
    if($this->db->openConnection())
    {
        //session_start();  
        $query=" UPDATE `user`SET `profile_pic`='$user->profile_img' and `u_name`='$user->u_name' and `u_email`='$user->u_email' where `u_id` = '$user->u_id'";            
        $result= mysqli_query($this->db->connection,$query);
        if($result!=false)
        {
            //  $_SESSION["u_id"]= $user->u_id;
             $_SESSION["username"]=$user->u_name;
             $_SESSION["u_email"]=$user->u_email;
             $_SESSION["gender"]=$user->gender;
             $_SESSION["profile_pic"]=$user->profile_img;
             $this->db->closeConnection();
            return true;
        }
        else
        {
          //  session_start();
            $_SESSION["errMsg"]="Somthing went wrong... try again later";
            $this->db->closeConnection();
            return false;
        }
    }
    else
    {
        echo "Error in Database Connection";
        return false;
     }
   }
   public function existAccount(User $user){
    $this->db = new DBcontrol;
    if($this->db->openConnection())
    {
        $query = "SELECT * FROM user WHERE u_email='$user->u_email'";
        $result = $this->db->select($query);
        // $hashpass= password_verify($user->u_password , $result[0]["u_password"]);
        if($result===false)
        {
            echo "error in connection";
            return false;
        }
        else{
            if(count($result)==0){
             //session_start();
             $er = true;
             $this->db->closeConnection(); 
             return false;
            }
            else if(count($result)!=0){
                return true;
            }
         }
      }
   }
//    public function sendNotification(Notification $notification){
//     $this->db = new DBcontrol;
//     if($this->db->openConnection()){
//        //$query = "INSERT INTO `notification`(``,`channel_id`,`channel_name`) VALUES " 
//     }
//    } 
 }
?>
