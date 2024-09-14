CREATE DATABASE production_management;

USE production_management;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

-- Insert default users
INSERT INTO users (username, password, role) VALUES
('uoc_0000', 'uoc_0000', 'ordinary'),
('uoc_0001', 'uoc_0001', 'ordinary'),
('uoc_0002', 'uoc_0002', 'ordinary'),
('uoc_0003', 'uoc_0003', 'ordinary'),
('uoc_0004', 'uoc_0004', 'ordinary'),
('uoc', 'uoc', 'ordinary');

CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL -- Consider storing hashed passwords
);

-- Insert default admin users
INSERT INTO admin_users (username, password) VALUES
('admin1000', 'adminpass1000'),
('admin1001', 'adminpass1001'),
('admin1002', 'adminpass1002');


