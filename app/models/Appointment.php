<?php
class Appointment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSlotsNotIn($appointment_date)
    {
        $this->db->query("SELECT slot_Id as slotID , time as time FROM time_slot 
                            where slot_Id not IN 
                            (select slot_Id from appointment where appointment_date=:date) ;");
        $this->db->bind(':date', $appointment_date);
        $results = $this->db->resultset();
        return $results;


    }
    public function getId()
    {
        $sql = "select Appointment_Id from appointment order by Appointment_Id desc limit 1";
        $this->db->query($sql);
        $result = $this->db->single();


        if (empty($result)) {

            return 'AP000';

        } else {
            return $result->Appointment_Id;
        }
    }
    // new appointment
    public function addAppointment($data)
    {

        $status = $this->isAvailable($data);
        if ($status) {
            $appointmentId = $this->getId();
            ++$appointmentId;
            $this->db->query('INSERT INTO appointment (Appointment_Id,appointment_date,status, slot_Id, UserID, Reason_ID) 
                                VALUES(:Appointment_Id,:appointment_date,:status,:slot_Id,:UserID,:Reason_ID)');

            // Bind values

            $this->db->bind(':Appointment_Id', $appointmentId);
            $this->db->bind(':appointment_date', $data['date']);
            $this->db->bind(':status', 1); 
            $this->db->bind(':slot_Id', $data['time_slots']);
            $this->db->bind(':UserID', $_SESSION['user_id']);
            $this->db->bind(':Reason_ID', $data['reasonID']);

            // Execute
            if ($this->db->execute()) {

                return $appointmentId;

            } else {
                return false;
            }


        } else {
            return false;
        }


    }
    // Find user by email
    public function isAvailable($data)
    {
        $this->db->query('SELECT * FROM appointment WHERE appointment_date = :appointment_date AND slot_Id=:slot_Id');
        // Bind value
        $this->db->bind(':appointment_date', $data['date']);
        $this->db->bind(':slot_Id', $data['time_slots']);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }
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
    public function getAppointmentByDate($date)
    {

        $this->db->query("SELECT * from appointment,time_slot,user where appointment.slot_id=time_slot.slot_ID AND appointment.UserID=user.UserId AND appointment_date =:date order by time_slot.slot_ID;");

        $this->db->bind(':date', $date); 
        $results = $this->db->resultset();

        return $results;

    }
    public function countAppointments($date)
    {
        $this->db->query('select count(Appointment_Id) as countAppointments from appointment where appointment_date =:date ;');
        $this->db->bind(':date', $date); 
        $result = $this->db->single();
 
            return $result->countAppointments; 
    }
}