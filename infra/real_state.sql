CREATE TABLE customers (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(30) NOT NULL,
	birth_date DATE,
	cellphone VARCHAR(15),
	email varchar(254),
	PRIMARY KEY(id)
);

CREATE TABLE addresses (
	id INT AUTO_INCREMENT NOT NULL,
	id_customer INT NOT NULL,
	street VARCHAR(100) NOT NULL,
	number INT NOT NULL,
	complement VARCHAR(10),
	neighborhood VARCHAR(100) NOT NULL,
	city VARCHAR(100) NOT NULL,
	cep VARCHAR(8) NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_customer) REFERENCES customers(id)
);