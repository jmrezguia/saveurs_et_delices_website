<?php

class Article {

    private $pdo;
    private $table = "articles";

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $sql = "SELECT 
                    articles.*,
                    categories.nom AS categorie,
                    GROUP_CONCAT(tags.nom SEPARATOR ',') AS tags
                FROM articles
                LEFT JOIN categories 
                    ON articles.id_categorie = categories.id_categories
                LEFT JOIN article_tag 
                    ON articles.id = article_tag.id_article
                LEFT JOIN tags 
                    ON article_tag.id_tag = tags.id_tag
                GROUP BY articles.id
                ORDER BY articles.created_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT 
                    articles.*,
                    categories.nom AS categorie,
                    GROUP_CONCAT(tags.nom SEPARATOR ',') AS tags
                FROM articles
                LEFT JOIN categories 
                    ON articles.id_categorie = categories.id_categories
                LEFT JOIN article_tag 
                    ON articles.id = article_tag.id_article
                LEFT JOIN tags 
                    ON article_tag.id_tag = tags.id_tag
                WHERE articles.id = ?
                GROUP BY articles.id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByCategory($idCategorie) {
        $sql = "SELECT 
                    articles.*,
                    categories.nom AS categorie,
                    GROUP_CONCAT(tags.nom SEPARATOR ',') AS tags
                FROM articles
                LEFT JOIN categories 
                    ON articles.id_categorie = categories.id_categories
                LEFT JOIN article_tag 
                    ON articles.id = article_tag.id_article
                LEFT JOIN tags 
                    ON article_tag.id_tag = tags.id_tag
                WHERE articles.id_categorie = ?
                GROUP BY articles.id
                ORDER BY articles.created_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$idCategorie]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table}
                (
                    titre,
                    resume,
                    ingredients,
                    preparation,
                    cuisson,
                    contenu,
                    id_categorie,
                    image_url,
                    auteur,
                    vues
                )
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        $success = $stmt->execute([
            $data["titre"],
            $data["resume"],
            $data["ingredients"],
            $data["preparation"],
            $data["cuisson"],
            $data["contenu"],
            $data["id_categorie"],
            $data["image_url"],
            $data["auteur"],
            0
        ]);

        if ($success) {
            $articleId = $this->pdo->lastInsertId();
            $this->saveTags($articleId, $data["tags"] ?? "");
        }

        return $success;
    }

    public function update($id, $data) {
        $sql = "UPDATE {$this->table}
                SET titre = ?,
                    auteur = ?,
                    resume = ?,
                    ingredients = ?,
                    preparation = ?,
                    cuisson = ?,
                    contenu = ?,
                    id_categorie = ?,
                    image_url = ?
                WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);

        $success = $stmt->execute([
            $data["titre"],
            $data["auteur"],
            $data["resume"],
            $data["ingredients"],
            $data["preparation"],
            $data["cuisson"],
            $data["contenu"],
            $data["id_categorie"],
            $data["image_url"],
            $id
        ]);

        if ($success) {
            $this->deleteArticleTags($id);
            $this->saveTags($id, $data["tags"] ?? "");
        }

        return $success;
    }

    public function delete($id) {
        $this->deleteArticleTags($id);

        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }

    public function incrementViews($id) {
        $sql = "UPDATE {$this->table} SET vues = vues + 1 WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }

    private function saveTags($articleId, $tagsString) {
        if (empty($tagsString)) {
            return;
        }

        $tags = explode(",", $tagsString);

        foreach ($tags as $tagName) {
            $tagName = trim($tagName);

            if ($tagName === "") {
                continue;
            }

            $tagId = $this->getOrCreateTag($tagName);
            $this->attachTagToArticle($articleId, $tagId);
        }
    }

    private function getOrCreateTag($tagName) {
        $sql = "SELECT id_tag FROM tags WHERE nom = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$tagName]);

        $tag = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($tag) {
            return $tag["id_tag"];
        }

        $sql = "INSERT INTO tags (nom) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$tagName]);

        return $this->pdo->lastInsertId();
    }

    private function attachTagToArticle($articleId, $tagId) {
        $sql = "INSERT IGNORE INTO article_tag (id_article, id_tag)
                VALUES (?, ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$articleId, $tagId]);
    }

    private function deleteArticleTags($articleId) {
        $sql = "DELETE FROM article_tag WHERE id_article = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$articleId]);
    }

    public function search($keyword) {

    $sql = "SELECT
                articles.*,
                categories.nom AS categorie,
                GROUP_CONCAT(tags.nom SEPARATOR ',') AS tags
            FROM articles
            LEFT JOIN categories
                ON articles.id_categorie = categories.id_categories
            LEFT JOIN article_tag
                ON articles.id = article_tag.id_article
            LEFT JOIN tags
                ON article_tag.id_tag = tags.id_tag
            WHERE articles.titre LIKE ?
               OR articles.resume LIKE ?
               OR articles.contenu LIKE ?
               OR tags.nom LIKE ?
            GROUP BY articles.id
            ORDER BY articles.created_at DESC";

    $stmt = $this->pdo->prepare($sql);

    $search = "%" . $keyword . "%";

    $stmt->execute([
        $search,
        $search,
        $search,
        $search
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}