DROP DATABASE if EXISTS codoacodo;
CREATE DATABASE codoacodo;
USE codoacodo;


CREATE TABLE person(
	id varchar(250) primary key,
	name varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	surname varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	email varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    password varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
)ENGINE=InnoDB;

CREATE TABLE event(
    id int AUTO_INCREMENT primary key,
    name varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    date DATE
)ENGINE=InnoDB;

INSERT INTO event VALUES (1, "Conferencia BSAS Codo a Codo", "2022-12-12");
INSERT INTO person VALUES (1, "Tomas", "Hernandez", "hernandeztomas584@gmail.com", "123456");
INSERT INTO person VALUES (2, "Tomas", "Hernandez", "hernandeztomas5284@gmail.com", "123456");
INSERT INTO person VALUES (3, "Tomas", "Hernandez", "hernandeztomas5284123@gmail.com", "123456");
INSERT INTO person VALUES (4, "Tomas", "Hernandez", "hernandeztomas528412312@gmail.com", "123456");

CREATE TABLE person_event(
    id int AUTO_INCREMENT primary key,
    idPerson varchar(250),
    idEvent int,
    inscriptionDate DATE,
    inscriptionTime TIME,
    description varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    FOREIGN KEY (idPerson) REFERENCES person(id),
    FOREIGN KEY (idEvent) REFERENCES event(id)
)ENGINE=InnoDB;

INSERT INTO person_event VALUES (1, 1, 1, "2022-12-12", "14:07:01", "Me encantaria hablar acerca de TypeScript");
