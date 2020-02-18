/*==============================================================*/
/* DBMS name:      PostgreSQL 9.x                               */
/* Created on:     17/02/2020 16:21:43                          */
/*==============================================================*/

/*
drop index R21_FK;

drop index PMIS_ARCHIVO_PK;

drop table PMIS_ARCHIVO;

drop index PMIS_AUTORIZACION_PK;

drop table PMIS_AUTORIZACION;

drop index PMIS_ELEMENTO_PK;

drop table PMIS_ELEMENTO;

drop index PMIS_EVENTOS_PK;

drop table PMIS_EVENTOS;

drop index PMIS_FILIAL_PK;

drop table PMIS_FILIAL;

drop index PMIS_FORMATO_PK;

drop table PMIS_FORMATO;

drop index PMIS_FORMULARIO_PK;

drop table PMIS_FORMULARIO;

drop index R20_FK;

drop index R19_FK;

drop index PMIS_GALERIA_PK;

drop table PMIS_GALERIA;

drop index PMIS_GRUPO_PK;

drop table PMIS_GRUPO;

drop index R23_FK;

drop index R18_FK;

drop index PMIS_GRUPO_AUTORIZACION_PK;

drop table PMIS_GRUPO_AUTORIZACION;

drop index R4_FK;

drop index R3_FK;

drop index PMIS_GRUPO_FORM_PK;

drop table PMIS_GRUPO_FORM;

drop index PMIS_GRUPO_USR_PK;

drop table PMIS_GRUPO_USR;

drop index R_LG01_FK;

drop index PMIS_LOG_PK;

drop table PMIS_LOG;

drop index R6_FK;

drop index R5_FK;

drop index PMIS_MONITOREO_PK;

drop table PMIS_MONITOREO;

drop index PMIS_PRIVILEGIO_PK;

drop table PMIS_PRIVILEGIO;

drop index R16_FK;

drop index R15_FK;

drop index PMIS_PRIVILEGIO_ROL_PK;

drop table PMIS_PRIVILEGIO_ROL;

drop index PMIS_PROYECTO_PK;

drop table PMIS_PROYECTO;

drop index R22_FK;

drop index R10_FK;

drop index PMIS_PRY_FILIAL_PK;

drop table PMIS_PRY_FILIAL;

drop index PMIS_ROL_PK;

drop table PMIS_ROL;

drop index R14_FK;

drop index R13_FK;

drop index PMIS_ROL_USUARIO_PK;

drop table PMIS_ROL_USUARIO;

drop index PMIS_UNIDAD_MEDIDA_PK;

drop table PMIS_UNIDAD_MEDIDA;

drop index PMIS_USUARIO_PK;

drop table PMIS_USUARIO;

drop index R12_FK;

drop index R11_FK;

drop index PMIS_USUARIO_FILIAL_PK;

drop table PMIS_USUARIO_FILIAL;

drop index R24_FK;

drop index R17_FK;

drop index PMIS_USUARIO_GRUPO_PK;

drop table PMIS_USUARIO_GRUPO;

drop index R8_FK;

drop index R7_FK;

drop index PMIS_VARIABLE_PK;

drop table PMIS_VARIABLE;

drop index R2_FK;

drop index R1_FK;

drop index PMIS_VARIABLE_GRUPO_PK;

drop table PMIS_VARIABLE_GRUPO;
*/

/*==============================================================*/
/* Table: PMIS_ARCHIVO                                          */
/*==============================================================*/
create table PMIS_ARCHIVO (
   ID_ARCHIVO           SERIAL               not null,
   ID_VARIABLE          INT4                 null,
   NOMBRE_ORG           VARCHAR(150)         null,
   NOMBRE_TEMP          VARCHAR(150)         null,
   CODIGO               VARCHAR(100)         null,
   PATH                 VARCHAR(350)         null,
   FORMATO              VARCHAR(150)         null,
   TIPO                 VARCHAR(50)          null,
   ESTADO               VARCHAR(10)          null,
   USUARIO_MOD          INT4                 null,
   FECHA_MOD            DATE                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_ARCHIVO primary key (ID_ARCHIVO)
);

/*==============================================================*/
/* Index: PMIS_ARCHIVO_PK                                       */
/*==============================================================*/
create unique index PMIS_ARCHIVO_PK on PMIS_ARCHIVO (
ID_ARCHIVO
);

