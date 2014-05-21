CREATE TABLE captcafeeder IF NOT EXISTS `$name_escaped` (
    `serial`   INT NOT NULL AUTO_INCREMENT,
    `question`    VARCHAR(240) NOT NULL,
    `answer`      VARCHAR(80) NOT NULL,
    `createdate`  DATETIME NOT NULL default '0000-00-00 00:00:00,
    `lastaccess`  TIMESTAMP,
    `accesses`    INT,
    `random`      VARCHAR(133),
    PIMARY KEY (`random`)
);
CREATE INDEX on captchafeeder (`random`);
