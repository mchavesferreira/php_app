<?php
//  exemplo de comandos php e mysql
// conecta com o banco de dados via terminal
// mysql -u root -p
//mysql -u admin  -p

// mostra base de banco de dados
show databases;

// Cria base de dados
Create Database sensor; 

// seleciona base de dados
use sensor;


// CRIA TABELA
CREATE TABLE tempLog (
    timeStamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    temperature int(11) NOT NULL,
    humidity int(11) NOT NULL,
    PRIMARY KEY (timeStamp) );



// descreve características da base de dados
describe tempLogo;

// insere uma linha de dados
INSERT INTO tempLog (temperature, humidity)
    VALUES ('33','56');

// seleciona todas as linhas da base de dados
SELECT * FROM tempLog;
SELECT temperature FROM tempLog;
SELECT * FROM tempLog limit 1;   // limita 1 linha
SELECT * FROM tempLog limit 2,3;   // limita 1 linha
SELECT * FROM tempLog order by timeStamp ASC;
SELECT * FROM tempLog order by timeStamp DESC;
SELECT * FROM tempLog where temperature=23;
SELECT * FROM tempLog WHERE DATE(timeStamp) = CURDATE();
SELECT * FROM tempLog WHERE DATE_SUB(CURDATE(),INTERVAL 1 DAY);

//apagar linhas da tabela por seleção
DELETE  from tempLog where humidity=50;

// apagar tabela completa
DROP TABLE tempLog;

/// guia https://dev.mysql.com/doc/refman/8.0/en/creating-tables.html

