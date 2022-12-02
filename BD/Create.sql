-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `financiera` DEFAULT CHARACTER SET utf8 ;
USE `financiera` ;

-- -----------------------------------------------------
-- Table `mydb`.`Estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `financiera`.`Estado` (
  `idEstado` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `financiera`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Ingresos/Egresos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `financiera`.`Ingresos/Egresos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NOT NULL,
  `valor` INT NOT NULL,
  `estado_fk` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`estado_fk`)REFERENCES `financiera`.`Estado` (`idEstado`)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `financiera`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE ON UPDATE CASCADE)
ENGINE = InnoDB;




insert into estado values (1,'ingresos');
insert into estado values (2,'egresos');

insert into usuario values(1,'Paula','1234','paula@gmail.com');
insert into `ingresos/egresos` values (1,'nomina',150000,1,1);

