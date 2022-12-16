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
        if ($this->db->execute()){
            
            return true;
        }else{
            return false;
        }
    }
    public function getLastUserId()
    {
        $this->db->query('SELECT userId FROM user ORDER BY userId DESC LIMIT 1;');

        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row->userId;
        } else {
            return 0;
        }

    }
    // Regsiter user
    public function register($data)
    {

        $verification_code = $this->generate_code();
        //insert to user table
        $this->db->query('INSERT INTO user (email,password,type,verification_status, First_Name, Last_Name, NIC, Gender, DOB, Line1, Line2, Line3, Status) 
        VALUES(:email,:password,:type,:verification_status,:First_Name,
        :Last_Name,:NIC,:Gender,:DOB,:Line1,:Line2,:Line3,:Status)');
        // Bind values

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':type', 1);
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
            $userid = $this->getLastUserId();
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


}