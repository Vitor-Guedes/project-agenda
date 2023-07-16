create table if not exists contacts(
    id int unsigned auto_increment primary key,
    name varchar(150),
    phone varchar(20),
    observations text
) ENGINE=INNODB;