CREATE DATABASE IF NOT EXISTS real_state 
	CHARACTER SET utf8mb4 
	COLLATE utf8mb4_unicode_ci;

USE real_state;

CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(40) NOT NULL,
    last_name VARCHAR(40) NOT NULL,
    cpf VARCHAR(11) UNIQUE,
    birth_date DATE,
    cellphone VARCHAR(15),
    email varchar(254),
    active BOOLEAN NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP NOT NULL,
    modified_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL,
    PRIMARY KEY(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS addresses (
    id INT AUTO_INCREMENT NOT NULL,
    id_customer INT NOT NULL,
    street VARCHAR(100) NOT NULL,
    number INT NOT NULL,
    complement VARCHAR(10),
    neighborhood VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state CHAR(2) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    active BOOLEAN NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP NOT NULL,
    modified_at TIMESTAMP NULL,
    deleted_at TIMESTAMP NULL,
    PRIMARY KEY(id),
    
    FOREIGN KEY(id_customer) 
    REFERENCES customers(id)
    ON DELETE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO customers (first_name, last_name, cpf, birth_date, cellphone, email, active, created_at, modified_at, deleted_at) VALUES 
('Aline', 'Guedes', '00100100101', '1990-01-01', '11900000001', 'aline.guedes@email.com', TRUE, NOW(), NULL, NULL),
('Beto', 'Cunha', '00200200202', '1985-02-15', '21900000002', 'beto.cunha@email.com', TRUE, NOW(), NULL, NULL),
('Cecília', 'Rosa', '00300300303', '1978-03-20', '31900000003', 'cecilia.rosa@email.com', TRUE, NOW(), NULL, NULL),
('Davi', 'Teixeira', '00400400404', '2001-04-10', '41900000004', 'davi.teixeira@email.com', FALSE, NOW(), NOW(), NULL),
('Erica', 'Valle', '00500500505', '1995-05-25', '51900000005', 'erica.valle@email.com', TRUE, NOW(), NULL, NULL),
('Fábio', 'Xavier', '00600600606', '1980-06-05', '61900000006', 'fabio.xavier@email.com', TRUE, NOW(), NULL, NULL),
('Gisele', 'Zanella', '00700700707', '1998-07-30', '71900000007', 'gisele.zanella@email.com', TRUE, NOW(), NULL, NULL),
('Hugo', 'Abreu', '00800800808', '1975-08-12', '81900000008', 'hugo.abreu@email.com', TRUE, NOW(), NOW(), NULL),
('Iara', 'Bastos', '00900900909', '1992-09-19', '91900000009', 'iara.bastos@email.com', TRUE, NOW(), NULL, NULL),
('Jorge', 'Caldas', '01001001010', '1988-10-02', '11900000010', 'jorge.caldas@email.com', TRUE, NOW(), NULL, NULL),
('Katia', 'Dutra', '01101101111', '1970-11-08', '21900000011', 'katia.dutra@email.com', FALSE, NOW(), NOW(), NOW()),
('Luan', 'Elias', '01201201212', '1994-12-14', '31900000012', 'luan.elias@email.com', TRUE, NOW(), NULL, NULL),
('Marta', 'Fontes', '01301301313', '1983-01-22', '41900000013', 'marta.fontes@email.com', TRUE, NOW(), NULL, NULL),
('Nelson', 'Gomes', '01401401414', '2000-02-03', '51900000014', 'nelson.gomes@email.com', TRUE, NOW(), NULL, NULL),
('Olga', 'Horta', '01501501515', '1979-03-17', '61900000015', 'olga.horta@email.com', TRUE, NOW(), NULL, NULL),
('Paulo', 'Ibarra', '01601601616', '1997-04-28', '71900000016', 'paulo.ibarra@email.com', TRUE, NOW(), NULL, NULL),
('Quésia', 'Jales', '01701701717', '1981-05-09', '81900000017', 'quesia.jales@email.com', TRUE, NOW(), NOW(), NULL),
('Ramiro', 'Kruger', '01801801818', '1993-06-16', '91900000018', 'ramiro.kruger@email.com', TRUE, NOW(), NULL, NULL),
('Silvia', 'Lemes', '01901901919', '1972-07-24', '11900000019', 'silvia.lemes@email.com', FALSE, NOW(), NOW(), NULL),
('Túlio', 'Matos', '02002002020', '1986-08-07', '21900000020', 'tulio.matos@email.com', TRUE, NOW(), NULL, NULL),
('Úrsula', 'Nobre', '02102102121', '1999-09-18', '31900000021', 'ursula.nobre@email.com', TRUE, NOW(), NULL, NULL),
('Vicente', 'Oscar', '02202202222', '1984-10-29', '41900000022', 'vicente.oscar@email.com', TRUE, NOW(), NULL, NULL),
('Wanessa', 'Pinto', '02302302323', '1977-11-04', '51900000023', 'wanessa.pinto@email.com', TRUE, NOW(), NULL, NULL),
('Yago', 'Queiroz', '02402402424', '1996-12-11', '61900000024', 'yago.queiroz@email.com', TRUE, NOW(), NULL, NULL),
('Zélia', 'Ramos', '02502502525', '1989-01-06', '71900000025', 'zelia.ramos@email.com', TRUE, NOW(), NULL, NULL),
('Ariel', 'Sales', '02602602626', '1982-02-23', '81900000026', 'ariel.sales@email.com', TRUE, NOW(), NULL, NULL),
('Brisa', 'Toledo', '02702702727', '1991-03-01', '91900000027', 'brisa.toledo@email.com', TRUE, NOW(), NULL, NULL),
('Caique', 'Ulhoa', '02802802828', '1974-04-13', '11900000028', 'caique.ulhoa@email.com', TRUE, NOW(), NOW(), NULL),
('Dalva', 'Viana', '02902902929', '1987-05-18', '21900000029', 'dalva.viana@email.com', FALSE, NOW(), NOW(), NOW()),
('Eloi', 'Werner', '03003003030', '1995-06-21', '31900000030', 'eloi.werner@email.com', TRUE, NOW(), NULL, NULL);

INSERT INTO addresses (id_customer, street, number, complement, neighborhood, city, state, cep, active, created_at) VALUES 
(1, 'Rua das Palmeiras', 101, 'Apto 10', 'Jardim Paulista', 'São Paulo', 'SP', '01001001', TRUE, NOW()),
(2, 'Avenida Atlântica', 202, NULL, 'Copacabana', 'Rio de Janeiro', 'RJ', '22002002', TRUE, NOW()),
(3, 'Rua da Bahia', 303, 'Sala 1', 'Savassi', 'Belo Horizonte', 'MG', '30003003', TRUE, NOW()),
(4, 'Quadra SQS 404', 404, 'Bloco D', 'Asa Sul', 'Brasília', 'DF', '70004004', FALSE, NOW()),
(5, 'Avenida Boa Viagem', 505, NULL, 'Boa Viagem', 'Recife', 'PE', '50005005', TRUE, NOW()),
(6, 'Rua dos Andradas', 606, 'Loja 2', 'Centro', 'Porto Alegre', 'RS', '90006006', TRUE, NOW()),
(7, 'Avenida Tancredo Neves', 707, 'Cj 707', 'Caminho das Árvores', 'Salvador', 'BA', '41007007', TRUE, NOW()),
(8, 'Rua 15 de Novembro', 808, NULL, 'Centro', 'Curitiba', 'PR', '80008008', TRUE, NOW()),
(9, 'Avenida Afonso Pena', 909, 'Casa', 'Tiradentes', 'Campo Grande', 'MS', '79009009', TRUE, NOW()),
(10, 'Rua do Sol', 1010, NULL, 'Ponta Negra', 'Natal', 'RN', '59010010', TRUE, NOW()),
(11, 'Rua das Hortênsias', 1111, NULL, 'Gramado', 'Gramado', 'RS', '95011011', FALSE, NOW()),
(12, 'Rua Visconde de Pirajá', 1212, 'Apto 12', 'Ipanema', 'Rio de Janeiro', 'RJ', '22412012', TRUE, NOW()),
(13, 'Rua da Consolação', 1313, NULL, 'Consolação', 'São Paulo', 'SP', '01313013', TRUE, NOW()),
(14, 'Avenida Beira Mar', 1414, NULL, 'Meireles', 'Fortaleza', 'CE', '60141014', TRUE, NOW()),
(15, 'Rua João Pinho', 1515, 'Casa 1', 'Tijuca', 'Rio de Janeiro', 'RJ', '20515015', TRUE, NOW()),
(16, 'Rua dos Flamboyants', 1616, NULL, 'Jardim Cuiabá', 'Cuiabá', 'MT', '78016016', TRUE, NOW()),
(17, 'Avenida Governador', 1717, 'Sala 3', 'Pituba', 'Salvador', 'BA', '41817017', TRUE, NOW()),
(18, 'Rua Marechal Deodoro', 1818, NULL, 'Centro', 'Campinas', 'SP', '13018018', TRUE, NOW()),
(19, 'Rua da Aurora', 1919, 'Fundos', 'Santo Antônio', 'Recife', 'PE', '50019019', FALSE, NOW()),
(20, 'Avenida 23 de Maio', 2020, NULL, 'Vila Maria', 'São José dos Campos', 'SP', '12220020', TRUE, NOW()),
(21, 'Rua da Glória', 2121, 'Apto 21', 'Glória', 'Vitória', 'ES', '29021021', TRUE, NOW()),
(22, 'Rua Chile', 2222, NULL, 'Centro', 'Porto Alegre', 'RS', '90022022', TRUE, NOW()),
(23, 'Avenida Brasília', 2323, NULL, 'Águas Claras', 'Taguatinga', 'DF', '72023023', TRUE, NOW()),
(24, 'Rua XV de Novembro', 2424, 'Casa', 'Centro', 'Florianópolis', 'SC', '88024024', TRUE, NOW()),
(25, 'Rua do Limoeiro', 2525, NULL, 'Morumbi', 'São Paulo', 'SP', '05625025', TRUE, NOW()),
(26, 'Rua Eucalipto', 2626, 'Bloco B', 'Lago Sul', 'Brasília', 'DF', '71626026', TRUE, NOW()),
(27, 'Avenida Sete', 2727, NULL, 'Icaraí', 'Niterói', 'RJ', '24227027', TRUE, NOW()),
(28, 'Rua das Américas', 2828, 'Sala 1', 'Barra da Tijuca', 'Rio de Janeiro', 'RJ', '22628028', TRUE, NOW()),
(29, 'Rua da Saudade', 2929, NULL, 'Pampulha', 'Belo Horizonte', 'MG', '31229029', FALSE, NOW()),
(30, 'Rua da Paz', 3030, NULL, 'Petrópolis', 'Porto Alegre', 'RS', '90630030', TRUE, NOW());