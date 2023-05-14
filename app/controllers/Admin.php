<?php
    class Admin extends Controller {
        public function __construct(){
            flashMessage();
            
            if(!isLoggedIn()) {
                redirect('employees');
            }
        
        }
         // View admin Dashboard
        public function AdminDash(){
            $gold_rates = $this->model('adminModel')->getGoldRates();
            $interest = $this->model('adminModel')->getInterestRates();
            $admin_count = $this->model('adminModel')->getAdmin();
            $manager_count = $this->model('adminModel')->getManager();
            $customer_count = $this->model('adminModel')->getCustomer();
            $pawning_officer_count = $this->model('adminModel')->getPawningOfficer();
            $vault_keeper_count = $this->model('adminModel')->getVaultKeeper();
            $get_payment_list  = $this->model('adminModel')->getPayment();
   
            $data = [
                'title' => 'Dashboard',
                'gold_rates' => $gold_rates,
                'interest' => $interest,
                'admin_count' => $admin_count->adminCount,
                'manager_count' => $manager_count->managerCount,
                'customer_count' => $customer_count->customerCount,
                'pawning_officer_count' => $pawning_officer_count->pawningofficerCount,
                'vault_keeper_count' => $vault_keeper_count->vaultkeeperCount,
                'get_payment_list' => $get_payment_list,
            ];

            $this->view('Admin/adminDash_1', $data);
        }

        public function pawned_items() {
            // Get pawned items
            $pawned_items = $this->model('adminModel')->getPawnedItems();

            $data = [
                'pawned_items' => $pawned_items
            ];

            $this->view('Admin/pawnedItems_Admin', $data);
        }

        public function pawnedItems_payments($id) {
            // Get pawned item
            $pawned_item = $this->model('adminModel')->getPawnItemById($id);
            $getPawnItemPaymentById = $this->model('adminModel')->getPawnItemPaymentById($id);
            $data = [
                'pawn_item' => $pawned_item,
                'getPawnItemPaymentById' => $getPawnItemPaymentById
            ];

            $this->view('Admin/view_pawned_items', $data);
        }

        public function view_gold_market() {
            $data = [];

            $this->view('Admin/gold_market', $data);
        }

        public function view_staff() {
            $get_staff_list = $this->model('adminModel')->getStaffList();
            $data = [
                'get_staff_list' => $get_staff_list
            ];
            $this->view('Admin/staff', $data);
        }

        public function view_staff_details($id) {
      
            $data = $this->model('adminModel')->getStaffListDetails($id); 
            $this->view('Admin/view_staff', $data);
        }

        public function confirm_delete_staff($id) {
            $data = $this->model('adminModel')->getStaffListDetails($id); 
            $this->view('Admin/confirm-delete', $data);
        }

        public function delete_staff($id) {
      
            $data = $this->model('adminModel')->deleteStaff($id); 
            $this->view('Admin/delete-success');
        }

        public function view_add_staff() {
           
            $this->view("/Admin/add_staff");
        }


        public function ViewLocker($lockerid)
        {
                $currentReservations = $this->model('reservation')->getReservationsbyRetrieve($lockerid, 0);
                $previous_reservations = $this->model('reservation')->getReservationsbyRetrieve($lockerid, 1);
                $delivery = null;
                $currentpayment = null;
                $customer = null;
                if (!empty($currentReservations)) {
                        $delivery = $this->model('delivery')->deliveryByLocker($lockerid, $currentReservations[0]->Date);
                        $currentpayment = $this->model('payment')->filterReservationPayment($currentReservations);

                        $customerid = $currentReservations[0]->UserID;
                        $customer = $this->model('Customer')->getCustomerById($customerid);
                      
                }
                $extend = 0;
                if (!empty($currentReservations)) {
                        $interval = date_diff(date_create($currentReservations[0]->Retrieve_Date), date_create());
                        $date1 =  $currentReservations[0]->Retrieve_Date; // the date to check
                        $current_date = date('Y-m-d'); // the current date
                        $timeremain = $date1 < $current_date ? "Overdue" : $interval->format('%m months  %d days');
                        $tag = $timeremain == "Overdue" ? "tag red" : "";
                        if ($interval->days <= 30) {
                                $extend = 1;
                        }
                } else {
                        $tag = "";
                        $timeremain = "";
                }

                $data = [
                        'currentReservations' => $currentReservations,
                        'previous_reservations' => $previous_reservations,
                        'delivery' => $delivery,
                        'currentpayment' => $currentpayment,
                        'locker' => $lockerid,
                        'timeremain' => $timeremain,
                        'tag' => $tag,
                        'extend' => $extend,
                        'customer' => $customer
                ];


                $this->view('Admin/LockerItemDetails', $data);
        }
    


        private function randomPassword()
        {
          $pass = array(); //remember to declare $pass as an array
          $alphabet = 'abcdefghijklmnopqrstuvwxyz';
          $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
          for ($i = 0; $i < 2; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
          }
      
          $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
          for ($i = 0; $i < 2; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
          }
      
          $alphabet = '1234567890';
          $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
          for ($i = 0; $i < 2; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
          }
      
          $alphabet = '~!@#$%^&*()_+-?><=|\/:;';
          $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
          for ($i = 0; $i < 2; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
          }
      
          return implode($pass); //turn the array into a string
        }

        // Print locker details  PDF
        public function download_pdf($id) { 
          
          $pawned_item = $this->model('adminModel')->getPawnItemById($id);
          $getPawnItemPaymentById = $this->model('adminModel')->getPawnItemPaymentById($id);
          $data = [
              'pawn_item' => $pawned_item,
              'getPawnItemPaymentById' => $getPawnItemPaymentById
          ];
          
         
          /**
           * Creates an example PDF TEST document using TCPDF
           * @package com.tecnick.tcpdf
           * @abstract TCPDF - Example: Default Header and Footer
           * @author Nicola Asuni
           * @since 2008-03-04
           */

          // Include the main TCPDF library (search for installation path).
          require_once('tcpdf/tcpdf.php');

          // create new PDF document
          $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
          // set default header data
          $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
          $pdf->setFooterData(array(0,64,0), array(0,64,128));

          // set header and footer fonts
          $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
          $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

          // set default monospaced font
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

          // set margins
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

          // set auto page breaks
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

          // set image scale factor
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

          // set some language-dependent strings (optional)
          if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
              require_once(dirname(__FILE__).'/lang/eng.php');
              $pdf->setLanguageArray($l);
          }

          // set default font subsetting mode
          $pdf->setFontSubsetting(true);

          // Set font
          // dejavusans is a UTF-8 Unicode font, if you only need to
          // print standard ASCII chars, you can use core fonts like
          // helvetica or times to reduce file size.
          $pdf->SetFont('dejavusans', '', 14, '', true);

          // Add a page
          // This method has several options, check the source code documentation for more information.
          $pdf->AddPage();

          // set text shadow effect
        
          $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

          // Set some content to print
          $pawnItemPayments = array();
          $border = '"border:1px solid black"';
          $Payment_History ="";
          foreach($data['getPawnItemPaymentById'] as $key => $item) {
              $Payment_History =  $Payment_History. "<tr><th style= $border>  $item->PID</th><th style=$border>$item->Date</th><th style=$border>  Rs. $item->Amount</th><th style=$border>      $item->Type</th></tr>";
          }
          
         // PDF view
          $html = <<<EOD

          <h4>Article Details</h4>
          
          <table>
            <tr>
              <th>Customer ID</th>
              <th>{$data['pawn_item']->userId} </th>
            </tr>
            <tr>
              <td>Article ID</td>
              <td>{$data['pawn_item']->Article_Id}</td>
            </tr>
            <tr>
              <td>Pawned Date</td>
              <td>{$data['pawn_item']->Pawn_Date}</td>
            </tr>
            <tr>
              <td>Due Date</td>
              <td>{$data['pawn_item']->End_Date}</td>
            </tr>
            <tr>
              <td>Full Loan Amount</td>
              <td>{$data['pawn_item']->Amount}</td>
           </tr>
           <tr>
              <td>Registered By</td>
              <td>{$data['pawn_item']->Officer_Id}</td>
           </tr>
           <tr>
              <td>Validated By</td>
              <td>{$data['pawn_item']->Appraiser_Id}</td>
           </tr>
          </table>
          
          <h4>Payment History</h4>

          <table>
            <thead>
            <tr>
              <th style="border:1px solid black">Payment ID</th>
              <th style="border:1px solid black">Paid Date</th>
              <th style="border:1px solid black">Amount</th>
              <th style="border:1px solid black">Type</th>
            </tr>
            </thead>
            <tbody>
            $Payment_History
            </tbody>
          </table>

          <h4>Due Payments</h4>
          <table>
          <tr>
            <th>Payment ID</th>
            <th>{$data['pawn_item']->Amount}</th>
          </tr>
            <br>
          <tr>
          <th>Paid Date</th>
          <th>{$data['pawn_item']->End_Date}</th>
          </tr>

          </table>
              
        
          EOD;

          // Print text using writeHTMLCell()
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

          //$pdf->Output('example_001.pdf', 'I');
          $pdf->Output('my-document.pdf', 'D');       
         }

         public function responceMsg()  
         {
           isLoggedIn();
           $this->view("/Admin/add-success");
         }

        public function addNewStaffMember() {  

            //   isLoggedIn(); //checks whether user is already logged
              $staffMem = $this->model("staffModel");
              $NIC = $this->model('staffmodel');
              $row = $staffMem->emailExist($_POST["email"]);
              $row2 = $NIC->nicExist($_POST["nic"]);
              $phone = $this->model('staffmodel');
              $row3 = $phone->phoneExist($_POST["mob-no"]);
          
              $randPassword = $this->randomPassword();  //generate a random password
              $hash = password_hash($randPassword, PASSWORD_BCRYPT); //hash the password
              $id = $this->model('staffModel')->getStaffId($_POST['role']);
              ++$id;
              if ($staffMem->rowCount() > 0 or $NIC->rowCount()>0 or $phone->rowCount()>0) {
                if($staffMem->rowCount() > 0 and $NIC->rowCount()>0  and $phone->rowCount()>0){
                  flashMessage("NIC, Email and Phone Number already Exists");
                }
                else if($staffMem->rowCount() > 0 and $NIC->rowCount()>0){
                  flashMessage("Email and NIC already exist");
                } else if($staffMem->rowCount() > 0 and $phone->rowCount()>0){
                  flashMessage("Email and Phone number already exist");
                } else if($NIC->rowCount() > 0 and $phone->rowCount()>0){
                  flashMessage("NIC and Phone number already exist");
                }
                else if($NIC->rowCount()>0){
                  flashMessage("NIC already exists");
                }else if($staffMem->rowCount() > 0){
                  flashMessage("Email already exists");
                }else if($phone->rowCount() > 0){
                  flashMessage("Phone number already exist");
                }
               return redirect("/Admin/view_add_staff");
                
              } else {
                $staffMem = $this->model("staffModel");
                $result = $staffMem->addStaffMember($id,$_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['nic'], $_POST['dob'], $_POST['lane1'], $_POST['lane2'], $_POST['lane3'], $_POST['mob-no'], $_POST['mob-no2'], $_POST['email'], $_POST['role'], $_POST['image'], $hash);
        
                if ($result) {
                  $abc = sendMail($_POST['email'], "staff_reg", $randPassword, $_POST['fName'] . $_POST['lName']);
                  if($abc == null){
                    $staffMem = $this->model("staffModel");
                    $staffMem->deleteStaffMember($id);
                    flashMessage("Network Error Occurd..");
                    return redirect('/Admin/view_add_staff');
                  }else{
                    return  redirect('/Admin/responceMsg');        
                  }    
          
                }elseif($result == false) 
                  {
                    flashMessage("Something Wrong...");
                    return  redirect('/Admin/view_add_staff');
                  }
                else {
                    flashMessage("Something Wrong...");
                    return  redirect('/Admin/view_add_staff');

                }
              }
            }

          // Print locker details  PDF
            public function locker_download_pdf($lockerid) { 
          
                $currentReservations = $this->model('reservation')->getReservationsbyRetrieve($lockerid, 0);
                $previous_reservations = $this->model('reservation')->getReservationsbyRetrieve($lockerid, 1);
                $delivery = null;
                $currentpayment = null;
                $customer = null;
                if (!empty($currentReservations)) {
                        $delivery = $this->model('delivery')->deliveryByLocker($lockerid, $currentReservations[0]->Date);
                        $currentpayment = $this->model('payment')->filterReservationPayment($currentReservations);

                        $customerid = $currentReservations[0]->UserID;
                        $customer = $this->model('Customer')->getCustomerById($customerid);
                     
                }
                $extend = 0;
                if (!empty($currentReservations)) {
                        $interval = date_diff(date_create($currentReservations[0]->Retrieve_Date), date_create());
                        $date1 =  $currentReservations[0]->Retrieve_Date; // the date to check
                        $current_date = date('Y-m-d'); // the current date
                        $timeremain = $date1 < $current_date ? "Overdue" : $interval->format('%m months  %d days');
                        $tag = $timeremain == "Overdue" ? "tag red" : "";
                        if ($interval->days <= 30) {
                                $extend = 1;
                        }
                } else {
                        $tag = "";
                        $timeremain = "";
                }
                
                $data = [
                    'currentReservations' => $currentReservations,
                    'previous_reservations' => $previous_reservations,
                    'delivery' => $delivery,
                    'currentpayment' => $currentpayment,
                    'locker' => $lockerid,
                    'timeremain' => $timeremain,
                    'tag' => $tag,
                    'extend' => $extend,
                    'customer' => $customer
            ];
              
      
                /**
                 * Creates an example PDF TEST document using TCPDF
                 * @package com.tecnick.tcpdf
                 * @abstract TCPDF - Example: Default Header and Footer
                 * @author Nicola Asuni
                 * @since 2008-03-04
                 */
      
                // Include the main TCPDF library (search for installation path).
                require_once('tcpdf/tcpdf.php');
      
                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      
                // set default header data
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Locker Details'.'', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
                $pdf->setFooterData(array(0,64,0), array(0,64,128));
      
                // set header and footer fonts
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      
                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
      
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      
                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
      
                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
      
                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                    require_once(dirname(__FILE__).'/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }
      
                // set default font subsetting mode
                $pdf->setFontSubsetting(true);
    
                // helvetica or times to reduce file size.
                $pdf->SetFont('dejavusans', '', 14, '', true);
      
                // Add a page
                // This method has several options, check the source code documentation for more information.
                $pdf->AddPage();
      
                // set text shadow effect
              
                $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
         
                //Pass to date
                $border = '"border:1px solid black; font-size: 14px"';
                $Payment_History = "";
                $Payment_title = "";
                $Reservation = "";
                $Reservation_Date = "";
                $End_Date = "";
                $Key_Status = "";
                $Key_Released = "";
                $Customer_Details = "";

                if(!empty($data['currentReservations'])) {
                    $Payment_title = $Payment_title."<h4>{$data['customer']->UserId}'s Payments for Locker {$data['locker']}</h2>";
                }
                if (empty($data['currentReservations'])) {
                    $Payment_History = $Payment_History."<label>No reservations</label>";
                } else {
                    foreach($data['currentpayment'] as $key => $item) {
                        $Payment_History =  $Payment_History. "<tr><td style= $border>  $item->PID</td><td style=$border> $item->pdate</td><td style=$border>  Rs. $item->Amount</td><td style=$border>$item->Type</td></tr>";
                    }
                }
               

                if (empty($data['currentReservations'])) {
                  $Reservation =  $Reservation."<label>No reservations</label>";
                } else {
                  $Reservation_Date = $Reservation_Date.date("Y M d", strtotime($data['currentReservations'][0]->Date));
                  $End_Date = $End_Date.date("Y M d", strtotime($data['currentReservations'][0]->Retrieve_Date));

                  if ($data['currentReservations'][0]->Key_Status == 1) {

                      $Key_Status = $Key_Status. "Released";

                  } elseif ($data['currentReservations'][0]->Key_Status == 0) {

                    if ($data['delivery'][0]->Status = 1) {
                          $Key_Status = $Key_Status. "Deliverd";
                    } else {
                        $Key_Status = $Key_Status. "Not Deliverd";
                    }

                  }

                  $Key_Released = $Key_Released. date("Y M d", strtotime($data['currentReservations'][0]->Key_released_Date));
                
                  $Reservation =  $Reservation. "<tr><td style= $border>$Reservation_Date</td><td style=$border>$End_Date</td><td style=$border>{$data['timeremain']}</td><td style=$border>$Key_Status</td><td style=$border>$Key_Released</td></tr>";

                }

                if (empty($data['currentReservations'])) {
                  $Customer_Details = $Customer_Details."<label>No reservations</label>";
                } else {
                  $Customer_Details =  $Customer_Details. "<tr><td style= $border>{$data['customer']->UserId}</td><td style=$border>{$data['customer']->First_Name} {$data['customer']->Last_Name}</td><td style=$border>{$data['customer']->phone}</td></tr>";
                }

      
                $html = <<<EOD
      
                <h4>Customer Details</h4>
      
                <table>
                  <thead>
                  <tr>
                    <th style="border:1px solid black;text-align: center;">Customer Id</th>
                    <th style="border:1px solid black;text-align: center;">Customer Name</th>
                    <th style="border:1px solid black;text-align: center;">Phone Number</th>
                  </tr>
                  </thead>
                  <tbody>
                  $Customer_Details
                  </tbody>
                </table>

                <h4>Reservation</h4>
      
                <table>
                  <thead>
                  <tr>
                    <th style="border:1px solid black;text-align: center;">Reservation Date</th>
                    <th style="border:1px solid black;text-align: center;">End Date</th>
                    <th style="border:1px solid black;text-align: center;">Time remaining</th>
                    <th style="border:1px solid black;text-align: center;">Key Status</th>
                    <th style="border:1px solid black;text-align: center;">Key Released</th>
                  </tr>
                  </thead>
                  <tbody>
                  $Reservation
                  </tbody>
                </table>
                
                $Payment_title
      
                <table>
                  <thead>
                  <tr>
                    <th style="border:1px solid black;text-align: center;">Pay ID</th>
                    <th style="border:1px solid black;text-align: center;">Paid Date</th>
                    <th style="border:1px solid black;text-align: center;">Amount</th>
                    <th style="border:1px solid black;text-align: center;">Type</th>
                  </tr>
                  </thead>
                  <tbody>
                  $Payment_History
                  </tbody>
                </table>

                EOD;
      
                // Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
      
                //$pdf->Output('example_001.pdf', 'I');
                $pdf->Output('Locker_Details.pdf', 'D');       
            }  
        
    }

    

