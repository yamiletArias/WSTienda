CREATE DATABASE tiendaRopa;
USE tiendaRopa;

CREATE TABLE Productos
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    tipo        VARCHAR(40)    NOT NULL,
    genero      ENUM('F', 'M') NOT NULL COMMENT 'F = DAMA, M = VARON',
    talla       VARCHAR(12)    NOT NULL,
    precio      DECIMAL(10, 2) NOT NULL,
    creado      DATETIME       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modificado  DATETIME       NULL DEFAULT NULL
) ENGINE = INNODB;

INSERT INTO Productos
	(tipo, genero, talla, precio)VALUES
    ('Pantalon', 'F', '28', 75.50),
    ('Camisa', 'M', 'XL', 150.99),
    ('Short', 'M', 'M', 169.90);
    
CREATE TABLE Usuarios
(
    id        	INT AUTO_INCREMENT PRIMARY KEY,
    username  	VARCHAR(50) 	NOT NULL UNIQUE,
    passuser  	VARCHAR(255) 	NOT NULL,
    creado    	DATETIME    	NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modificado  DATETIME       	NULL DEFAULT NULL
) ENGINE = INNODB;

-- Insertando tres usuarios con datos de ejemplo
INSERT INTO Usuarios (username, passuser) VALUES
('deyanira0804', 'deyanira04'),
('jhonFrancia', 'jhon1234'),
('tatiana12', 'tati123');

UPDATE Usuarios SET passuser = "$2y$10$UZtgnErMyx5C2hQOb7HtP.9GvDgvE.87VCw3slS7owbREcdoEqreG" WHERE id = 1;
UPDATE Usuarios SET passuser = "$2y$10$/qm9ic3WuN00EjM9nj3RXOTvi2nAZZr/1ciYpDxs2JDb1wafwdnSm" WHERE id = 2;
UPDATE Usuarios SET passuser = "$2y$10$soVViFfSz65AfixwvJmSZ.SMUApIzyyF4CFMuOmUtwbXPbtEfR4Be" WHERE id = 3;


-- Verificando los registros insertados
SELECT * FROM Usuarios;

select * from Productos;