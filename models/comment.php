<?php

class comment {
    private $pdo;
    private $table = "commentaires";

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getApprovedByArticle($articleId){
        $sql = "SELECT * FROM {$this->table}
        WHERE article_id = ? AND statut = 'approuve'
        ORDER BY created_at DESC";

        
    }
    
}


?>