CREATE TABLE captchafeeder (
    `serial`   INT NOT NULL AUTO_INCREMENT,
    `question`    VARCHAR(240) NOT NULL,
    `answer`      VARCHAR(80) NOT NULL,
    `lastaccess`  TIMESTAMP,
    `accesses`    INT,
    PRIMARY KEY (serial)
);
CREATE INDEX on captchafeeder (`serial`);
