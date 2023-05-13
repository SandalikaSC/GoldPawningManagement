<?php
class CustomerPawn extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/Users');
        }
        $this->customerPawnModel = $this->model('Pawning');
        $this->interestModel = $this->model('interest');
        $this->articleModel = $this->model('article');
        $this->deliveryModel = $this->model('delivery');
        $this->loanModel = $this->model('loan');
        $this->appointment = $this->model('Appointment');
        $this->paymentmodel = $this->model('payment');
        $this->lockermodel = $this->model('Locker');
        $this->reservationModel = $this->model('reservation');
    }



    public function index()
    {
        $checked = isset($_POST['check-substitution-2']) ? $_POST['check-substitution-2'] : 1;
        $data = [
            'pawnings' => array(null),
            'checked' => $checked
        ];
        $pawning = $this->customerPawnModel->getPawnByUserID($_SESSION['user_id']);
        foreach ($pawning as $pawn) {
            // Check the status of the pawn and set the status field accordingly
            if ($pawn->Status == 'Completed' || $pawn->Status == 'Retrieved') {
                if (empty($pawn->Redeemed_Date)) {
                    $pawn->updated_status = 'Completed';
                } else {
                    $pawn->updated_status = 'Retrieved';
                }
            } else  if ($pawn->Status == 'Auctioned') {
                $pawn->updated_status = 'Auctioned';
            } else if ($pawn->Status == 'Pawned') {
                $current_date = date('Y-m-d');
                $retrieve_date = $pawn->End_Date;
                if (strtotime($retrieve_date) < strtotime($current_date)) {
                    $pawn->updated_status = 'Overdue';
                } else {
                    $pawn->updated_status = 'Pawned';
                }
            } else if ($pawn->Status == 'Repawn') {
                $pawn->updated_status = 'Repawn';
            }
        }

        switch ($checked) {
            case 2:
                for ($i = count($pawning) - 1; $i >= 0; $i--) { 
                    if ($pawning[$i]->updated_status != "Pawned") {
                        array_splice($pawning, $i, 1);
                    }
                }

                break;
            case 3:
                for ($i = count($pawning) - 1; $i >= 0; $i--) { 
                    if ($pawning[$i]->updated_status != "Overdue") {
                        array_splice($pawning, $i, 1);
                    }
                }
                break;
            case 4:
                for ($i = count($pawning) - 1; $i >= 0; $i--) { 
                    if ($pawning[$i]->updated_status != "Retrieved") {
                        array_splice($pawning, $i, 1);
                    }
                }
                break;
            case 5:
                for ($i = count($pawning) - 1; $i >= 0; $i--) { 
                    if ($pawning[$i]->updated_status != "Repawn") {
                        array_splice($pawning, $i, 1);
                    }
                }
                break;
        }



        $data = [
            'pawnings' => $pawning,
            'checked' => $checked
        ];


        $this->view('Customer/pawnArticles', $data);
    }
    public function viewPawnArticle($pawn_id)
    {


        $pawning = $this->customerPawnModel->goldLoanDetails($pawn_id);
        $paid = $this->paymentmodel->paidAmount($pawn_id);
        $paid->Paid = ceil($paid->Paid);

        $paidPrinciple = $this->paymentmodel->paidPrincipleAmount($pawn_id);
        $paidPrinciple->PaidPrinciple = ceil($paidPrinciple->PaidPrinciple);

        $interestAmount = $pawning->Amount * $pawning->Interest / 100;
        $payment = $this->paymentmodel->getPawnPayments($pawn_id);

        if ($pawning->Status == 'Completed' || $pawning->Status == 'Retrieved') {
            if (empty($pawning->Redeemed_Date)) {
                $status = 'Completed';
            } else {
                $status = 'Retrieved';
            }
        } else  if ($pawning->Status == 'Auctioned') {
            $status = 'Auctioned';
        } else if ($pawning->Status == 'Pawned') {
            $current_date = date('Y-m-d');
            $retrieve_date = $pawning->End_Date;
            if (strtotime($retrieve_date) < strtotime($current_date)) {
                $status = 'Overdue';
            } else {
                $status = 'Pawned';
            }
        } else if ($pawning->Status == 'Repawn') {
            $status = 'Repawn';
        }

        $data = [
            'goldLoan' => $pawning,
            'paid' => $paid->Paid,
            'paidPrinciple' => $paidPrinciple->PaidPrinciple,
            'status' => $status,
            'payment' => $payment,
            'interestAmount' => $interestAmount
        ];
        $this->view('Customer/article_pawn', $data);
    }
    public function makePayment($pawn_id)
    {
        //     $locker = $this->lockermodel->AvailableCustomerArticles($_SESSION['user_id']);

        //     if (empty($locker)) {
        //         $locker = $this->lockermodel->getAvailableLocker();
        //     }

        $pawning = $this->customerPawnModel->getPawnById($pawn_id);
        $article = $this->articleModel->getArticleById($pawning->Article_Id);
        $loan = $this->loanModel->getLoanByPawnId($pawn_id);

        $paid = $this->paymentmodel->paidAmount($pawn_id);
        $paid->Paid = ceil($paid->Paid);

        $principle = $this->paymentmodel->paidPrincipleAmount($pawn_id);
        $principle->PaidPrinciple = ceil($principle->PaidPrinciple);

        $payment = $this->paymentmodel->getPawnPayments($pawn_id);

        $pawnInterest = $this->interestModel->getPawnInterest()->Interest_Rate;
        $reserveInterest = $this->interestModel->getAllocationInterest()->Interest_Rate;
        $delivery = $this->interestModel->getdelivaryRate()->Interest_Rate;

        $mylockers = $this->lockermodel->AvailableCustomerArticles($_SESSION['user_id']); //get available customer lockers


        $locker = $this->lockermodel->getAvailableLocker(); //get available lockes


        $tomorrow = new DateTime('tomorrow');
        $tomorrowFormatted = $tomorrow->format('Y-m-d');
        $timeSlots = $this->appointment->getSlotsNotIn($tomorrowFormatted);

        $status = $pawning->Status;
        // if (strtotime($pawning->End_Date) < time()) {

        //     $status = 'Overdue';
        // }
        if ($pawning->Status == 'Completed' || $pawning->Status == 'Retrieved') {
            if (empty($pawning->Redeemed_Date)) {
                $status = 'Completed';
            } else {
                $status = 'Retrieved';
            }
        } else  if ($pawning->Status == 'Auctioned') {
            $status = 'Auctioned';
        } else if ($pawning->Status == 'Pawned') {
            $current_date = date('Y-m-d');
            $retrieve_date = $pawning->End_Date;

            if ($pawning->WarningOne == 1 || $pawning->WarningTwo == 1) {
            }
            if (strtotime($retrieve_date) < strtotime($current_date)) {
                $status = 'Overdue';
            } else if ($pawning->WarningOne == 1 || $pawning->WarningTwo == 1) {
                $status = 'Overdue';
            } else {
                $status = 'Pawned';
            }
        }
        $toPayInst = 0;
        if ($loan->Repay_Method == 'Fixed') {
            $toPayInst = 12 - $paid->Paid / $loan->monthly_installment;
        }
        $today = date('Y-m-d'); // Get today's date in 'YYYY-MM-DD' format
        $extendto = date('Y-m-d', strtotime('+6 months', strtotime($today)));
       $topayPrinciple=$loan->Amount-$principle->PaidPrinciple;

            $data = [
                'pawning' => $pawning,
                'locker' => $locker,
                'loan' => $loan,
                'extendTo' => $extendto,
                'locker' => $locker,
                'mylockers' => $mylockers,
                'article' => $article,
                'payment' => $payment,
                'status' => $status,
                'pawnInterest' => $pawnInterest,
                'reserveInterest' => $reserveInterest,
                'delivery' => $delivery,
                'paid' => $paid->Paid,
                'topayPrinciple' => $topayPrinciple,
                'toPayInst' => $toPayInst,
                'principle' => $principle->PaidPrinciple,
                'timeslot' => $timeSlots
            ];

        $this->view('Customer/Pawn-pay', $data);
    }
    public function getTimeSlots()
    {

        if (isset($_POST["date"])) {
            $date =  $_POST["date"];
            $data = $this->appointment->getSlotsNotIn($date);

            echo json_encode($data);
        }
    }


    public function PawnOnlinePay($pawnId, $amount)
    {
        $order_id = uniqid();
        $currency = "LKR";

        $data = [];
        $data['hash'] = strtoupper(md5(
            merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5(merchant_secret))
        ));
        $data['merchant_id'] = merchant_id;
        $data['order_id'] = $order_id;
        $data['reservationId'] = $pawnId;
        $data['amount'] =  number_format($amount, 2, '.', '');
        $data['currency'] = $currency;
        $data['merchant_secret'] = merchant_secret;
        $data['items'] = "Pawn Id " . $pawnId;
        $data['first_name'] = $_SESSION['user_fname'];
        $data['last_name'] = $_SESSION['user_lname'];
        $data['email'] = $_SESSION['user_email'];
        $data['phone'] = $_SESSION['user_phone'];
        $data['address'] = $_SESSION['user_address'];
        $data['city'] = "Colombo";
        $data['country'] = "Sri Lanka";
        $data['delivery_address'] = "VoguePawn";
        $data['delivery_city'] = "Colombo";
        $data['delivery_country'] = "Sri Lanka";


        echo json_encode($data);
    }

    public function savePawnPayment()
    {
        $pawnId = $_GET['pawnId'];
        $pawnProcess = $_GET['pawnProcess'];
        $payment = $_GET['payment'];
        $myLocker = $_GET['myLocker'];
        $availableLocker = $_GET['availableLocker'];
        $orderId = $_GET['orderid'];


        $pawnStatus = $pawnProcess['pawnStatus'];
        $loanStatus = $pawnProcess['loanPay'];
        $RetrieveStatus = $pawnProcess['retrieve'];
        $RepawnStatus = $pawnProcess['Repawn'];

        $_SESSION['payment'] = $payment;




        echo json_encode($payment['amount'] . $pawnId . $payment['Principle'] . $orderId);
        if ($pawnStatus == "Pawned") {

            if ($loanStatus == "Full") {
                if ($RetrieveStatus == "Visit") {
                    // add payment
                    $status = $this->paymentmodel->addOnlinePawnPayment($payment['amount'], $pawnId, $payment['Principle'], $orderId);

                    // update pawn as completed
                    if ($status) {

                        $this->customerPawnModel->updateCompletedLoanStatus($pawnId);
                        notification("Pawn", "Successfully repaid the entire loan", "gold");
                        echo json_encode($pawnId);
                    } else {
                        notification("Pawn", "Something went wrong", "red");
                        echo json_encode(0);
                    }
                } else {
                    if (!empty($myLocker)) {
                        //add payment
                        // status update
                        //add reserve table data
                        //set locker not available
                        // echo json_encode( $myLocker['locker'].$myLocker['retrieve_date'].$payment['amount']);
                        $status = $this->paymentmodel->addOnlinePawnPayment($payment['amount'], $pawnId, $payment['Principle'], $orderId);
                        if ($status) {
                            $this->customerPawnModel->updateCompletedLoanStatus($pawnId);
                            $pawninfo = $this->customerPawnModel->getPawnById($pawnId);
                            $data = [
                                'lockerNo' => $myLocker['locker'],
                                'customer' => $_SESSION['user_id'],
                                'pawn_officer_or_vault_keeper' =>  "VK002",
                                'gold_appraiser' =>  $pawninfo->Appraiser_Id
                            ];
                            $status = $this->reservationModel->addLockerReserved($data,  $pawninfo->Article_Id);
                            if ($status) {
                                $this->lockermodel->updateLockerArticles($myLocker['locker'], "Not Available");
                                notification("Pawn", "Successfully repaid the entire loan <br> Article allocated to the locker", "gold");
                                echo json_encode($pawnId);
                            } else {
                                notification("Pawn", "Something went wrong", "red");
                                echo json_encode(0);
                            }
                        } else {
                            notification("Pawn", "Something went wrong", "red");
                            echo json_encode(0);
                        }
                    } else {
                        //add payment
                        //add reserve table data
                        //set locker update   
                        //add locker payment  
                        //add delivery details
                        $status = $this->paymentmodel->addOnlinePawnPayment($payment['amount'], $pawnId, $payment['Principle'], $orderId);
                        if ($status) {
                            $this->customerPawnModel->updateCompletedLoanStatus($pawnId);
                            $pawninfo = $this->customerPawnModel->getPawnById($pawnId);

                            //update locker
                            $this->lockermodel->updateLockerArticles($availableLocker['locker'], "Available");
                            //insert delivery
                            $this->deliveryModel->insertDelivery($availableLocker['locker']);
                            //insert reservation

                            $data = [
                                'lockerNo' => $availableLocker['locker'],
                                'customer' => $_SESSION['user_id'],
                                'pawn_officer_or_vault_keeper' =>  "VK002",
                                'gold_appraiser' =>  $pawninfo->Appraiser_Id

                            ];
                            $retrieveDate = $availableLocker['retrieve_date'];
                            $amount = $availableLocker['payment'];
                            $reserveId = $this->reservationModel->addNewReservation($data, $pawninfo->Article_Id, $retrieveDate, $amount);
                            if ($reserveId) {

                                $this->paymentmodel->addOnlineLockerPayment($amount + $availableLocker['delivery'], $reserveId, $orderId);

                                notification("Pawn", "Successfully repaid the entire loan <br> Article allocated to the locker", "gold");
                                echo json_encode($pawnId);
                            } else {
                                notification("Pawn", "Something went wrong", "red");
                                echo json_encode(0);
                            }
                        } else {
                            notification("Pawn", "Something went wrong", "red");
                            echo json_encode(0);
                        }
                    }
                }
            } else {
                //add payment details
                $status = $this->paymentmodel->addOnlinePawnPayment($payment['amount'], $pawnId, $payment['Principle'], $orderId);


                if ($status) {

                    notification("Pawn", "Installemet paid successfully", "gold");
                    echo json_encode($pawnId);
                } else {
                    notification("Pawn", "Something went wrong", "red");
                    echo json_encode(0);
                }
            }
        } else if ($pawnStatus == "Overdue") {
            if ($RepawnStatus == 1) {
                // add payment
                $status = $this->paymentmodel->addOnlinePawnPayment($payment['amount'], $pawnId, $payment['Principle'], $orderId);

                //upate pawn as repawn 
                // add loan pawn new details 
                if ($status) {
                    $pawninfo = $this->customerPawnModel->getPawnById($pawnId);
                    $loaninfo = $this->loanModel->getLoanByPawnId($pawnId);
                    $this->customerPawnModel->updateRePawnLoanStatus($pawnId);

                    $pawn = [
                        'Article_id' => $pawninfo->Article_Id,
                        'appraiser' => $pawninfo->Appraiser_Id,
                        'officer' => $pawninfo->Officer_Id

                    ];


                    //calculate new loan infomation
                    $newPawnId = $this->customerPawnModel->RepawnOnline($pawn);
                    if ($newPawnId) {
                        if ($loaninfo->Repay_Method == "Fixed") {

                            $monthly_installment = $payment['PrincipletobePaid'] * ($loaninfo->Interest + 100) / 100 / 12;
                        } else {
                            $monthly_installment = 0;
                        }

                        $loan = [
                            'Amount' => $payment['PrincipletobePaid'],
                            'Interest' => $loaninfo->Interest,
                            'Repay_Method' => $loaninfo->Repay_Method,
                            'Pawn_Id' =>  $newPawnId,
                            'interest_ID' => $loaninfo->interest_ID,
                            'monthly_installment' =>  $monthly_installment
                        ];
                        $status = $this->loanModel->insertRepawnLoan($loan);
                        if ($status) {
                            notification("Pawn", "Your gold loan has been successfully renewed.", "gold");
                            echo json_encode($newPawnId);
                        } else {
                            notification("Pawn", "Something went wrong", "red");
                            echo json_encode(0);
                        }
                    } else {
                        notification("Pawn", "Something went wrong", "red");
                        echo json_encode(0);
                    }
                } else {
                    notification("Pawn", "Something went wrong", "red");
                    echo json_encode(0);
                }
            } else {

                // if ($RetrieveStatus == "Visit") {
                //     //add payment
                //     //update pawn as completed
                // } else {
                //     if (!empty($myLocker)) {
                //         //add payment
                //         //add reserve table data
                //         //set locker not available
                //     } else {
                //         //add payment
                //         //add locker payment
                //         //add reserve table data
                //         //set locker update    
                //         //add delivery details
                //     }
                // }
                if ($RetrieveStatus == "Visit") {
                    // add payment
                    $status = $this->paymentmodel->addOnlinePawnPayment($payment['amount'], $pawnId, $payment['Principle'], $orderId);

                    // update pawn as completed
                    if ($status) {

                        $this->customerPawnModel->updateCompletedLoanStatus($pawnId);
                        notification("Pawn", "Successfully repaid the entire loan", "gold");
                        echo json_encode($pawnId);
                    } else {
                        notification("Pawn", "Something went wrong", "red");
                        echo json_encode(0);
                    }
                } else {
                    if (!empty($myLocker)) {
                        //add payment
                        // status update
                        //add reserve table data
                        //set locker not available
                        // echo json_encode( $myLocker['locker'].$myLocker['retrieve_date'].$payment['amount']);
                        $status = $this->paymentmodel->addOnlinePawnPayment($payment['amount'], $pawnId, $payment['Principle'], $orderId);
                        if ($status) {
                            $this->customerPawnModel->updateCompletedLoanStatus($pawnId);
                            $pawninfo = $this->customerPawnModel->getPawnById($pawnId);
                            $data = [
                                'lockerNo' => $myLocker['locker'],
                                'customer' => $_SESSION['user_id'],
                                'pawn_officer_or_vault_keeper' =>  "VK002",
                                'gold_appraiser' =>  $pawninfo->Appraiser_Id
                            ];
                            $status = $this->reservationModel->addLockerReserved($data,  $pawninfo->Article_Id);
                            if ($status) {
                                $this->lockermodel->updateLockerArticles($myLocker['locker'], "Not Available");
                                notification("Pawn", "Successfully repaid the entire loan <br> Article allocated to the locker", "gold");
                                echo json_encode($pawnId);
                            } else {
                                notification("Pawn", "Something went wrong", "red");
                                echo json_encode(0);
                            }
                        } else {
                            notification("Pawn", "Something went wrong", "red");
                            echo json_encode(0);
                        }
                    } else {
                        //add payment
                        //add reserve table data
                        //set locker update   
                        //add locker payment  
                        //add delivery details
                        $status = $this->paymentmodel->addOnlinePawnPayment($payment['amount'], $pawnId, $payment['Principle'], $orderId);
                        if ($status) {
                            $this->customerPawnModel->updateCompletedLoanStatus($pawnId);
                            $pawninfo = $this->customerPawnModel->getPawnById($pawnId);

                            //update locker
                            $this->lockermodel->updateLockerArticles($availableLocker['locker'], "Available");
                            //insert delivery
                            $this->deliveryModel->insertDelivery($availableLocker['locker']);
                            //insert reservation

                            $data = [
                                'lockerNo' => $availableLocker['locker'],
                                'customer' => $_SESSION['user_id'],
                                'pawn_officer_or_vault_keeper' =>  "VK002",
                                'gold_appraiser' =>  $pawninfo->Appraiser_Id

                            ];
                            $retrieveDate = $availableLocker['retrieve_date'];
                            $amount = $availableLocker['payment'];
                            $reserveId = $this->reservationModel->addNewReservation($data, $pawninfo->Article_Id, $retrieveDate, $amount);
                            if ($reserveId) {

                                $this->paymentmodel->addOnlineLockerPayment($amount + $availableLocker['delivery'], $reserveId, $orderId);

                                notification("Pawn", "Successfully repaid the entire loan <br> Article allocated to the locker", "gold");
                                echo json_encode($pawnId);
                            } else {
                                notification("Pawn", "Something went wrong", "red");
                                echo json_encode(0);
                            }
                        } else {
                            notification("Pawn", "Something went wrong", "red");
                            echo json_encode(0);
                        }
                    }
                }
            }
        }
    }
    public function geneartePdf()
    {
        printReciept();
        unset($_SESSION['payment']);
    }

}
