DROP DATABASE if EXISTS codoacodo;
CREATE DATABASE codoacodo;
USE codoacodo;


CREATE TABLE person(
	id varchar(250) primary key,
	name varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	surname varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	email varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    password varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    tempPassword tinyint DEFAULT 0
)ENGINE=InnoDB;

INSERT INTO person values(1, 'Tomas', 'Hernandez', 'hernandeztomas584@hotmail.com', '$2y$10$Ozi7D1VQZV670VVSPO2L5Oo1eLvwG3l8OrCSGJM2pU9lsBue.S2qS', 0);

CREATE TABLE event(
    id int AUTO_INCREMENT primary key,
    name varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    date DATE
)ENGINE=InnoDB;

INSERT INTO event VALUES (1, "Conferencia BSAS Codo a Codo", "2022-12-12");


CREATE TABLE person_event(
    id int AUTO_INCREMENT primary key,
    idPerson varchar(250),
    idEvent int,
    inscriptionDate DATE,
    inscriptionTime TIME,
    description varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    FOREIGN KEY (idPerson) REFERENCES person(id) ON DELETE CASCADE,
    FOREIGN KEY (idEvent) REFERENCES event(id)
)ENGINE=InnoDB;

/* Cada ticket pertenecerá a una sola persona */ 

CREATE TABLE user_category(
    id int AUTO_INCREMENT primary key,
    slug varchar(250),
    name varchar(250),
    discount decimal(10,2)
)ENGINE=InnoDB;

INSERT INTO user_category VALUES (1, 'student', 'Estudiante', 0.8);
INSERT INTO user_category VALUES (2, 'trainee', 'Trainee', 0.5);
INSERT INTO user_category VALUES (3, 'junior', 'junior', 0.15);


CREATE TABLE ticket(
    id int AUTO_INCREMENT primary key,
    baseprice int,
    idEvent int,
    dateCreated DATE,
    timeCreated TIME, 
    FOREIGN KEY (idEvent) REFERENCES event(id)
)ENGINE=InnoDB;


INSERT INTO ticket (id, baseprice, idEvent) VALUES (1, 200, 1);

CREATE TABLE ticket_person(
    id varchar(240) primary key,
    ticket int,
    ticketQuantity int,
    idPerson varchar(250),
    price int, 
    dateCreated DATE,
    timeCreated TIME, 
    FOREIGN KEY(idPerson) REFERENCES person(id) ON DELETE CASCADE,
    FOREIGN KEY(ticket) REFERENCES ticket(id)
)ENGINE=InnoDB;


INSERT INTO ticket_person(id, ticket, ticketQuantity, idPerson, price) VALUES (1, 1, 10, 1, 400);