<?php
class Customer
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    function generate_code()
    {
        return bin2hex(openssl_random_pseudo_bytes(15));
    }
    function verify($verification_code)
    {
        $this->db->query('UPDATE user SET verification_status="1" where verification_status=:verification_status;');
        $this->db->bind(':verification_status', $verification_code);
        //Registration  verified successfully
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function getLastUserId($role)
    {
        $sql = "select UserID from user where type=? order by UserID desc limit 1";
        $this->db->query($sql);
        $this->db->bind(1, $role);
        $result = $this->db->single();


        if (empty($result)) {

            return 'CU000';
        } else {
            return $result->UserID;
        }
    }
    // Regsiter user
    public function register($data)
    {
        $userid = $this->getLastUserId("Customer");
        ++$userid;
        $verification_code = $this->generate_code();
        //insert to user table
        $this->db->query('INSERT INTO user (UserId,email,password,type,verification_status, First_Name, Last_Name, NIC, Gender, DOB, Line1, Line2, Line3, Status) 
        VALUES(:UserId,:email,:password,:type,:verification_status,:First_Name,
        :Last_Name,:NIC,:Gender,:DOB,:Line1,:Line2,:Line3,:Status)');
        // Bind values

        $this->db->bind(':UserId', $userid);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':type', "Customer");
        $this->db->bind(':verification_status', $verification_code);
        $this->db->bind(':First_Name', $data['fname']);
        $this->db->bind(':Last_Name', $data['lname']);
        $this->db->bind(':NIC', $data['nic']);
        $this->db->bind(':Gender', $data['gender']);
        $this->db->bind(':DOB', $data['dob']);
        $this->db->bind(':Line1', $data['address1']);
        $this->db->bind(':Line2', $data['address2']);
        $this->db->bind(':Line3', $data['address3']);
        $this->db->bind(':Status', 1);
        // $this->db->bind(':Created_By', $userid);


        // Execute
        if ($this->db->execute()) {

            if (!empty($data['home'])) {
                $this->db->query('INSERT INTO phone(UserId,Phone) VALUES (:userId,:mobile),(:userId,:home);');
                $this->db->bind(':userId', $userid);
                $this->db->bind(':mobile', $data['mobile']);
                $this->db->bind(':home', $data['home']);
            } else {
                $this->db->query('INSERT INTO phone(UserId,Phone) VALUES (:userId,:mobile);');
                $this->db->bind(':userId', $userid);
                $this->db->bind(':mobile', $data['mobile']);
            }
            if ($this->db->execute()) {
                return $verification_code;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM user WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findUserByPhoneNo($mobile, $home)
    {
        $this->db->query('SELECT * FROM phone WHERE phone = :mobile OR phone = :home');
        // Bind value
        $this->db->bind(':mobile', $mobile);
        $this->db->bind(':home', $home);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findUserIDByEmail($email)
    {
        $this->db->query('SELECT UserId FROM user WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return $row->UserId;
        } else {
            return false;
        }
    }

    public function findUserByNic($nic)
    {
        $this->db->query('SELECT UserId FROM user WHERE NIC = :nic');
        // Bind value
        $this->db->bind(':nic', $nic);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return $row->UserId;
        } else {
            return false;
        }
    }

    public function deleteUser($email)
    {
        $userid = $this->findUserIDByEmail($email);
        // Prepare Query
        $this->db->query('DELETE FROM phone WHERE userId= :id');
        // Bind Values
        $this->db->bind(':id', $userid);
        //Execute
        if ($this->db->execute()) {

            $this->db->query("DELETE FROM user WHERE UserId= :id");
            $this->db->bind(':id', $userid);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function changepassword($email,$password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->query('UPDATE User SET password=:password WHERE email= :email');

        // Bind Values
        $this->db->bind(':password', $userid);
        $this->db->bind(':email', $email);
        //Execute
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }

    }
    public function setLastSeen($userid)
    {
        $this->db->query('UPDATE User SET Last_Seen=CURRENT_TIMESTAMP WHERE userId= :id');

        // Bind Values
        $this->db->bind(':id', $userid);
        //Execute
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }


    // ------------pawning officer----------------------


    // Register customer
    public function registerCustomer($data)
    {
        $userid = $this->getLastUserId("Customer");
        ++$userid;

        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->db->query('INSERT INTO user (UserId, First_Name, Last_Name, email, password, type, verification_status, NIC, DOB, Gender, Line1, Line2, Line3, Status, Created_By) 
                              VALUES(:userid, :first_name, :last_name, :email, :password, :type, :verification_status, :nic, :dob, :gender, :line1, :line2, :line3, :status, :created_by)');

        // Bind values
        $this->db->bind(':userid', $userid);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':line1', $data['line1']);
        $this->db->bind(':line2', $data['line2']);
        $this->db->bind(':line3', $data['line3']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':type', "Customer");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':verification_status', 1);
        $this->db->bind(':password', $hashed_password);
        $this->db->bind(':status', 0);
        $this->db->bind(':created_by', $data['created_by']);

        if ($this->db->execute()) {
            $this->db->query('INSERT INTO phone (userId, Phone) VALUES (:userId, :phone);');
            $this->db->bind(':userId', $userid);
            $this->db->bind(':phone', $data['phone']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getCustomerById($id)
    {
        $this->db->query('SELECT * FROM user INNER JOIN phone ON user.UserId=phone.userId WHERE user.UserId = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        return $row;
    }


    public function getCustomer()
    {
        $this->db->query('SELECT * FROM user INNER JOIN phone ON user.UserId=phone.userId WHERE user.type = "Customer"');

        $results = $this->db->resultSet();

        return $results;
    }


    // get All the Customers

    public function getAllCustomers()
    {
        $this->db->query('SELECT * from User,phone where User.UserId=phone.userId AND user.userId like "CU%";');
        $results = $this->db->resultset();
        //    header("Content-type: image/jpeg");

        return $results;
    }
}
