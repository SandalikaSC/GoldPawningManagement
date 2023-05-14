<?php
class UserModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser($email)
    {
        $sql = 'select UserId, email, password, type FROM user where email=? limit 1';
        $this->query($sql);
        $this->bind(1, $email);
        $result = $this->single();
        return $result;
    }

    public function verifyEmail($email)
    {
        $sql = 'select email from user where email=?';
        $this->query($sql);
        $this->bind(1, $email);
        $result = $this->single();
        return $result;
    }

    //Change password

    public function changepassword($email, $password)
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


   


    
}
