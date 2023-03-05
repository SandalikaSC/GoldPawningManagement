<?php
    class goldAppraiser extends Controller
    {
        public function __construct()
        {
            $this->goldAppraiserModel = $this->model('goldAppModel');
        }

        public function dashboard() {
            $articles_to_validate = $this->goldAppraiserModel->not_validated_articles();

            $data = [
                'articles_to_validate' => $articles_to_validate
            ];

            $this->view('GoldAppraiser/goldappDash', $data);
        }

        public function view_validated_articles() {
            $validated_articles = $this->goldAppraiserModel->getValidatedArticles();

            $data = [
                'validated_articles' => $validated_articles
            ];

            $this->view('GoldAppraiser/view_validated_articles', $data);
        }

        public function validate_articles($id) {
            $article = $this->goldAppraiserModel->getArticleByID($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'article_details' => $article,
                    'weight' => trim($_POST['weight']),
                    'karats' => trim($_POST['karats']),
                    // 'estimated_value' => trim($_POST['estimated-value']),
                    'validation_status' => trim($_POST['status']),
                    'weight_err' => '',
                    'karats_err' => '',
                    // 'estimated_value_err' => '',
                ];

                if(empty($data['weight'])) {
                    $data['weight_err'] = 'Please enter the weight of the article';
                }

                if(empty($data['karats'])) {
                    $data['karats_err'] = 'Please enter the karat value';
                }

                if(empty($data['weight_err']) && empty($data['karats_err'])) {
                    $success = $this->goldAppraiserModel->validateNewArticles($data);
                } else {
                    $this->view('GoldAppraiser/validate_new_articles', $data);
                }

            } else {
                $data = [
                    'article_details' => $article,
                    'weight' => '',
                    'karats' => '',
                    // 'estimated_value' => '',
                    'validation_status' => '',
                    'weight_err' => '',
                    'karats_err' => '',
                    // 'estimated_value_err' => '',
                ];
    
                $this->view('GoldAppraiser/validate_new_articles', $data);
            }            
        }       
    }