/*==============================================================*/
/* Index: R21_FK                                                */
/*==============================================================*/
create  index R21_FK on PMIS_ARCHIVO (
ID_VARIABLE
);

/*==============================================================*/
/* Table: PMIS_AUTORIZACION                                     */
/*==============================================================*/
create table PMIS_AUTORIZACION (
   ID_AUTORIZACION      SERIAL               not null,
   AUTORIZACION         VARCHAR(150)         null,
   PRIVILEGIO           VARCHAR(150)         null,
   ESTADO               VARCHAR(10)          null,
   FECHA_MOD            DATE                 null,
   USUARIO_MOD          INT4                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_AUTORIZACION primary key (ID_AUTORIZACION)
);

/*==============================================================*/
/* Index: PMIS_AUTORIZACION_PK                                  */
/*==============================================================*/
create unique index PMIS_AUTORIZACION_PK on PMIS_AUTORIZACION (
ID_AUTORIZACION
);

/*==============================================================*/
/* Table: PMIS_ELEMENTO                                         */
/*==============================================================*/
create table PMIS_ELEMENTO (
   ID_ELEMENTO          SERIAL               not null,
   NOMBRE               VARCHAR(150)         null,
   DESCRIPCION          TEXT                 null,
   CODIGO               VARCHAR(100)         null,
   PATH                 VARCHAR(350)         null,
   FORMATO              VARCHAR(150)         null,
   TIPO                 VARCHAR(50)          null,
   ESTADO               VARCHAR(10)          null,
   USUARIO_MOD          INT4                 null,
   FECHA_MOD            DATE                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_ELEMENTO primary key (ID_ELEMENTO)
);

/*==============================================================*/
/* Index: PMIS_ELEMENTO_PK                                      */
/*==============================================================*/
create unique index PMIS_ELEMENTO_PK on PMIS_ELEMENTO (
ID_ELEMENTO
);

/*==============================================================*/
/* Table: PMIS_EVENTOS                                          */
/*==============================================================*/
create table PMIS_EVENTOS (
   ID                   SERIAL               not null,
   EVENTO               VARCHAR(200)         null,
   CODIGO               VARCHAR(100)         null,
   constraint PK_PMIS_EVENTOS primary key (ID)
);

/*==============================================================*/
/* Index: PMIS_EVENTOS_PK                                       */
/*==============================================================*/
create unique index PMIS_EVENTOS_PK on PMIS_EVENTOS (
ID
);

/*==============================================================*/
/* Table: PMIS_FILIAL                                           */
/*==============================================================*/
create table PMIS_FILIAL (
   ID_FILIAL            SERIAL               not null,
   NOMBRE               VARCHAR(150)         null,
   SIGLA                VARCHAR(150)         null,
   DESCRIPCION          TEXT                 null,
   LOGO                 TEXT                 null,
   FECHA_MOD            DATE                 null,
   USUARIO_MOD          INT4                 null,
   ESTADO_REG           VARCHAR(10)          null,
   ESTADO               VARCHAR(10)          null,
   constraint PK_PMIS_FILIAL primary key (ID_FILIAL)
);

/*==============================================================*/
/* Index: PMIS_FILIAL_PK                                        */
/*==============================================================*/
create unique index PMIS_FILIAL_PK on PMIS_FILIAL (
ID_FILIAL
);

/*==============================================================*/
/* Table: PMIS_FORMATO                                          */
/*==============================================================*/
create table PMIS_FORMATO (
   ID_FORMATO           SERIAL               not null,
   FORMATO              VARCHAR(150)         null,
   REGEX                VARCHAR(150)         null,
   DESCRIPCION          TEXT                 null,
   FECHA_MOD            DATE                 null,
   USUARIO_MOD          INT4                 null,
   ESTADO_REG           VARCHAR(10)          null,
   ESTADO               VARCHAR(10)          null,
   constraint PK_PMIS_FORMATO primary key (ID_FORMATO)
);

/*==============================================================*/
/* Index: PMIS_FORMATO_PK                                       */
/*==============================================================*/
create unique index PMIS_FORMATO_PK on PMIS_FORMATO (
ID_FORMATO
);

