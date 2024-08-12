-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema senderosUV
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS senderosUV DEFAULT CHARACTER SET utf8 ;
USE senderosUV ;

-- -----------------------------------------------------
-- Table sendero
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sendero (
  id_sendero INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50),
  sede VARCHAR(50),
  anio_fundacion INT,
  id_zona INT,
  url_logo VARCHAR(255),
  url_portada VARCHAR(255),
  status BOOLEAN,
  PRIMARY KEY (id_sendero))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table zona
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS zona (
  id_zona INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NULL,
  PRIMARY KEY (id_zona))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table zona_sendero
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS zona_sendero (
  id_sendero INT NOT NULL,
  id_zona INT NOT NULL,
  CONSTRAINT fk_zona_sendero_sendero1
    FOREIGN KEY (id_sendero)
    REFERENCES sendero (id_sendero)
    ON DELETE CASCADE,
  CONSTRAINT fk_zona_sendero_zona
    FOREIGN KEY (id_zona)
    REFERENCES zona (id_zona)
    ON DELETE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table tipo_recurso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipo_recurso (
  id_tipo_recurso INT NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(20) NULL,
  PRIMARY KEY (id_tipo_recurso))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table recurso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS recurso (
  id_recurso INT NOT NULL AUTO_INCREMENT,
  numero INT NULL,
  nombre VARCHAR(50) NULL,
  url TEXT NULL,
  creditos VARCHAR(100) NULL,
  id_tipo_recurso INT NULL,
  PRIMARY KEY (id_recurso),
  CONSTRAINT fk_recurso_tipo_recurso1
    FOREIGN KEY (id_tipo_recurso)
    REFERENCES tipo_recurso (id_tipo_recurso)
    ON DELETE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table estacion
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estacion (
  id_estacion INT NOT NULL AUTO_INCREMENT,
  numero INT NULL,
  nombre VARCHAR(50) NULL,
  descripcion TEXT NULL,
  latitud VARCHAR(20) NULL,
  longitud VARCHAR(20) NULL,
  PRIMARY KEY (id_estacion))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table estacion_recurso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estacion_recurso (
  id_estacion INT NOT NULL,
  id_recurso INT NOT NULL,
  CONSTRAINT fk_estacion_recurso_estacion
    FOREIGN KEY (id_estacion)
    REFERENCES estacion (id_estacion)
    ON DELETE CASCADE,
  CONSTRAINT fk_estacion_recurso_recurso1
    FOREIGN KEY (id_recurso)
    REFERENCES recurso (id_recurso)
    ON DELETE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table sendero_estacion
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sendero_estacion (
  id_sendero INT NOT NULL,
  id_estacion INT NOT NULL,
  CONSTRAINT fk_sendero_estacion_estacion1
    FOREIGN KEY (id_estacion)
    REFERENCES estacion (id_estacion)
    ON DELETE CASCADE,
  CONSTRAINT fk_sendero_estacion_sendero1
    FOREIGN KEY (id_sendero)
    REFERENCES sendero (id_sendero)
    ON DELETE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rol_usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rol_usuario (
  id_rol_usuario INT NOT NULL AUTO_INCREMENT,
  rol_usuario VARCHAR(20) NULL,
  PRIMARY KEY (id_rol_usuario))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(20) NULL,
  contrasena VARCHAR(20) NULL,
  id_rol_usuario INT NULL,
  PRIMARY KEY (id_usuario),
  CONSTRAINT fk_rol_usuario_usuario1
    FOREIGN KEY (id_rol_usuario)
    REFERENCES usuario (id_usuario)
    ON DELETE CASCADE)
ENGINE = InnoDB;





SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
