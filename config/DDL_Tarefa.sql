-- Model: Task Manager Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema taskmanager
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `taskmanager` DEFAULT CHARACTER SET utf8 ;
USE `taskmanager` ;

-- -----------------------------------------------------
-- Table `taskmanager`.`tarefa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taskmanager`.`tarefa` (
  `idTarefa` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  `cor` VARCHAR(7) NOT NULL,
  `concluida` TINYINT(1) NOT NULL DEFAULT 0,
  `arquivada` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idTarefa`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
