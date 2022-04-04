set foreign_key_checks= 0
ALTER TABLE customers MODIFY columnname INTEGER;

CREATE DATABASE ctomy;

USE ctomy; 

CREATE TABLE users(
    users_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    users_username varchar(60) NOT NULL,
    users_email varchar(60) NOT NULL UNIQUE,
    users_pw varchar(200) NOT NULL 
);

CREATE TABLE customers(
    cust_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cust_name varchar(200) NOT NULL UNIQUE,
    cust_phone varchar(200) NOT NULL,
    cust_zip int NOT NULL,
    cust_city varchar(200),
    cust_street varchar(200),
    created_at DATE DEFAULT NOW(),
    edited_at DATE DEFAULT NOW(),
    created_from int(11) NOT NULL,
    FOREIGN KEY (created_from) REFERENCES users(users_id)
);

INSERT INTO users(users_username, users_email, users_pw)
VALUES 
("Patrik", "fo@pa.at", "1234");

INSERT INTO customers(cust_name, cust_phone, cust_zip, cust_city, cust_street, created_from)
VALUES
("Codersbay", "0664-45645", 4020, "Linz", "Hubergut-Berg 69", 1);



