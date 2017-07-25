--
-- Database: `animals_db`
-- Table structure for table `animals`
--
CREATE TABLE animals_db.animals ( id INT NOT NULL AUTO_INCREMENT , animal_type VARCHAR(32) NOT NULL , name VARCHAR(32) NOT NULL , age INT NOT NULL , favoriteFood VARCHAR(75) NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `animal_type`, `name`, `age`,`favoriteFood`) VALUES
(1, 'cat', 'Garfield', 6,'chips'),
(2, 'dog', 'Tom', 7,'fish');