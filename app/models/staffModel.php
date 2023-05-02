<?php

use LDAP\Result;

class staffModel extends Database
{
    public function getStaffMember()
    {
        $sql = 'select UserId,concat(First_Name," ",Last_Name) as Name, type as Role, Created_date as Date from user where UserId not like "MG%"  AND UserId not like "CU%" AND UserId not like "AD%" AND UserId not like "OW%"';
        $this->query($sql);
        $result = $this->resultSet();
        if ($this->rowCount() > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    public function getStaffId($role)
    {
        $sql = "select UserId from user where type=? order by UserId desc limit 1";
        $this->query($sql);
        $this->bind(1, $role);
        $result = $this->single();


        if (empty($result)) {
            switch ($role) {
                case 'Pawning Officer':
                    return 'PO000';
                    break;

                case 'Vault Keeper':
                    return 'VK000';
                    break;

                case 'Gold Appraiser':
                    return 'GA000';
                    break;
            }
        } else {
            return $result->UserId;
        }
    }

    public function emailExist($email)
    {
        $sql1 = 'select email from user where email=?';

        $this->query($sql1);
        $this->bind(1, $email);

        $result1 = $this->single();

        if ($this->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function nicExist($nic)
    {
        $sql1 = 'select NIC from user where NIC=?';

        $this->query($sql1);
        $this->bind(1, $nic);

        $result1 = $this->single();

        if ($this->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function phoneExist($phone)
    {
        $sql1 = 'select phone from phone where phone=?';

        $this->query($sql1);
        $this->bind(1, $phone);

        $result1 = $this->single();

        if ($this->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function addStaffMember($id, $fName, $lName, $gender, $nic, $dob, $line1, $line2, $line3, $mob, $mob2, $email, $role, $image, $hash)
    {

        $sql = 'insert into user(UserId,email,password,type,verification_status,First_Name, Last_Name, Gender, NIC, DOB, Line1, Line2, Line3, image, Status,Created_By) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

        $this->query($sql);

        $this->bind(1, $id);
        $this->bind(2, $email);
        $this->bind(3, $hash);
        $this->bind(4, $role);
        $this->bind(5, 1);
        $this->bind(6, $fName);
        $this->bind(7, $lName);
        $this->bind(8, $gender);
        $this->bind(9, $nic);
        $this->bind(10, $dob);

        if ($line1 == "") {
            $this->bind(11, NULL);
        } else {
            $this->bind(11, $line1);
        }

        if ($line2 == "") {
            $this->bind(12, NULL);
        } else {
            $this->bind(12, $line2);
        }

        if ($line3 == "") {
            $this->bind(13, NULL);
        } else {
            $this->bind(13, $line3);
        }

        $this->bind(14, $image);
        $this->bind(15, 1);
        $this->bind(16, $_SESSION['user_id']);
        $result = $this->execute();
        if ($result) {
            $result1 = '';
            if (!empty($mob2)) {
                $sql1 = 'insert into phone (userId,phone) values (:userId,:mobile),(:userId,:home);';
                $this->query($sql1);

                $this->bind(":userId", $id);
                $this->bind(":mobile", $mob);
                $this->bind(":home", $mob2);
                $result1 = $this->execute();
            } else {
                $sql1 = 'insert into phone (userId,phone) values (:userId,:mobile);';
                $this->query($sql1);

                $this->bind(":userId", $id);
                $this->bind(":mobile", $mob);
                $result1 = $this->execute();
            }
            if ($result1) {
                return $result and $result1;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



    public function viewStaffMember($id)
    {
        $sql = "select user.UserId, user.First_Name, user.Last_Name, user.Gender, user.NIC, user.DOB, user.Line1, user.Line2, user.Line3, user.email, user.image, user.type, user.Created_date,user.Created_By,user.last_edit, phone.phone from user inner join phone on user.UserId=phone.userId where user.UserId=? ;";
        $this->query($sql);
        $this->bind(1, $id);
        $result = $this->resultSet();

        return $result;
    }

    public function deleteStaffMember($id)
    {
        $sql2 = "delete from phone where userId= ?";
        $this->query($sql2);
        $this->bind(1, $id);
        $result2 = $this->execute();

        $sql = "delete from user where UserId=?";
        $this->query($sql);
        $this->bind(1, $id);
        $result1 = $this->execute();


        return $result1 and $result2;
    }


    public function loadProfilePicture($email)
    {
        $sql = 'select image, concat(First_Name," ",Last_Name) as Name from user where email=? limit 1';
        $this->query($sql);
        $this->bind(1, $email);
        $result = $this->single();
        return $result;
    }

    public function getAllPasswords(){
        $sql="select password from user";
        $this->query($sql);
        $passwords=$this->resultSet();
        return $passwords;
      }


    public function getUserPassword($email)
    {
        $sql = 'select password from user where email= ? limit 1';
        $this->query($sql);
        $this->bind(1, $email);
        $result = $this->single();
        return $result;
    }

    public function setPersonalInfo($id, $fName, $lName, $gender, $line1, $line2, $line3, $mob, $mob2, $image)
    {
        // $sql = 'insert into user(First_Name, Last_Name, Gender, DOB, Line1, Line2, Line3, image) values (?,?,?,?,?,?,?,?) where userId=?';
        $sql = 'update user set First_Name=?,Last_Name=?,Gender=?,Line1=?,Line2=?,Line3=?,image=?,last_edit=? where userId=?';
        $this->query($sql);

        $this->bind(9, $id);
        $this->bind(1, $fName);
        $this->bind(2, $lName);
        $this->bind(3, $gender);


        if ($line1 == "") {
            $this->bind(4, NULL);
        } else {
            $this->bind(4, $line1);
        }

        if ($line2 == "") {
            $this->bind(5, NULL);
        } else {
            $this->bind(5, $line2);
        }

        if ($line3 == "") {
            $this->bind(6, NULL);
        } else {
            $this->bind(6, $line3);
        }

        $this->bind(7, $image);
          
        $timestamp = date('Y-m-d H:i:s'); // get the Unix timestamp for the current date and time
        $this->bind(8, $timestamp);


        $result = $this->execute();

        if ($result) {
            $result1 = '';
            if (!empty($mob2)) {
                $sql = 'select phone from phone where userId=?';
                $this->query($sql);
                $this->bind(1, $id);
                $bothNum = $this->resultSet();


                // print_r($bothNum);
                $sql1 = 'update phone set phone=? where userId=? and phone=?';
                $this->query($sql1);
                $this->bind(1, $mob);
                $this->bind(2, $id);
                $this->bind(3, $bothNum[1]->phone);
                $mobileNumber = $this->execute();

                $sql2 = 'update phone set phone=? where userId=? and phone=?';
                $this->query($sql2);
                $this->bind(1, $mob2);
                $this->bind(2, $id);
                $this->bind(3, ($bothNum[0])->phone);
                $additionalNumber = $this->execute();

                $result1 = '1';
            } else {
                $sql1 = 'update phone set phone=:mobile where userId=:userId';
                $this->query($sql1);

                $this->bind(":mobile", $mob);
                $this->bind(":userId", $id);
                $result1 = $this->execute();
            }
            if ($result1) {
                return $result and $result1;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


 
}
