INSERT INTO rol_usuario (rol_usuario) 
VALUES 
    ('Administrador'),
    ('Editor');

INSERT INTO usuario (nombre, contrasena, id_rol_usuario) 
VALUES 
    ('Admin', '123', 1),
    ('Eddy', '123', 2),
    ('Eddy2', '123', 2);
	
INSERT INTO tipo_recurso (tipo) 
VALUES
	('Imagen'),
	('Video'),
	('PDF'),
	('Musica');

INSERT INTO zona (nombre) 
VALUES 
    ('Xalapa'),
    ('Veracruz'),
    ('Orizaba-Córdoba'),
    ('Poza Rica-Tuxpan'),
    ('Coatzacoalcos-Minatitlán');
	
INSERT INTO sendero (nombre,sede,anio_fundacion,id_zona,url_logo)
VALUES
	('Sendero Interpretativo del Agua','Unidad de Ciencias de la Salud',2023,1,'sendero_agua_xalapa/logo.png'),
	('Tehuan Ti Ameh','Grandes Montañas',2022,3,'sendero_agua_xalapa/logo.png');
	
INSERT INTO zona_sendero (id_zona,id_sendero)
VALUES
	(1,1),
	(3,2);
    
INSERT INTO estacion (numero,nombre,descripcion,latitud,longitud)
VALUES
	(1,'Mapa del sendero','Esta estacion esta compuesta por un cartel',19.560140,-96.930958),
	(2, 'Hombre, agua y salud', 'Esta estación se compone de una placa-pregunta y un cartel informativo', 19.560559, -96.931484),
	(3, 'Áreas Verdes', 'Esta estación se compone de una placa-pregunta y un cartel informativo', 19.560887, -96.931313),
	(4, 'Captación de agua de lluvia', 'Esta estación se compone de dos placas-preguntas y dos carteles informativos', 19.561154, -96.931188),
	(5, 'Potabilización del agua', 'Esta estación se compone de dos placas-preguntas y dos carteles informativos', 19.560846, -96.931039),
	(6, 'Aguas residuales', 'Esta estación se compone de una placa-pregunta y un cartel informativo', 19.560729, -96.930924),
	(7, 'Agua y energía', 'Esta estación se compone de una placa-pregunta y un cartel informativo', 19.560555, -96.930908),
	(8, 'Agua y ciencia', 'Esta estación se compone de una placa-pregunta y un cartel informativo', 19.560012, -96.930798);

INSERT INTO sendero_estacion (id_sendero,id_estacion)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(1,5),
	(1,6),
	(1,7),
	(1,8);

INSERT INTO recurso (numero,url,creditos,id_tipo_recurso)
VALUES
	(1,'sendero_agua_xalapa/cartel_01.png', ' Universidad Veracruzana', 1),
	(2,'sendero_agua_xalapa/cartel_02.png', ' Universidad Veracruzana', 1),
	(3,'sendero_agua_xalapa/cartel_03.png', ' Universidad Veracruzana', 1),
	(4,'sendero_agua_xalapa/cartel_04_1.png', ' Universidad Veracruzana', 1),
	(5,'sendero_agua_xalapa/cartel_04_2.png', ' Universidad Veracruzana', 1),
	(6,'sendero_agua_xalapa/cartel_05.png', ' Universidad Veracruzana', 1),
	(7,'sendero_agua_xalapa/cartel_06.png', ' Universidad Veracruzana', 1),
	(8,'sendero_agua_xalapa/cartel_07.png', ' Universidad Veracruzana', 1),
	(9,'sendero_agua_xalapa/cartel_08.png', ' Universidad Veracruzana', 1);

INSERT INTO estacion_recurso (id_estacion,id_recurso)
VALUES
	(1,1),
	(2,2),
	(3,3),
	(4,4),
	(4,5),
	(5,6),
	(6,7),
	(7,8),
	(8,9);
