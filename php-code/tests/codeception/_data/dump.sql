CREATE TABLE genus
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255)
);
CREATE TABLE users
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    login VARCHAR(255),
    password VARCHAR(255),
    name VARCHAR(255)
);
CREATE TABLE pets
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    genusId INT(11),
    name VARCHAR(255),
    age DOUBLE,
    CONSTRAINT fk_pets_2_genus FOREIGN KEY (genusId) REFERENCES genus (id)
);
CREATE TABLE pet_families
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    petId INT(11),
    userId INT(11),
    dateAdoption DATETIME,
    CONSTRAINT fk_pet_families_2_pets FOREIGN KEY (petId) REFERENCES pets (id),
    CONSTRAINT fk_pet_families_2_users FOREIGN KEY (userId) REFERENCES users (id)
);
CREATE INDEX fk_pet_families_2_pets ON pet_families (petId);
CREATE INDEX fk_pet_families_2_users ON pet_families (userId);
CREATE INDEX fk_pets_2_genus ON pets (genusId);
INSERT INTO petshelter.genus (name) VALUES ('кошки');
INSERT INTO petshelter.genus (name) VALUES ('собаки');
INSERT INTO petshelter.genus (name) VALUES ('черепахи');
INSERT INTO petshelter.users (login, password, name) VALUES ('User1', 'User1', 'User1');
INSERT INTO petshelter.pets (genusId, name, age) VALUES (1, 'miu', 2.3);
INSERT INTO petshelter.pets (genusId, name, age) VALUES (2, 'wof', 4.9);
INSERT INTO petshelter.pets (genusId, name, age) VALUES (3, 'crow', 215.2);
INSERT INTO petshelter.pet_families (petId, userId, dateAdoption) VALUES (1, null, '2016-11-23 12:39:17');
INSERT INTO petshelter.pet_families (petId, userId, dateAdoption) VALUES (1, 1, '2016-11-23 12:39:39');
INSERT INTO petshelter.pet_families (petId, userId, dateAdoption) VALUES (2, null, '2016-11-23 14:12:55');
INSERT INTO petshelter.pet_families (petId, userId, dateAdoption) VALUES (2, 1, '2016-11-23 14:22:53');
INSERT INTO petshelter.pet_families (petId, userId, dateAdoption) VALUES (3, null, '2016-11-23 14:25:30');
INSERT INTO petshelter.pet_families (petId, userId, dateAdoption) VALUES (3, 1, '2016-11-23 14:25:37');