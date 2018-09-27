create table servidor(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	nome varchar (255), 
	email varchar (255), 
	trt char (2), 
	data TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, 
	UNIQUE(email)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
