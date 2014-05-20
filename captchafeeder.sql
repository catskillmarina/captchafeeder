CREATE TABLE captca (
    serialnum   INT NOT NULL AUTO_INCREMENT,
    question    VARCHAR(240),
    answer      VARCHAR(80),
    createdate  DATE,
    lastaccess  TIMESTAMP,
    accesses    INT
);