/*==============================================================*/
/* Table: PMIS_FORMULARIO                                       */
/*==============================================================*/
create table PMIS_FORMULARIO (
   ID_FORMULARIO        SERIAL               not null,
   NOMBRE               VARCHAR(150)         null,
   CODIGO               VARCHAR(100)         null,
   DESCRIPCION          TEXT                 null,
   TIPO                 VARCHAR(50)          null,
   USUARIO_MOD          INT4                 null,
   FECHA_MOD            DATE                 null,
   ESTADO_REG           VARCHAR(10)          null,
   ESTADO               VARCHAR(10)          null,
   constraint PK_PMIS_FORMULARIO primary key (ID_FORMULARIO)
);

/*==============================================================*/
/* Index: PMIS_FORMULARIO_PK                                    */
/*==============================================================*/
create unique index PMIS_FORMULARIO_PK on PMIS_FORMULARIO (
ID_FORMULARIO
);

/*==============================================================*/
/* Table: PMIS_GALERIA                                          */
/*==============================================================*/
create table PMIS_GALERIA (
   ID_ELEMENTO          INT4                 not null,
   ID_PROYECTO          INT4                 not null,
   ID_GALERIA           SERIAL               not null,
   NOMBRE               VARCHAR(150)         null,
   DESCRIPCION          TEXT                 null,
   ESTADO               VARCHAR(10)          null,
   FECHA_MOD            DATE                 null,
   USUARIO_MOD          INT4                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_GALERIA primary key (ID_ELEMENTO, ID_PROYECTO, ID_GALERIA)
);

/*==============================================================*/
/* Index: PMIS_GALERIA_PK                                       */
/*==============================================================*/
create unique index PMIS_GALERIA_PK on PMIS_GALERIA (
ID_ELEMENTO,
ID_PROYECTO,
ID_GALERIA
);

/*==============================================================*/
/* Index: R19_FK                                                */
/*==============================================================*/
create  index R19_FK on PMIS_GALERIA (
ID_ELEMENTO
);

/*==============================================================*/
/* Index: R20_FK                                                */
/*==============================================================*/
create  index R20_FK on PMIS_GALERIA (
ID_PROYECTO
);

/*==============================================================*/
/* Table: PMIS_GRUPO                                            */
/*==============================================================*/
create table PMIS_GRUPO (
   ID_GRUPO             SERIAL               not null,
   NOMBRE               VARCHAR(150)         null,
   DESCRIPCION          TEXT                 null,
   FECHA_MOD            DATE                 null,
   USUARIO_MOD          INT4                 null,
   ESTADO_REG           VARCHAR(10)          null,
   ORDEN                INT4                 null,
   ESTADO               VARCHAR(10)          null,
   CODIGO               VARCHAR(100)         null,
   constraint PK_PMIS_GRUPO primary key (ID_GRUPO)
);

/*==============================================================*/
/* Index: PMIS_GRUPO_PK                                         */
/*==============================================================*/
create unique index PMIS_GRUPO_PK on PMIS_GRUPO (
ID_GRUPO
);

/*==============================================================*/
/* Table: PMIS_GRUPO_AUTORIZACION                               */
/*==============================================================*/
create table PMIS_GRUPO_AUTORIZACION (
   ID_GRUPO_USR         INT4                 not null,
   ID_AUTORIZACION      INT4                 not null,
   constraint PK_PMIS_GRUPO_AUTORIZACION primary key (ID_GRUPO_USR, ID_AUTORIZACION)
);

/*==============================================================*/
/* Index: PMIS_GRUPO_AUTORIZACION_PK                            */
/*==============================================================*/
create unique index PMIS_GRUPO_AUTORIZACION_PK on PMIS_GRUPO_AUTORIZACION (
ID_GRUPO_USR,
ID_AUTORIZACION
);

/*==============================================================*/
/* Index: R18_FK                                                */
/*==============================================================*/
create  index R18_FK on PMIS_GRUPO_AUTORIZACION (
ID_GRUPO_USR
);

/*==============================================================*/
/* Index: R23_FK                                                */
/*==============================================================*/
create  index R23_FK on PMIS_GRUPO_AUTORIZACION (
ID_AUTORIZACION
);

