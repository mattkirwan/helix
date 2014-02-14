CREATE TABLE endpoints (
	`id` INT NOT NULL,
	`slug` VARCHAR(255) NULL,
	`file_id` INT NULL,
	`base_template_id` INT NULL, 
	`lang_id` INT NULL, 
	`site_id` INT NULL, 
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;