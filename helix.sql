CREATE TABLE IF NOT EXISTS base_templates (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NULL,
	`lang_id` INT NULL, 
	`site_id` INT NULL,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)	
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS layout_templates (
	`id` INT NOT NULL AUTO_INCREMENT,
	`base_template_id` INT NULL,
	`name` VARCHAR(255) NULL,
	`lang_id` INT NULL, 
	`site_id` INT NULL,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `fk_base_layout_template_id` (`base_template_id` ASC),
	CONSTRAINT `fk_base_layout_template_id`
		FOREIGN KEY (`base_template_id`)
		REFERENCES `base_templates` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS component_templates (
	`id` INT NOT NULL AUTO_INCREMENT,
	`layout_template_id` INT NULL,
	`name` VARCHAR(255) NULL,
	`lang_id` INT NULL, 
	`site_id` INT NULL,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `fk_layout_component_template_id` (`layout_template_id` ASC),
	CONSTRAINT `fk_layout_component_template_id`
		FOREIGN KEY (`layout_template_id`)
		REFERENCES `layout_templates` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS endpoints (
	`id` INT NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255) NULL,
	`file_id` INT NULL,
	`base_template_id` INT NULL, 
	`lang_id` INT NULL, 
	`site_id` INT NULL,
	`updated_at` DATETIME,
	`created_at` DATETIME,
	`deleted_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `slug_UNIQUE` (`slug` ASC),
	INDEX `fk_base_endpoint_template_id` (`base_template_id` ASC) ,
	CONSTRAINT `fk_base_endpoint_template_id`
		FOREIGN KEY (`base_template_id` )
		REFERENCES `base_templates` (`id` )
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

