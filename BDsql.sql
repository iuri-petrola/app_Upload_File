
--Banco Mysql 

CREATE DATABASE upload_app;
USE upload_app;

CREATE TABLE arquivos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_arquivo VARCHAR(255) NOT NULL,
    caminho VARCHAR(255) NOT NULL,
    data_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



-- Banco Postgres 

CREATE DATABASE upload_app;


CREATE TABLE arquivos (
    id serial PRIMARY KEY,
    nome_arquivo VARCHAR(255) NOT NULL,
    caminho VARCHAR(255) NOT NULL,
    data_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



SELECT * FROM arquivos 
-- ORDER BY data_upload DESC

--  delete from arquivos where id in (10,11,12)
