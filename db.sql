create database upwork clone;
CREATE TABLE jobs (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  category VARCHAR(100),
  company VARCHAR(100),
  location VARCHAR(100),
  salary DECIMAL(10,2),
  person_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (person_id) REFERENCES persons(id)
);
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  is_freelance BOOLEAN NOT NULL
);
ALTER TABLE users ADD CONSTRAINT unique_email UNIQUE (email);
