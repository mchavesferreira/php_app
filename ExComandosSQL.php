<?php
//  exemplo de comandos php e mysql
// conecta com o banco de dados via terminal
// mysql -u root -p
//mysql -u admin -h database-1.cscbnowewjwj.sa-east-1.rds.amazonaws.com -p

// mostra base de banco de dados
show databases;

// Cria base de dados
Create Database sensor; 

// seleciona base de dados
use sensor;


// CRIA TABELA
CREATE TABLE tempLogr (
    timeStamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    temperature int(11) NOT NULL,
    humidity int(11) NOT NULL,
    PRIMARY KEY (timeStamp) );



// descreve características da base de dados
describe tempLogo;

// insere uma linha de dados
INSERT INTO tempLogr (temperature, humidity)
    VALUES ('33','56');

INSERT INTO tempLogo (temperature, humidity)
    VALUES ('33','56');
// seleciona todas as linhas da base de dados
SELECT * FROM tempLogo;
SELECT temperature FROM tempLogo;
SELECT * FROM tempLogo limit 1;   // limita 1 linha
SELECT * FROM tempLogo limit 2,3;   // limita 1 linha
SELECT * FROM tempLogo order by timeStamp ASC;
SELECT * FROM tempLogo order by timeStamp DESC;
SELECT * FROM tempLogo where temperature=23;
SELECT * FROM tempLogo WHERE DATE(timeStamp) = CURDATE();
SELECT * FROM tempLogo WHERE DATE_SUB(CURDATE(),INTERVAL 1 DAY);

//apagar linhas da tabela por seleção
DELETE  from tempLogr where humidity=50;

// apagar tabela completa
DROP TABLE tempLogr;

/// guia https://dev.mysql.com/doc/refman/8.0/en/creating-tables.html

