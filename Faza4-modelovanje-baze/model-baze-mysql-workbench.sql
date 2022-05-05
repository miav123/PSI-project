-- MySQL Script generated by MySQL Workbench
-- Thu Apr 21 19:53:56 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema psi
-- -----------------------------------------------------
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`admin` ;

CREATE TABLE IF NOT EXISTS `mydb`.`admin` (
  `id_kor` INT NOT NULL,
  PRIMARY KEY (`id_kor`),
  UNIQUE INDEX `idKor_UNIQUE` (`id_kor` ASC) VISIBLE,
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bedz`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bedz` ;

CREATE TABLE IF NOT EXISTS `mydb`.`bedz` (
  `id_bedz` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  `opis` VARCHAR(200) NOT NULL,
  `tip_bedza_vreme` INT NOT NULL,
  `slika` LONGBLOB NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE INDEX `id_bedz_UNIQUE` (`id_bedz` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bedz_logovanje`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bedz_logovanje` ;

CREATE TABLE IF NOT EXISTS `mydb`.`bedz_logovanje` (
  `id_bedz` INT NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE INDEX `id_bedz_UNIQUE` (`id_bedz` ASC) VISIBLE,
  CONSTRAINT `id_bedz_FK`
    FOREIGN KEY (`id_bedz`)
    REFERENCES `mydb`.`bedz` (`id_bedz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bedz_unos_hrane`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bedz_unos_hrane` ;

CREATE TABLE IF NOT EXISTS `mydb`.`bedz_unos_hrane` (
  `id_bedz` INT NOT NULL,
  `kolicina_kcal` INT NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE INDEX `id_bedz_UNIQUE` (`id_bedz` ASC) VISIBLE,
  CONSTRAINT `id_bedz_FK`
    FOREIGN KEY (`id_bedz`)
    REFERENCES `mydb`.`bedz` (`id_bedz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bedz_unos_trening`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bedz_unos_trening` ;

CREATE TABLE IF NOT EXISTS `mydb`.`bedz_unos_trening` (
  `id_bedz` INT NOT NULL,
  `idTipTren` INT NOT NULL,
  `vreme_tren` INT NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE INDEX `id_bedz_UNIQUE` (`id_bedz` ASC) VISIBLE,
  CONSTRAINT `id_bedz_FK`
    FOREIGN KEY (`id_bedz`)
    REFERENCES `mydb`.`bedz` (`id_bedz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bedz_unos_vode`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bedz_unos_vode` ;

CREATE TABLE IF NOT EXISTS `mydb`.`bedz_unos_vode` (
  `id_bedz` INT NOT NULL,
  `kolicina_vode` INT NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE INDEX `id_bedz_UNIQUE` (`id_bedz` ASC) VISIBLE,
  CONSTRAINT `id_bedz_FK`
    FOREIGN KEY (`id_bedz`)
    REFERENCES `mydb`.`bedz` (`id_bedz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`gotovi_izazovi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`gotovi_izazovi` ;

CREATE TABLE IF NOT EXISTS `mydb`.`gotovi_izazovi` (
  `id_veze` INT NOT NULL AUTO_INCREMENT,
  `id_kor` INT NOT NULL,
  `id_izazov` INT NOT NULL,
  PRIMARY KEY (`id_veze`),
  INDEX `id_kor_FK_idx` (`id_kor` ASC) VISIBLE,
  INDEX `id_izazov_FK_idx` (`id_izazov` ASC) VISIBLE,
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`registrovani_korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_izazov_FK`
    FOREIGN KEY (`id_izazov`)
    REFERENCES `mydb`.`izazov` (`id_izazov`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`izazov`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`izazov` ;

CREATE TABLE IF NOT EXISTS `mydb`.`izazov` (
  `id_izazov` INT NOT NULL AUTO_INCREMENT,
  `id_tren` INT NOT NULL,
  `naziv` VARCHAR(45) NOT NULL,
  `opis` VARCHAR(200) NOT NULL,
  `tip_izazova` VARCHAR(45) NOT NULL,
  `br_poena` INT NOT NULL,
  `trajanje_u_danima` INT NOT NULL,
  `nivo` VARCHAR(1) NOT NULL,
  `br_lajkova` INT NOT NULL,
  PRIMARY KEY (`id_izazov`),
  INDEX `id_tren_FK_idx` (`id_tren` ASC) VISIBLE,
  UNIQUE INDEX `id_izazov_UNIQUE` (`id_izazov` ASC) VISIBLE,
  CONSTRAINT `id_tren_FK`
    FOREIGN KEY (`id_tren`)
    REFERENCES `mydb`.`trener` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`izazov_hrana`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`izazov_hrana` ;

CREATE TABLE IF NOT EXISTS `mydb`.`izazov_hrana` (
  `id_izazov` INT NOT NULL,
  `broj_kalorija_koje_treba_uneti_svakog_dana` INT NOT NULL,
  PRIMARY KEY (`id_izazov`),
  UNIQUE INDEX `id_izazov_UNIQUE` (`id_izazov` ASC) VISIBLE,
  CONSTRAINT `id_izazov_FK`
    FOREIGN KEY (`id_izazov`)
    REFERENCES `mydb`.`izazov` (`id_izazov`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`izazov_trening`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`izazov_trening` ;

CREATE TABLE IF NOT EXISTS `mydb`.`izazov_trening` (
  `id_izazov` INT NOT NULL,
  `id_tip` INT NOT NULL,
  `vreme_koje_treba_trenirati_svakog_dana` INT NOT NULL,
  PRIMARY KEY (`id_izazov`),
  INDEX `id_tip_FK_idx` (`id_tip` ASC) VISIBLE,
  UNIQUE INDEX `id_izazov_UNIQUE` (`id_izazov` ASC) VISIBLE,
  CONSTRAINT `id_izazov_FK`
    FOREIGN KEY (`id_izazov`)
    REFERENCES `mydb`.`izazov` (`id_izazov`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_tip_FK`
    FOREIGN KEY (`id_tip`)
    REFERENCES `mydb`.`tip_treninga` (`id_tip`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`izazov_voda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`izazov_voda` ;

CREATE TABLE IF NOT EXISTS `mydb`.`izazov_voda` (
  `id_izazov` INT NOT NULL,
  `kolicina_koju_treba_piti_svakog_dana` INT NOT NULL,
  PRIMARY KEY (`id_izazov`),
  UNIQUE INDEX `id_izazov_UNIQUE` (`id_izazov` ASC) VISIBLE,
  CONSTRAINT `id_izazov_FK`
    FOREIGN KEY (`id_izazov`)
    REFERENCES `mydb`.`izazov` (`id_izazov`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`korisnik`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`korisnik` ;

CREATE TABLE IF NOT EXISTS `mydb`.`korisnik` (
  `id_kor` INT NOT NULL AUTO_INCREMENT,
  `kor_ime` VARCHAR(45) NOT NULL,
  `sifra` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_kor`),
  UNIQUE INDEX `korIme_UNIQUE` (`kor_ime` ASC) VISIBLE,
  UNIQUE INDEX `id_kor_UNIQUE` (`id_kor` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`korisnik_bedz`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`korisnik_bedz` ;

CREATE TABLE IF NOT EXISTS `mydb`.`korisnik_bedz` (
  `id_veze` INT NOT NULL AUTO_INCREMENT,
  `id_kor` INT NOT NULL,
  `id_bedz` INT NOT NULL,
  PRIMARY KEY (`id_veze`),
  INDEX `id_kor_FK_idx` (`id_kor` ASC) VISIBLE,
  INDEX `id_bedz_FK_idx` (`id_bedz` ASC) VISIBLE,
  UNIQUE INDEX `id_veze_UNIQUE` (`id_veze` ASC) VISIBLE,
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`registrovani_korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_bedz_FK`
    FOREIGN KEY (`id_bedz`)
    REFERENCES `mydb`.`bedz` (`id_bedz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`moji_izazovi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`moji_izazovi` ;

CREATE TABLE IF NOT EXISTS `mydb`.`moji_izazovi` (
  `id_veze` INT NOT NULL AUTO_INCREMENT,
  `id_kor` INT NOT NULL,
  `id_izazov` INT NOT NULL,
  `dana_uzastopno_ispunjeno` INT NOT NULL,
  `propusteno` TINYINT NOT NULL,
  PRIMARY KEY (`id_veze`),
  INDEX `id_kor_FK_idx` (`id_kor` ASC) VISIBLE,
  INDEX `id_izazov_FK_idx` (`id_izazov` ASC) VISIBLE,
  UNIQUE INDEX `id_veze_UNIQUE` (`id_veze` ASC) VISIBLE,
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`registrovani_korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_izazov_FK`
    FOREIGN KEY (`id_izazov`)
    REFERENCES `mydb`.`izazov` (`id_izazov`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`namirnica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`namirnica` ;

CREATE TABLE IF NOT EXISTS `mydb`.`namirnica` (
  `id_nam` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  `kcal_na_100g` INT NOT NULL,
  PRIMARY KEY (`id_nam`),
  UNIQUE INDEX `id_nam_UNIQUE` (`id_nam` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`obork_sadrzi_namirnice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`obork_sadrzi_namirnice` ;

CREATE TABLE IF NOT EXISTS `mydb`.`obork_sadrzi_namirnice` (
  `id_vez` INT NOT NULL AUTO_INCREMENT,
  `id_obr` INT NOT NULL,
  `id_nam` INT NOT NULL,
  `kolicina_svake_nam_u_g` INT NOT NULL,
  PRIMARY KEY (`id_vez`),
  INDEX `id_nam_FK_idx` (`id_nam` ASC) VISIBLE,
  INDEX `id_obr_FK_idx` (`id_obr` ASC) VISIBLE,
  UNIQUE INDEX `id_vez_UNIQUE` (`id_vez` ASC) VISIBLE,
  CONSTRAINT `id_nam_FK`
    FOREIGN KEY (`id_nam`)
    REFERENCES `mydb`.`namirnica` (`id_nam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_obr_FK`
    FOREIGN KEY (`id_obr`)
    REFERENCES `mydb`.`obrok` (`id_obr`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`obrok`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`obrok` ;

CREATE TABLE IF NOT EXISTS `mydb`.`obrok` (
  `id_obr` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_obr`),
  UNIQUE INDEX `id_obr_UNIQUE` (`id_obr` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`registrovani_korisnik`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`registrovani_korisnik` ;

CREATE TABLE IF NOT EXISTS `mydb`.`registrovani_korisnik` (
  `id_kor` INT NOT NULL,
  `visina` INT NOT NULL,
  `tezina` INT NOT NULL,
  `br_tren` INT NOT NULL,
  `bodovi` INT NOT NULL,
  `datum_posl_logovanja` DATETIME NOT NULL,
  `broj_uzast_logovanja` INT NOT NULL,
  UNIQUE INDEX `idKor_UNIQUE` (`id_kor` ASC) VISIBLE,
  PRIMARY KEY (`id_kor`),
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tip_treninga`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tip_treninga` ;

CREATE TABLE IF NOT EXISTS `mydb`.`tip_treninga` (
  `id_tip` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  `kcal_za_pola_sata_tren` INT NOT NULL,
  PRIMARY KEY (`id_tip`),
  UNIQUE INDEX `id_tip_UNIQUE` (`id_tip` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`trener`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`trener` ;

CREATE TABLE IF NOT EXISTS `mydb`.`trener` (
  `id_kor` INT NOT NULL,
  PRIMARY KEY (`id_kor`),
  UNIQUE INDEX `idKor_UNIQUE` (`id_kor` ASC) VISIBLE,
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`unos_hrane`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`unos_hrane` ;

CREATE TABLE IF NOT EXISTS `mydb`.`unos_hrane` (
  `id_un` INT NOT NULL AUTO_INCREMENT,
  `id_kor` INT NOT NULL,
  `datum` DATETIME NOT NULL,
  `id_obr` INT NOT NULL,
  PRIMARY KEY (`id_un`),
  INDEX `id_kor_FK_idx` (`id_kor` ASC) VISIBLE,
  INDEX `id_obr_FK_idx` (`id_obr` ASC) VISIBLE,
  UNIQUE INDEX `id_un_UNIQUE` (`id_un` ASC) VISIBLE,
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`registrovani_korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_obr_FK`
    FOREIGN KEY (`id_obr`)
    REFERENCES `mydb`.`obrok` (`id_obr`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`unos_treninga`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`unos_treninga` ;

CREATE TABLE IF NOT EXISTS `mydb`.`unos_treninga` (
  `id_un` INT NOT NULL AUTO_INCREMENT,
  `id_kor` INT NOT NULL,
  `datum` DATETIME NOT NULL,
  `vreme_trajanja` INT NOT NULL,
  `id_tip` INT NOT NULL,
  PRIMARY KEY (`id_un`),
  INDEX `id_kor_FK_idx` (`id_kor` ASC) VISIBLE,
  INDEX `id_tip_FK_idx` (`id_tip` ASC) VISIBLE,
  UNIQUE INDEX `id_un_UNIQUE` (`id_un` ASC) VISIBLE,
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`registrovani_korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_tip_FK`
    FOREIGN KEY (`id_tip`)
    REFERENCES `mydb`.`tip_treninga` (`id_tip`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`unos_vode`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`unos_vode` ;

CREATE TABLE IF NOT EXISTS `mydb`.`unos_vode` (
  `id_un` INT NOT NULL AUTO_INCREMENT,
  `id_kor` INT NOT NULL,
  `datum` DATETIME NOT NULL,
  `kolicina` INT NOT NULL,
  PRIMARY KEY (`id_un`),
  INDEX `id_kor_FK_idx` (`id_kor` ASC) VISIBLE,
  UNIQUE INDEX `id_un_UNIQUE` (`id_un` ASC) VISIBLE,
  CONSTRAINT `id_kor_FK`
    FOREIGN KEY (`id_kor`)
    REFERENCES `mydb`.`registrovani_korisnik` (`id_kor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;