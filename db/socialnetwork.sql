CREATE DATABASE socialnetwork;

CREATE TABLE IF NOT EXISTS usuario
(
	idusuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	apellidoPaterno VARCHAR(50),
	apellidoMaterno VARCHAR(50),
	nacionalidad VARCHAR(50),
	correo VARCHAR(50) NOT NULL UNIQUE,
	clave VARCHAR(50) NOT NULL
);

ALTER TABLE usuario ADD sexo ENUM('Mujer','Hombre') NOT NULL AFTER nacionalidad;
ALTER TABLE usuario ADD foto VARCHAR(255) DEFAULT 'default.png' AFTER sexo;

CREATE TABLE IF NOT EXISTS actualizacion
(
	idactualizacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	actualizacion TEXT NOT NULL,
	hora TIME NOT NULL,
	ipa VARCHAR(50),
	voto INT,
	usuario_fk_a INT,
	FOREIGN KEY(usuario_fk_a) REFERENCES usuario(idusuario)
);

CREATE TABLE IF NOT EXISTS comentario
(
	idcomentario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	comentario TEXT NOT NULL,
	hora_c TIME NOT NULL,
	ip_c VARCHAR(50),
	actualizacion_fk_c INT,
	usuario_fk_c INT,
	FOREIGN KEY(actualizacion_fk_c) REFERENCES actualizacion(idactualizacion),
	FOREIGN KEY(usuario_fk_c) REFERENCES usuario(idusuario)
);

CREATE TABLE IF NOT EXISTS amigos
(
	idamigo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	amigo_fk_a INT,
	amigo INT NOT NULL,
	tipo VARCHAR(50) NOT NULL,
	FOREIGN KEY(amigo_fk_a) REFERENCES usuario(idusuario)
);

CREATE TABLE IF NOT EXISTS votos
(
	idvotos INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usuario_fk_v INT,
	actualizacion_fk_v INT,
	FOREIGN KEY(usuario_fk_v) REFERENCES usuario(idusuario),
	FOREIGN KEY(actualizacion_fk_v) REFERENCES actualizacion(idactualizacion)
);