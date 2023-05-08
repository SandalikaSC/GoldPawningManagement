<?php
class article
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getArticleById($articleId)
    {
        $this->db->query('SELECT * FROM article where Article_Id=:articleId');
        $this->db->bind(':articleId', $articleId);
        $results = $this->db->single();

        return $results;
    }
    public function getLastId()
    {
        $this->db->query('SELECT * FROM article ORDER BY Article_Id  DESC limit 1');
        $result = $this->db->single();
        if (empty($result)) {

            return 'A000';
        } else {
            return $result->Article_Id;
        }
    }
    public function addArticle($data,$rate) 
    {
        $lastId = $this->getLastId();
        ++$lastId;
        $this->db->query('INSERT INTO article(Article_Id,Estimated_Value,Karatage,Weight,Type,Karatage_Price,Rate_Id,image) 
                                VALUES(:Article_Id,:Estimated_Value,:Karatage,:Weight,:Type,:Karatage_Price,:Rate_Id,:image)');

        // Bind values

        $this->db->bind(':Article_Id', $lastId);
        $this->db->bind(':Estimated_Value', $data['estimated_value']);
        $this->db->bind(':Karatage', $data['karatage']);
        $this->db->bind(':Weight', $data['weight']);
        $this->db->bind(':Type', $data['article_type']);
        $this->db->bind(':Karatage_Price', $rate->Price);
        $this->db->bind(':Rate_Id', $rate->Rate_Id);
        $this->db->bind(':image', $data['image']);
        // $this->db->bind(':desc', $data['complaint']);



        // Execute
        if ($this->db->execute()) {

            return $lastId;
        } else {
            return null;
        }
    }
}
