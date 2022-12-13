CREATE TABLE User (
   userId int NOT NULL AUTO_INCREMENT,
   email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    type varchar(255) NOT NULL,
    verification_status int NOT NULL,
    created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (userId)
)ENGINE=INNODB;