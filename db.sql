CREATE TABLE IF NOT EXISTS `doctor` (
  `doc_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL UNIQUE,
  `password` varchar(20) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `specialization_id` int(20) NOT NULL,
  `patient_count` int(5) NOT NULL,
  `success_rate` varchar(20) NOT NULL,
  `experience` int(2) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `location_id` int(20) NOT NULL,
  `rating` int(1) NOT NULL,
  `available_time` varchar(50) NOT NULL,
  PRIMARY KEY (`doc_id`)
);

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL UNIQUE,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `location` varchar(20) NOT NULL,
  PRIMARY KEY (`patient_id`)
);

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(20) NOT NULL AUTO_INCREMENT,
  `doc_id` int(20) NOT NULL,
  `patient_id` int(20) NOT NULL,
  `timeofapp` varchar(20) NOT NULL,
  `dateofapp` varchar(20) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  UNIQUE (`doc_id`,`timeofapp`,`dateofapp`)
);

CREATE TABLE IF NOT EXISTS `description` (
  `desc_id` int(20) NOT NULL AUTO_INCREMENT,
  `patient_id` int(20) NOT NULL,
  `doc_id` int(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`desc_id`)
);

CREATE TABLE IF NOT EXISTS `history` (
  `doc_id` int(20) NOT NULL,
  `patient_id` int(20) NOT NULL,
  `count` int(200) NOT NULL,
  PRIMARY KEY (`doc_id`,`patient_id`)
);

CREATE TABLE IF NOT EXISTS `map` (
  `location_id` int(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `anna nagar` int(20) NOT NULL,
  `egmore` int(20) NOT NULL,
  `nungambaakam` int(20) NOT NULL,
  `vadapalani` int(20) NOT NULL,
  `tnagar` int(20) NOT NULL,
  `mylapore` int(20) NOT NULL,
  `porur` int(20) NOT NULL,
  `guindy` int(20) NOT NULL,
  `adyar` int(20) NOT NULL,
  `velachery` int(20) NOT NULL,
  `chromepet` int(20) NOT NULL,
  `palavakkam` int(20) NOT NULL,
  PRIMARY KEY (`location_id`)
);

CREATE TABLE IF NOT EXISTS `description_expansion` (
  `desc_id` int(20) NOT NULL,
  `med_id` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  PRIMARY KEY (`desc_id`,`med_id`)
);

CREATE TABLE IF NOT EXISTS `medicine` (
  `med_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `rate` float(20) NOT NULL,
  PRIMARY KEY (`med_id`),
  UNIQUE (`name`)
);

CREATE TABLE IF NOT EXISTS `pharmacy` (
  `pharmacy_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL UNIQUE,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`pharmacy_id`)
);

CREATE TABLE IF NOT EXISTS `med_at_pharmacy` (
  `pharmacy_id` int(20) NOT NULL,
  `med_id` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  PRIMARY KEY (`pharmacy_id`,`med_id`)
);

CREATE TABLE IF NOT EXISTS `patient_booking` (
  `patient_id` int(20) NOT NULL,
  `pharmacy_id` int(20) NOT NULL,
  `desc_id` int(20) NOT NULL,
  `delivered` varchar(20) NOT NULL,
  PRIMARY KEY (`desc_id`)
);