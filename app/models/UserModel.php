<?php
class UserModel extends Database{
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

    public function resetPassword($email,$password){
        $sql='update user set password=? where email=?';
        $this->query($sql);
        $this->bind(1,$password);
        $this->bind(2,$email);
        $this->execute();
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