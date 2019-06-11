CREATE DATABASE IF NOT EXISTS opendevinettes;
USE opendevinettes;
CREATE TABLE riddles
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  category VARCHAR(255),
  question TEXT NOT NULL,
  answer TEXT NOT NULL
);