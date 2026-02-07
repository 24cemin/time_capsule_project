CREATE DATABASE IF NOT EXISTS time_capsule_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE time_capsule_db;

-- users tablosu
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- capsules tablosu
CREATE TABLE IF NOT EXISTS capsules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL,
    open_date DATETIME NOT NULL,
    password VARCHAR(100) DEFAULT NULL,
    email VARCHAR(255) DEFAULT NULL,
    user_id INT,
    notified TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- site_comments tablosu
CREATE TABLE IF NOT EXISTS site_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE capsules ADD COLUMN attachment VARCHAR(255) NULL;
ALTER TABLE capsules ADD COLUMN notified TINYINT(1) DEFAULT 0;


