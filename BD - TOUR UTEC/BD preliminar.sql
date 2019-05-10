create table	sec_usr_usuarios(			
usr_codigo	int	not null	,
usr_correo	varchar(100)	not null	,
usr_contrasena	varchar(50)	not null	,
usr_cod_confirma	varchar(10)	not null	,
usr_estado	bit	not null	,
usr_tipo	varchar(1)	not null	
);				
create table	sec_bit_bitacora(			
bit_codigo	int 	not null	,
bit_codusr	int	not null	,
bit_codtia int not null,
bit_fecha	datetime	not null 	,
bit_descripcion	varchar(150)	not null	
);				
create table sec_tia_tipo_accion(
tia_codigo int not null,
tia_nombre varchar(50) not null
);
create table 	adm_tex_texto		(
tex_codsec	int	not null	,
tex_codidm	int	not null	,
tex_titulo	varchar(200)	 not null	,
tex_contenido varchar(3000)	not null	
);			
create table	adm_edf_edificio			(
edf_codigo	int	not null	,
edf_nombre	varchar(100)	not null	,
edf_orden	int	not null	,
edf_latitud	double	not null	,
edf_altitud	double	not null	
);				
create table	adm_sec_seccion		(	
sec_codigo	int	not null	,
sec_codedf	int	not null	,
sec_orden	int	not null	,
sec_nombre	varchar(150)	not null	,
sec_latitud	double	not null	,
sec_altitud	double	not null	
);
create table	adm_idm_idioma		(	
idm_codigo	int	not null	,
idm_nombre	int	not null	,
idm_icono	varchar(200)	not null	,
idm_audio	varchar(200)	not null	
);				
create table	adm_rec_recursos		(	
rec_codigo	int	not null	,
rec_codsec	int	not null	,
rec_codidm	int	not null	,
rec_url	varchar(300)	not null	,
rec_tipo varchar(3) not null
);				

create table	adm_cmt_comentarios		(	
cmt_codigo	int	not null	,
cmt_comentario	varchar(1000)	not null	,
cmt_codusr int	not null	,
cmt_codsec int not null,
cmt_fecha	datetime	not null,
cmt_estado	varchar(1)
);
