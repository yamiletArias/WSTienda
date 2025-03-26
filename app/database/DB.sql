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

select * from Productos;