/*==============================================================*/
/* Table: PMIS_GRUPO_FORM                                       */
/*==============================================================*/
create table PMIS_GRUPO_FORM (
   ID_GRUPO             INT4                 not null,
   ID_FORMULARIO        INT4                 not null,
   constraint PK_PMIS_GRUPO_FORM primary key (ID_GRUPO, ID_FORMULARIO)
);

/*==============================================================*/
/* Index: PMIS_GRUPO_FORM_PK                                    */
/*==============================================================*/
create unique index PMIS_GRUPO_FORM_PK on PMIS_GRUPO_FORM (
ID_GRUPO,
ID_FORMULARIO
);

/*==============================================================*/
/* Index: R3_FK                                                 */
/*==============================================================*/
create  index R3_FK on PMIS_GRUPO_FORM (
ID_GRUPO
);

/*==============================================================*/
/* Index: R4_FK                                                 */
/*==============================================================*/
create  index R4_FK on PMIS_GRUPO_FORM (
ID_FORMULARIO
);

/*==============================================================*/
/* Table: PMIS_GRUPO_USR                                        */
/*==============================================================*/
create table PMIS_GRUPO_USR (
   ID_GRUPO_USR         SERIAL               not null,
   GRUPO                VARCHAR(200)         null,
   constraint PK_PMIS_GRUPO_USR primary key (ID_GRUPO_USR)
);

/*==============================================================*/
/* Index: PMIS_GRUPO_USR_PK                                     */
/*==============================================================*/
create unique index PMIS_GRUPO_USR_PK on PMIS_GRUPO_USR (
ID_GRUPO_USR
);

/*==============================================================*/
/* Table: PMIS_LOG                                              */
/*==============================================================*/
create table PMIS_LOG (
   ID                   INT4                 not null,
   _ID                  SERIAL               not null,
   ID_FORM              INT4                 null,
   ID_VAR               INT4                 null,
   CODIGO_VAR           VARCHAR(50)          null,
   TIPO_VAR             VARCHAR(150)         null,
   VALOR_ANT            TEXT                 null,
   VALOR_NUEVO          TEXT                 null,
   URI                  VARCHAR(450)         null,
   METHOD               VARCHAR(10)          null,
   PARAMS               TEXT                 null,
   IP                   VARCHAR(15)          null,
   RESPONSE             TEXT                 null,
   KEY                  TEXT                 null,
   USUARIO_REG          INT4                 null,
   FECHA_REG            DATE                 null,
   constraint PK_PMIS_LOG primary key (ID, _ID)
);

/*==============================================================*/
/* Index: PMIS_LOG_PK                                           */
/*==============================================================*/
create unique index PMIS_LOG_PK on PMIS_LOG (
ID,
_ID
);

/*==============================================================*/
/* Index: R_LG01_FK                                             */
/*==============================================================*/
create  index R_LG01_FK on PMIS_LOG (
ID
);

/*==============================================================*/
/* Table: PMIS_MONITOREO                                        */
/*==============================================================*/
create table PMIS_MONITOREO (
   ID_MONITOREO         SERIAL               not null,
   ID_PROYECTO          INT4                 null,
   ID_FORMULARIO        INT4                 null,
   constraint PK_PMIS_MONITOREO primary key (ID_MONITOREO)
);

/*==============================================================*/
/* Index: PMIS_MONITOREO_PK                                     */
/*==============================================================*/
create unique index PMIS_MONITOREO_PK on PMIS_MONITOREO (
ID_MONITOREO
);

/*==============================================================*/
/* Index: R5_FK                                                 */
/*==============================================================*/
create  index R5_FK on PMIS_MONITOREO (
ID_FORMULARIO
);

/*==============================================================*/
/* Index: R6_FK                                                 */
/*==============================================================*/
create  index R6_FK on PMIS_MONITOREO (
ID_PROYECTO
);

/*==============================================================*/
/* Table: PMIS_PRIVILEGIO                                       */
/*==============================================================*/
create table PMIS_PRIVILEGIO (
   ID_PRIVILEGIO        SERIAL               not null,
   PRIVILEGIO           VARCHAR(150)         null,
   ROUTE                VARCHAR(400)         null,
   EDITAR               VARCHAR(10)          null,
   BORRAR               VARCHAR(10)          null,
   CREAR                VARCHAR(10)          null,
   VER                  VARCHAR(10)          null,
   ESTADO               VARCHAR(10)          null,
   FECHA_MOD            DATE                 null,
   USUARIO_MOD          INT4                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_PRIVILEGIO primary key (ID_PRIVILEGIO)
);

