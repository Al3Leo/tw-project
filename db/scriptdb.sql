CREATE DATABASE GRUPPO05;
CREATE USER www;
CREATE TABLE utente(
        nome varchar(50),
        cognome varchar(50),
        sesso char,
        username varchar(25),
        passwordUser varchar(25),
		indirizzo varchar(50),
		dataNascita DATE
);
CREATE TABLE viaggio(
	idEvento varchar(10),
	prezzoEvento numeric(5,2),
	dataEvento DATE
);
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;
