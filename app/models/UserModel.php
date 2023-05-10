<?php
class UserModel extends Database{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser($email){
        $sql = 'select UserId, email, password, type FROM user where email=? limit 1';
        $this->query($sql);
        $this->bind(1,$email);
        $result = $this->single();
        return $result;
    }

    public function verifyEmail($email){
        $sql='select email from user where email=?';
        $this->query($sql);
        $this->bind(1,$email);
        $result = $this->single();
        return $result;
    }

    //Change password

    public function changepassword($email,$password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->query('UPDATE User SET password=:password WHERE email= :email');

        // Bind Values
        $this->db->bind(':password', $hashed_password);
        $this->db->bind(':email', $email);
        //Execute
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }

    }

    public function resetEmail($curremail,$newemail){
        $sql='update user set email=? where email=?';
        $this->query($sql);
        $this->bind(1,$newemail);
        $this->bind(2,$curremail);
        $this->execute();
    }

    public function getUserEmail($id){
        $sql = 'select email from user where UserId=?';
        $this->query($sql);
        $this->bind(1,$id);
        $result = $this->single();
        return $result;
    }


    public function deleteComplaint($cid){
        $sql='delete from complaint where CID=?';
        $this->query($sql);
        $this->bind(1,$cid);
        $result = $this->execute();
        return $result;
    }

}
?>