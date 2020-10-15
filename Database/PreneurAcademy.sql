/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     15/10/2020 23:20:21                          */
/*==============================================================*/


drop table if exists CATEGORY;

drop table if exists NAVBAR;

drop table if exists POST;

drop table if exists POST_VIEW;

drop table if exists TAGS;

drop table if exists USER;

/*==============================================================*/
/* Table: CATEGORY                                              */
/*==============================================================*/
create table CATEGORY
(
   ID_CT                char(10) not null,
   NM_CT                varchar(200),
   primary key (ID_CT)
);

/*==============================================================*/
/* Table: NAVBAR                                                */
/*==============================================================*/
create table NAVBAR
(
   ID_NV                char(5) not null,
   NM_NV                varchar(20),
   LINK_NV              varchar(100),
   primary key (ID_NV)
);

/*==============================================================*/
/* Table: POST                                                  */
/*==============================================================*/
create table POST
(
   ID_POST              char(10) not null,
   ID_CT                char(10) not null,
   ID_USER              char(10) not null,
   ID_TAGS              char(10) not null,
   JUDUL_POST           varchar(200),
   KONTEN_POST          text,
   TGL_POST             varchar(20),
   FOTO_POST            varchar(100),
   UPDT_TRAKHIR         varchar(20),
   primary key (ID_POST)
);

/*==============================================================*/
/* Table: POST_VIEW                                             */
/*==============================================================*/
create table POST_VIEW
(
   ID_VIEW              char(10) not null,
   ID_POST              char(10) not null,
   TGL_VIEW             varchar(20),
   IP_PENGGUNA          varchar(20),
   primary key (ID_VIEW)
);

/*==============================================================*/
/* Table: TAGS                                                  */
/*==============================================================*/
create table TAGS
(
   ID_TAGS              char(10) not null,
   NM_TAGS              varchar(100),
   primary key (ID_TAGS)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID_USER              char(10) not null,
   NM_USER              varchar(100),
   primary key (ID_USER)
);

alter table POST add constraint FK_RELATIONSHIP_1 foreign key (ID_CT)
      references CATEGORY (ID_CT) on delete restrict on update restrict;

alter table POST add constraint FK_RELATIONSHIP_2 foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table POST add constraint FK_RELATIONSHIP_3 foreign key (ID_TAGS)
      references TAGS (ID_TAGS) on delete restrict on update restrict;

alter table POST_VIEW add constraint FK_RELATIONSHIP_4 foreign key (ID_POST)
      references POST (ID_POST) on delete restrict on update restrict;

