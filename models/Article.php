<?php

class Article {

    private $pdo;
    private $table = "articles";

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {

        $sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {

        $sql = "SELECT * FROM {$this->table} WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {

        $sql = "INSERT INTO {$this->table}
       (titre, resume, contenu, categorie, image_url, auteur, vues)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
         $data["titre"],
         $data["resume"],
         $data["contenu"],
         $data["categorie"],
         $data["image_url"],
<<<<<<< HEAD
         $data["auteur"],
    
=======
    "Admin",
>>>>>>> 2a5e71f (add all files from walid)
    0
]);
    }

    public function update($id, $data) {

    $sql = "UPDATE {$this->table}
    SET titre = ?, auteur = ?, resume = ?, contenu = ?, categorie = ?, image_url = ?, tags = ?
    WHERE id = ?";

<<<<<<< HEAD
    $stmt = $this->pdo->prepare($sql
    );
=======
    $stmt = $this->pdo->prepare($sql);
>>>>>>> 2a5e71f (add all files from walid)

    return $stmt->execute([
        $data["titre"],
        $data["auteur"],
        $data["resume"],
        $data["contenu"],
        $data["categorie"],
        $data["image_url"],
        $data["tags"] ?? "",
        $id
    ]);
}

    public function delete($id) {

        $sql = "DELETE FROM {$this->table} WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }
<<<<<<< HEAD

    public function incrementViews($id) {
    $sql = "UPDATE {$this->table} SET vues = vues + 1 WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([$id]);
}
=======
>>>>>>> 2a5e71f (add all files from walid)
}