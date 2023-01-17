<?php
class Appointment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
 
    // new appointment
    public function addAppointment($data)
    {

        // $userid = $this->getLastUserId() + 1;
        //insert to user table
        $this->db->query('INSERT INTO user (email,password,type,verification_status, First_Name, Last_Name, NIC, Gender, DOB, Line1, Line2, Line3, Status,Created_By) 
        VALUES(:email,:password,:type,:verification_status,:First_Name,
        :Last_Name,:NIC,:Gender,:DOB,:Line1,:Line2,:Line3,:Status,:Created_By)');
        // Bind values

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':type', 1);
        $this->db->bind(':verification_status', 0);
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
                // $this->db->bind(':userId', $userid);
                $this->db->bind(':mobile', $data['mobile']);
                $this->db->bind(':home', $data['home']);
            } else {
                $this->db->query('INSERT INTO phone(UserId,Phone) VALUES (:userId,:mobile);');
                // $this->db->bind(':userId', $userid);
                $this->db->bind(':mobile', $data['mobile']);

            }
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function login($email, $password){
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind(':email', $email);
  
        $row = $this->db->single();
  
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
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
<<<<<<< Updated upstream
=======
    public function getAppointmentById($userId)
    {

        $this->db->query("SELECT Appointment_Id,appointment_date,Status,time_slot.time as time, description as reason from appointment,reason,time_slot
         where appointment.slot_ID=time_slot.slot_Id 
         AND reason.reason_Id=appointment.reason_Id 
         AND userId= :userid ORDER BY Appointment_Id ;");

        $this->db->bind(':userid', $userId);

        $results = $this->db->resultset();

        return $results;
    }
    public function cancelAppointment($appointmentId)
    {
        // Prepare Query
        $this->db->query('DELETE FROM appointment WHERE Appointment_Id= :id');

        // Bind Values
        $this->db->bind(':id',$appointmentId);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getAppointmentFromTo($data)
    {

        $this->db->query("SELECT Appointment_Id,appointment_date,Status,time_slot.time as time, description as reason from appointment,reason,time_slot
         where appointment.slot_ID=time_slot.slot_Id 
         AND reason.reason_Id=appointment.reason_Id 
         AND userId= :userid AND appointment_date BETWEEN (:from) AND (:to) ORDER BY Appointment_Id ;");

        $this->db->bind(':from', $data['from']);
        $this->db->bind(':to', $data['to']);
        $this->db->bind(':userid', $_SESSION['user_id']);
        $results = $this->db->resultset();

        return $results;

    }
>>>>>>> Stashed changes
}