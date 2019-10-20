CREATE TABLE book
( id_book int(5) PRIMARY KEY AUTO_INCREMENT,
 title varchar(100) 
);


CREATE TABLE author
( id_author int(5) PRIMARY KEY AUTO_INCREMENT,  
 name varchar(100)  
);

CREATE TABLE customer
( id_customer int(5) PRIMARY KEY AUTO_INCREMENT,  
 name varchar(100)  
);

CREATE TABLE book_author
( id int(5) PRIMARY KEY AUTO_INCREMENT, 
  id_book int(5),
  id_author int(5),
 FOREIGN KEY (id_book)  REFERENCES book (id_book),
 FOREIGN KEY (id_author)  REFERENCES author (id_author)
);

CREATE TABLE book_customer
( id int(5) PRIMARY KEY AUTO_INCREMENT,
  id_book int(5),
  id_customer int(5),
 FOREIGN KEY (id_book)  REFERENCES book (id_book),
 FOREIGN KEY (id_customer)  REFERENCES customer (id_customer)
);