/*==============================================================*/
/* Index: PMIS_PRIVILEGIO_PK                                    */
/*==============================================================*/
create unique index PMIS_PRIVILEGIO_PK on PMIS_PRIVILEGIO (
ID_PRIVILEGIO
);

/*==============================================================*/
/* Table: PMIS_PRIVILEGIO_ROL                                   */
/*==============================================================*/
create table PMIS_PRIVILEGIO_ROL (
   ID_PRIVILEGIO        INT4                 not null,
   ID_ROL               INT4                 not null,
   constraint PK_PMIS_PRIVILEGIO_ROL primary key (ID_PRIVILEGIO, ID_ROL)
);

/*==============================================================*/
/* Index: PMIS_PRIVILEGIO_ROL_PK                                */
/*==============================================================*/
create unique index PMIS_PRIVILEGIO_ROL_PK on PMIS_PRIVILEGIO_ROL (
ID_PRIVILEGIO,
ID_ROL
);

/*==============================================================*/
/* Index: R15_FK                                                */
/*==============================================================*/
create  index R15_FK on PMIS_PRIVILEGIO_ROL (
ID_PRIVILEGIO
);

/*==============================================================*/
/* Index: R16_FK                                                */
/*==============================================================*/
create  index R16_FK on PMIS_PRIVILEGIO_ROL (
ID_ROL
);

/*==============================================================*/
/* Table: PMIS_PROYECTO                                         */
/*==============================================================*/
create table PMIS_PROYECTO (
   ID_PROYECTO          SERIAL               not null,
   NOMBRE               VARCHAR(150)         null,
   CODIGO_SISIN         VARCHAR(60)          null,
   ESTADO               VARCHAR(10)          null,
   USUARIO_MOD          INT4                 null,
   FECHA_MOD            DATE                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_PROYECTO primary key (ID_PROYECTO)
);

/*==============================================================*/
/* Index: PMIS_PROYECTO_PK                                      */
/*==============================================================*/
create unique index PMIS_PROYECTO_PK on PMIS_PROYECTO (
ID_PROYECTO
);

/*==============================================================*/
/* Table: PMIS_PRY_FILIAL                                       */
/*==============================================================*/
create table PMIS_PRY_FILIAL (
   ID_FILIAL            INT4                 not null,
   ID_PROYECTO          INT4                 not null,
   constraint PK_PMIS_PRY_FILIAL primary key (ID_FILIAL, ID_PROYECTO)
);

/*==============================================================*/
/* Index: PMIS_PRY_FILIAL_PK                                    */
/*==============================================================*/
create unique index PMIS_PRY_FILIAL_PK on PMIS_PRY_FILIAL (
ID_FILIAL,
ID_PROYECTO
);

/*==============================================================*/
/* Index: R10_FK                                                */
/*==============================================================*/
create  index R10_FK on PMIS_PRY_FILIAL (
ID_FILIAL
);

/*==============================================================*/
/* Index: R22_FK                                                */
/*==============================================================*/
create  index R22_FK on PMIS_PRY_FILIAL (
ID_PROYECTO
);

/*==============================================================*/
/* Table: PMIS_ROL                                              */
/*==============================================================*/
create table PMIS_ROL (
   ID_ROL               SERIAL               not null,
   ROL                  VARCHAR(150)         null,
   ESTADO               VARCHAR(10)          null,
   constraint PK_PMIS_ROL primary key (ID_ROL)
);

/*==============================================================*/
/* Index: PMIS_ROL_PK                                           */
/*==============================================================*/
create unique index PMIS_ROL_PK on PMIS_ROL (
ID_ROL
);

/*==============================================================*/
/* Table: PMIS_ROL_USUARIO                                      */
/*==============================================================*/
create table PMIS_ROL_USUARIO (
   ID_USUARIO           INT4                 not null,
   ID_ROL               INT4                 not null,
   constraint PK_PMIS_ROL_USUARIO primary key (ID_USUARIO, ID_ROL)
);

/*==============================================================*/
/* Index: PMIS_ROL_USUARIO_PK                                   */
/*==============================================================*/
create unique index PMIS_ROL_USUARIO_PK on PMIS_ROL_USUARIO (
ID_USUARIO,
ID_ROL
);

