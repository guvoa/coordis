-- Create Database
CREATE DATABASE IF NOT EXISTS crud_db;
USE crud_db;

-- Create Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Insert Dummy Data
INSERT INTO users (name, email, created_at) VALUES
('John Doe', 'john@example.com', '2023-01-01 10:00:00'),
('Jane Smith', 'jane@example.com', '2023-01-02 11:30:00'),
('Mike Johnson', 'mike@example.com', '2023-01-03 09:15:00'),
('Emily Davis', 'emily@example.com', '2023-01-04 14:45:00'),
('Chris Brown', 'chris@example.com', '2023-01-05 16:20:00');
