

/*select Padres.Nombre, Padres.Apellido1, Padres.Apellido2
from multimediosdb2.Padres, multimediosdb2.Estudiantes
where Estudiantes.Id = Padres.Estudiantes_Id;*/

-- Agregar un padre a un estudiante
insert into Padres (Descripcion, Cedula, Nombre, Apellido1, Apellido2, Direccion, 
					Telefono, Ocupacion, Sexo, EstadoCivil, Estudiantes_Id)
values ('Madre', '0369896', 'Paula', 'Mastroeni', 'Castro', 'Liberia', '1236546',
		'Empleada', 'F', 'Casada', '3');

-- Consultar el padre de un estudiante
select Padres.Nombre, Padres.Apellido1, Padres.Apellido2
from multimediosdb2.Padres
where Padres.Estudiantes_Id = (select Id from multimediosdb2.Estudiantes where Id = 2);


select Id, Nombre from multimediosdb2.Estudiantes where Id = 2;


-- Agregar un profesor a la base de datos
insert into multimediosdb2.Profesores (Cedula,  Nombre, Apellido1, Apellido2, 
	UserID, Contraseña)
values ('456789321', 'Luis', 'Delgado', 'Lobo', 'luisdl', '456789321');


-- Agregar un nivel a la base de datos
insert into multimediosdb2.niveles (Descripcion)
values ('Undecimo');

-- Agregar un curso a la base de datos
insert into cursos (Sigla, Nombre)
values ('FM', 'Fisica Mate');



-- Insertando en la tabla curso_nivel_profesor

insert into multimediosdb2.Curso_Nivel_Profesor (Cursos_Id, Niveles_Id, Profesores_Id)
values ('1', '1', '2');


-- Asignar profesres a cursos de distintos niveles
INSERT INTO Curso_Nivel_Profesor(Cursos_Id, Niveles_Id, Profesores_Id)
       SELECT cursos.Id, Niveles.Id, Profesores.Id   
       FROM cursos, Niveles, Profesores
		where Profesores.Nombre = 'Mario' and Niveles.Descripcion = 'Noveno' and
				Cursos.Nombre = 'Ingles';


-- Asignar ausencias tardias y escapadas a un estudiante en algun curso
insert into Ausencias_Tardias_Escapadas (Fecha, Estudiantes_Matriculados_Id,
										Curso_Nivel_Id)
values('2000-05-05', '1', '1');

-- Agregar secciones a los distintos niveles
insert into Secciones (Seccion_Numero, Nivels_Id)
values ('7-5', '1');


-- Procedimiento almacenado para matriular un estudiante en su resoectivo nivel y seccion  a la base de datos
DELIMITER $$
CREATE PROCEDURE InsertarEstudiantesMatriculados(in ano int, in IdEst int, in IdSec int)
BEGIN
	INSERT INTO Estudiantes_Matriculados ()
	values ();
END $$




-- Asignar notas a los estudiantes en cada curso
insert into Notas (Cotidiano, Parcial1, Parcial2, Final, Curso_Nivel_Id, 
					Estudiantes_Matriculados_Id)
values ('20', '20', '20', '20', '2', '3');


$$
-- Consultar lista de clases (Se pasa el Id de la seccion como parametro)
SELECT * FROM Estudiantes
WHERE Estudiantes.Id in (SELECT Estudiantes_Id FROM Estudiantes_Matriculados WHERE Secciones_Id = 2);


-- Reporte de notas al hogar (aqui hay pasar el identificador unico de cada estudiante osea carnet y no un
-- Id como se encuentra aqui)
SELECT Notas.Id, Notas.Cotidiano, Notas.Parcial1, Notas.Parcial2, Notas.Final, Notas.Curso_Nivel_Id, Notas.Estudiantes_Matriculados_Id, 
Estudiantes_Matriculados.Id, Estudiantes_Matriculados.Año,
Curso_Nivel_Profesor.Id,
Estudiantes.Nombre, Estudiantes.Apellido1, Estudiantes.Apellido2,
Cursos.Nombre
FROM Notas JOIN 
Estudiantes_Matriculados ON Notas.Estudiantes_Matriculados_Id = Estudiantes_Matriculados.Id
JOIN Curso_Nivel_Profesor ON Notas.Curso_Nivel_Id = Curso_Nivel_Profesor.Id
JOIN Estudiantes ON Estudiantes_Matriculados.Estudiantes_Id = Estudiantes.Id
JOIN Cursos ON Curso_Nivel_Profesor.Cursos_Id = Cursos.Id
WHERE Estudiantes_Matriculados_Id = 8