/*==============================================================*/
/* Index: R13_FK                                                */
/*==============================================================*/
create  index R13_FK on PMIS_ROL_USUARIO (
ID_USUARIO
);

/*==============================================================*/
/* Index: R14_FK                                                */
/*==============================================================*/
create  index R14_FK on PMIS_ROL_USUARIO (
ID_ROL
);

/*==============================================================*/
/* Table: PMIS_UNIDAD_MEDIDA                                    */
/*==============================================================*/
create table PMIS_UNIDAD_MEDIDA (
   ID_UNIDAD            SERIAL               not null,
   UNIDAD_MEDIDA        VARCHAR(150)         null,
   DESCRIPCION          TEXT                 null,
   SIMBOLO              VARCHAR(50)          null,
   USUARIO_MOD          INT4                 null,
   FECHA_MOD            DATE                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_UNIDAD_MEDIDA primary key (ID_UNIDAD)
);

/*==============================================================*/
/* Index: PMIS_UNIDAD_MEDIDA_PK                                 */
/*==============================================================*/
create unique index PMIS_UNIDAD_MEDIDA_PK on PMIS_UNIDAD_MEDIDA (
ID_UNIDAD
);

/*==============================================================*/
/* Table: PMIS_USUARIO                                          */
/*==============================================================*/
create table PMIS_USUARIO (
   ID_USUARIO           SERIAL               not null,
   USERNAME             VARCHAR(150)         null,
   PASSWORD             VARCHAR(150)         null,
   ESTADO               VARCHAR(10)          null,
   LDAP                 VARCHAR(10)          null,
   USUARIO_MOD          INT4                 null,
   FECHA_MOD            DATE                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_USUARIO primary key (ID_USUARIO)
);

/*==============================================================*/
/* Index: PMIS_USUARIO_PK                                       */
/*==============================================================*/
create unique index PMIS_USUARIO_PK on PMIS_USUARIO (
ID_USUARIO
);

/*==============================================================*/
/* Table: PMIS_USUARIO_FILIAL                                   */
/*==============================================================*/
create table PMIS_USUARIO_FILIAL (
   ID_FILIAL            INT4                 not null,
   ID_USUARIO           INT4                 not null,
   constraint PK_PMIS_USUARIO_FILIAL primary key (ID_FILIAL, ID_USUARIO)
);

/*==============================================================*/
/* Index: PMIS_USUARIO_FILIAL_PK                                */
/*==============================================================*/
create unique index PMIS_USUARIO_FILIAL_PK on PMIS_USUARIO_FILIAL (
ID_FILIAL,
ID_USUARIO
);

/*==============================================================*/
/* Index: R11_FK                                                */
/*==============================================================*/
create  index R11_FK on PMIS_USUARIO_FILIAL (
ID_FILIAL
);

/*==============================================================*/
/* Index: R12_FK                                                */
/*==============================================================*/
create  index R12_FK on PMIS_USUARIO_FILIAL (
ID_USUARIO
);

/*==============================================================*/
/* Table: PMIS_USUARIO_GRUPO                                    */
/*==============================================================*/
create table PMIS_USUARIO_GRUPO (
   ID_GRUPO_USR         INT4                 not null,
   ID_USUARIO           INT4                 not null,
   constraint PK_PMIS_USUARIO_GRUPO primary key (ID_GRUPO_USR, ID_USUARIO)
);

/*==============================================================*/
/* Index: PMIS_USUARIO_GRUPO_PK                                 */
/*==============================================================*/
create unique index PMIS_USUARIO_GRUPO_PK on PMIS_USUARIO_GRUPO (
ID_GRUPO_USR,
ID_USUARIO
);

/*==============================================================*/
/* Index: R17_FK                                                */
/*==============================================================*/
create  index R17_FK on PMIS_USUARIO_GRUPO (
ID_GRUPO_USR
);

/*==============================================================*/
/* Index: R24_FK                                                */
/*==============================================================*/
create  index R24_FK on PMIS_USUARIO_GRUPO (
ID_USUARIO
);

