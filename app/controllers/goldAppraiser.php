<?php
    class goldAppraiser extends Controller
    {
        public function __construct()
        {
            $this->goldAppraiserModel = $this->model('goldAppModel');
        }


        // Gold appraiser dashboard
        public function dashboard() {
            $articles_to_validate = $this->goldAppraiserModel->not_validated_articles();

            $data = [
                'articles_to_validate' => $articles_to_validate
            ];

            $this->view('GoldAppraiser/goldappDash', $data);
        }

        // Viewing details of the articles that are already validated
        public function view_validated_articles() {
            $validated_articles = $this->goldAppraiserModel->getValidatedArticles();

            $data = [
                'validated_articles' => $validated_articles
            ];

            $this->view('GoldAppraiser/view_validated_articles', $data);
        }

        // Validate articles
        public function validate_articles($id) {
            $article = $this->goldAppraiserModel->getArticleByID($id);
            $gold_rates = $this->goldAppraiserModel->getGoldRates();

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'validation_id' => $id,
                    'gold_rates' => $gold_rates,
                    'article_details' => $article,
                    'weight' => trim($_POST['weight']),
                    'karats' => trim($_POST['carats']),
                    'unit' => $_POST['unit'],
                    'estimated_value' => '',
                    'validation_status' => '',
                    'weight_err' => '',
                    'karats_err' => '',
                    'unit_err' => '',
                    // 'estimated_value_err' => '',
                ];

                $weight = $data['weight'];
                $carats = $data['karats'];
                $carat_value = 0.00;
                $unit = $data['unit'];
                $estimate_value = 0.00;

                foreach($data['gold_rates'] as $rates) : 
                    if($carats == $rates->Karatage) {
                        $carat_value = $rates->Price;
                    } 
                endforeach;
                if(!$carat_value) {
                    $data['karats_err'] = "Enter valid carat value";
                }

                if($unit) {
                    $gram_price = $carat_value / 8;

                    if($unit == "ounce") {
                        $weight = (float)$weight * 31;
                    }

                    $pure_gold_price = (float)$weight * $gram_price;

                    $estimate_value = $pure_gold_price * (float)$carats / 24;
                    $estimate_value = number_format($estimate_value,  2, '.', '');
                } 

                
                if(empty($data['weight']) && empty($data['unit'])) {
                    $data['weight_err'] = "Please enter the article weight and weight unit";
                } elseif(empty($data['unit'])) {
                    $data['weight_err'] = "Please enter a unit";
                } elseif(empty($data['weight'])) {
                    $data['weight_err'] = "Please enter the article weight";
                }

                if(empty($data['karats'])) {
                    $data['karats_err'] = "Please enter the carat value";
                }

                if(empty($data['weight_err']) && empty($data['karats_err'])) {
                    $data['estimated_value'] = $estimate_value; 
                    if(isset($_POST['calculate'])) {
                        $this->view('GoldAppraiser/validate_new_articles', $data);
                    }

                    if(isset($_POST['save'])) {
                        $data['validation_status'] = trim($_POST['status']);
                        redirect('/goldAppraiser/dashboard');
                        // $this->view('GoldAppraiser/validate_new_articles', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('GoldAppraiser/validate_new_articles', $data);
                }

                
                

                // if(isset($_POST['calculate'])) {
                //     // $data = [
                //     //     'validation_id' => $id,
                //     //     'gold_rates' => $gold_rates,
                //     //     'article_details' => $article,
                //     //     'weight' => trim($_POST['weight']),
                //     //     'karats' => trim($_POST['carats']),
                //     //     'unit' => trim($_POST['unit']),
                //     //     'estimated_value' => '',
                //     //     'validation_status' => '',
                //     //     'weight_err' => '',
                //     //     'karats_err' => '',
                //     //     'unit_err' => '',
                //     //     // 'estimated_value_err' => '',
                //     // ];

                    

                //     foreach($data['gold_rates'] as $rates) : 
                //         if($carats == $rates->Karatage) {
                //             $carat_value = $rates->Price;
                //         }
                //     endforeach;

                //     if($unit) {
                //         $gram_price = $carat_value / 8;

                //         if($unit == "ounce") {
                //             $weight = $weight * 31;
                //         }

                //         $pure_gold_price = $weight * $gram_price;

                //         $estimate_value = $pure_gold_price * $carats / 24;
                //         $estimate_value = number_format($estimate_value,  2, '.', '');
                //     }                   
                // }

                

                // if(empty($data['weight']) && empty($data['unit'])) {
                //     $data['weight_err'] = "Please enter the weight and weight unit of the article";
                // } elseif(empty($data['weight'])) {
                //     $data['weight_err'] = 'Please enter the weight of the article';
                // } elseif(empty($data['unit'])) {
                //     $data['weight_err'] = "Please select a weight unit";
                // }                

                // if(empty($data['karats'])) {
                //     $data['karats_err'] = 'Please enter the karat value';
                // }                

                // if(empty($data['weight_err']) && empty($data['karats_err'])) {
                //     $success = $this->goldAppraiserModel->validateNewArticles($data);
                // } else {
                //     $this->view('GoldAppraiser/validate_new_articles', $data);
                // }

            } else {
                $data = [
                    'validation_id' => $id,
                    'gold_rates' => $gold_rates,
                    'article_details' => $article,
                    'weight' => '',
                    'karats' => '',
                    'unit' => '',
                    'estimated_value' => '',
                    'validation_status' => '',
                    'weight_err' => '',
                    'karats_err' => '',
                    'unit_err' => '',
                    // 'estimated_value_err' => '',
                ];
    
                $this->view('GoldAppraiser/validate_new_articles', $data);
            }            
        }       
    }