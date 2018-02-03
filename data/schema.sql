CREATE TABLE IF NOT EXISTS an_statslog
(
  ClientID    varchar(256)  NOT NULL,
  Version     varchar(256)  DEFAULT NULL,
  ProviderStr varchar(256)  DEFAULT NULL,
  ProviderID  varchar(256)  DEFAULT NULL,
  NoteCount   int(11)       DEFAULT NULL,
  LastChanged datetime      NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CreatedAt   datetime      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  Comment     varchar(1024) DEFAULT NULL,

  PRIMARY KEY (ClientID)
);

CREATE TABLE IF NOT EXISTS highscoreentries
(
  GAME_ID   int(11)     NOT NULL,
  POINTS    bigint(20)  DEFAULT NULL,
  PLAYER    varchar(15) NOT NULL,
  PLAYERID  int(11)     NOT NULL DEFAULT '-1',
  CHECKSUM  char(32)    NOT NULL,
  TIMESTAMP timestamp   NOT NULL DEFAULT CURRENT_TIMESTAMP,
  IP        char(41)    NOT NULL,

  PRIMARY KEY (CHECKSUM),
  KEY GAME_ID (GAME_ID,POINTS,PLAYER)
);

CREATE TABLE IF NOT EXISTS highscoregames
(
  ID   int(11)     NOT NULL AUTO_INCREMENT,
  NAME varchar(63) NOT NULL,
  SALT char(6)     NOT NULL,

  PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS updateslog
(
  ID          int(11)     NOT NULL AUTO_INCREMENT,
  programname varchar(64) NOT NULL DEFAULT '0',
  ip          varchar(24) DEFAULT NULL,
  version     varchar(64) DEFAULT NULL,
  date        datetime    DEFAULT NULL,

  PRIMARY KEY (ID)
);