/*==============================================================*/
/* Table: PMIS_VARIABLE                                         */
/*==============================================================*/
create table PMIS_VARIABLE (
   ID_VARIABLE          SERIAL               not null,
   ID_UNIDAD            INT4                 not null,
   ID_FORMATO           INT4                 not null,
   NOMBRE               VARCHAR(150)         null,
   DESCRIPCION          TEXT                 null,
   LABEL                VARCHAR(150)         null,
   CODIGO               VARCHAR(100)         null,
   REQUERIDA            VARCHAR(10)          null,
   ESTATICA             VARCHAR(10)          null,
   FORMULA              VARCHAR(10)          null,
   OPERABLE             VARCHAR(10)          null,
   "TABLE"              VARCHAR(10)          null,
   ORDEN                INT4                 null,
   ESTADO               VARCHAR(10)          null,
   USUARIO_MOD          INT4                 null,
   FECHA_MOD            DATE                 null,
   ESTADO_REG           VARCHAR(10)          null,
   constraint PK_PMIS_VARIABLE primary key (ID_VARIABLE)
);

/*==============================================================*/
/* Index: PMIS_VARIABLE_PK                                      */
/*==============================================================*/
create unique index PMIS_VARIABLE_PK on PMIS_VARIABLE (
ID_VARIABLE
);

/*==============================================================*/
/* Index: R7_FK                                                 */
/*==============================================================*/
create  index R7_FK on PMIS_VARIABLE (
ID_UNIDAD
);

/*==============================================================*/
/* Index: R8_FK                                                 */
/*==============================================================*/
create  index R8_FK on PMIS_VARIABLE (
ID_FORMATO
);

/*==============================================================*/
/* Table: PMIS_VARIABLE_GRUPO                                   */
/*==============================================================*/
create table PMIS_VARIABLE_GRUPO (
   ID_VARIABLE          INT4                 not null,
   ID_GRUPO             INT4                 not null,
   constraint PK_PMIS_VARIABLE_GRUPO primary key (ID_VARIABLE, ID_GRUPO)
);

/*==============================================================*/
/* Index: PMIS_VARIABLE_GRUPO_PK                                */
/*==============================================================*/
create unique index PMIS_VARIABLE_GRUPO_PK on PMIS_VARIABLE_GRUPO (
ID_VARIABLE,
ID_GRUPO
);

/*==============================================================*/
/* Index: R1_FK                                                 */
/*==============================================================*/
create  index R1_FK on PMIS_VARIABLE_GRUPO (
ID_VARIABLE
);

/*==============================================================*/
/* Index: R2_FK                                                 */
/*==============================================================*/
create  index R2_FK on PMIS_VARIABLE_GRUPO (
ID_GRUPO
);

alter table PMIS_ARCHIVO
   add constraint FK_PMIS_ARC_R21_PMIS_VAR foreign key (ID_VARIABLE)
      references PMIS_VARIABLE (ID_VARIABLE)
      on delete restrict on update restrict;

alter table PMIS_GALERIA
   add constraint FK_PMIS_GAL_R19_PMIS_ELE foreign key (ID_ELEMENTO)
      references PMIS_ELEMENTO (ID_ELEMENTO)
      on delete restrict on update restrict;

alter table PMIS_GALERIA
   add constraint FK_PMIS_GAL_R20_PMIS_PRO foreign key (ID_PROYECTO)
      references PMIS_PROYECTO (ID_PROYECTO)
      on delete restrict on update restrict;

alter table PMIS_GRUPO_AUTORIZACION
   add constraint FK_PMIS_GRU_R18_PMIS_GRU foreign key (ID_GRUPO_USR)
      references PMIS_GRUPO_USR (ID_GRUPO_USR)
      on delete restrict on update restrict;

alter table PMIS_GRUPO_AUTORIZACION
   add constraint FK_PMIS_GRU_R23_PMIS_AUT foreign key (ID_AUTORIZACION)
      references PMIS_AUTORIZACION (ID_AUTORIZACION)
      on delete restrict on update restrict;

alter table PMIS_GRUPO_FORM
   add constraint FK_PMIS_GRU_R3_PMIS_GRU foreign key (ID_GRUPO)
      references PMIS_GRUPO (ID_GRUPO)
      on delete restrict on update restrict;

alter table PMIS_GRUPO_FORM
   add constraint FK_PMIS_GRU_R4_PMIS_FOR foreign key (ID_FORMULARIO)
      references PMIS_FORMULARIO (ID_FORMULARIO)
      on delete restrict on update restrict;

