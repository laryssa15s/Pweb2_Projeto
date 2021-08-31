CREATE DATABASE projeto;
USE projeto;

CREATE TABLE usuario(
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telefone VARCHAR(50) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(32) NOT NULL, 
    CONSTRAINT PRIMARY KEY(usuario, senha)
);

CREATE TABLE veterinario(
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    cpf VARCHAR(50) NOT NULL,
    telefone VARCHAR(50) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(32) NOT NULL, 
    CONSTRAINT PRIMARY KEY(usuario, senha)
);