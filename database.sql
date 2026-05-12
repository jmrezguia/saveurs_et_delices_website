CREATE DATABASE IF NOT EXISTS saveurs_et_delices;
USE saveurs_et_delices;

CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    resume TEXT NOT NULL,
    contenu TEXT NOT NULL,
    categorie VARCHAR(100) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    vues INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);