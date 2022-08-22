CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    npm INT,
    kelas VARCHAR(10),
    nama VARCHAR(25),
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(25) NOT NULL UNIQUE,
    role VARCHAR(10)
);

DESCRIBE users;

ALTER TABLE users 
    DROP COLUMN password;

ALTER TABLE users
    ADD password VARCHAR(25) NOT NULL 
    AFTER username;

INSERT INTO users (username, password, role)
    VALUES ('admin', 'admin', 'ADMIN');