alter table PMIS_LOG
   add constraint FK_PMIS_LOG_R_LG01_PMIS_EVE foreign key (ID)
      references PMIS_EVENTOS (ID)
      on delete restrict on update restrict;

alter table PMIS_MONITOREO
   add constraint FK_PMIS_MON_R5_PMIS_FOR foreign key (ID_FORMULARIO)
      references PMIS_FORMULARIO (ID_FORMULARIO)
      on delete restrict on update restrict;

alter table PMIS_MONITOREO
   add constraint FK_PMIS_MON_R6_PMIS_PRO foreign key (ID_PROYECTO)
      references PMIS_PROYECTO (ID_PROYECTO)
      on delete restrict on update restrict;

alter table PMIS_PRIVILEGIO_ROL
   add constraint FK_PMIS_PRI_R15_PMIS_PRI foreign key (ID_PRIVILEGIO)
      references PMIS_PRIVILEGIO (ID_PRIVILEGIO)
      on delete restrict on update restrict;

alter table PMIS_PRIVILEGIO_ROL
   add constraint FK_PMIS_PRI_R16_PMIS_ROL foreign key (ID_ROL)
      references PMIS_ROL (ID_ROL)
      on delete restrict on update restrict;

alter table PMIS_PRY_FILIAL
   add constraint FK_PMIS_PRY_R10_PMIS_FIL foreign key (ID_FILIAL)
      references PMIS_FILIAL (ID_FILIAL)
      on delete restrict on update restrict;

alter table PMIS_PRY_FILIAL
   add constraint FK_PMIS_PRY_R22_PMIS_PRO foreign key (ID_PROYECTO)
      references PMIS_PROYECTO (ID_PROYECTO)
      on delete restrict on update restrict;

alter table PMIS_ROL_USUARIO
   add constraint FK_PMIS_ROL_R13_PMIS_USU foreign key (ID_USUARIO)
      references PMIS_USUARIO (ID_USUARIO)
      on delete restrict on update restrict;

alter table PMIS_ROL_USUARIO
   add constraint FK_PMIS_ROL_R14_PMIS_ROL foreign key (ID_ROL)
      references PMIS_ROL (ID_ROL)
      on delete restrict on update restrict;

alter table PMIS_USUARIO_FILIAL
   add constraint FK_PMIS_USU_R11_PMIS_FIL foreign key (ID_FILIAL)
      references PMIS_FILIAL (ID_FILIAL)
      on delete restrict on update restrict;

alter table PMIS_USUARIO_FILIAL
   add constraint FK_PMIS_USU_R12_PMIS_USU foreign key (ID_USUARIO)
      references PMIS_USUARIO (ID_USUARIO)
      on delete restrict on update restrict;

alter table PMIS_USUARIO_GRUPO
   add constraint FK_PMIS_USU_R17_PMIS_GRU foreign key (ID_GRUPO_USR)
      references PMIS_GRUPO_USR (ID_GRUPO_USR)
      on delete restrict on update restrict;

alter table PMIS_USUARIO_GRUPO
   add constraint FK_PMIS_USU_R24_PMIS_USU foreign key (ID_USUARIO)
      references PMIS_USUARIO (ID_USUARIO)
      on delete restrict on update restrict;

alter table PMIS_VARIABLE
   add constraint FK_PMIS_VAR_R7_PMIS_UNI foreign key (ID_UNIDAD)
      references PMIS_UNIDAD_MEDIDA (ID_UNIDAD)
      on delete restrict on update restrict;

alter table PMIS_VARIABLE
   add constraint FK_PMIS_VAR_R8_PMIS_FOR foreign key (ID_FORMATO)
      references PMIS_FORMATO (ID_FORMATO)
      on delete restrict on update restrict;

alter table PMIS_VARIABLE_GRUPO
   add constraint FK_PMIS_VAR_R1_PMIS_VAR foreign key (ID_VARIABLE)
      references PMIS_VARIABLE (ID_VARIABLE)
      on delete restrict on update restrict;

alter table PMIS_VARIABLE_GRUPO
   add constraint FK_PMIS_VAR_R2_PMIS_GRU foreign key (ID_GRUPO)
      references PMIS_GRUPO (ID_GRUPO)
      on delete restrict on update restrict;

