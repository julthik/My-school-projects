CREATE SCHEMA newsDB;

--Looge andmebaasi newsDB (valige MySQL, SQLite, PostgreSQL...) ja 
--tabelid news (id, title, description, pubDate, id_category, link), category, user.
CREATE TABLE newsDB.news(
id serial NOT NULL PRIMARY KEY,
title varchar(255) NOT NULL,
description varchar(255) NOT NULL,
pubDate date NOT NULL,
id_category ,
link varchar(255) NOT NULL
);

CREATE TABLE newsDB.category(
id serial NOT NULL PRIMARY KEY,
category_name varchar(50) NOT NULL
);

CREATE TABLE news_category ( 
    actor_id SMALLINT UNSIGNED NOT NULL, 
    film_id SMALLINT UNSIGNED NOT NULL, 
    PRIMARY KEY (actor_id,film_id), 
    CONSTRAINT fk_film_actor_actor FOREIGN KEY (actor_id) REFERENCES actor (actor_id) ON DELETE RESTRICT ON UPDATE CASCADE, 
    CONSTRAINT fk_film_actor_film FOREIGN KEY (film_id) REFERENCES film (film_id) ON DELETE RESTRICT ON UPDATE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

