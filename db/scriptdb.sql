--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2
-- Dumped by pg_dump version 17.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: utente; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.utente (
    nome character varying(50),
    cognome character varying(50),
    sesso character(1),
    username character varying(25),
    passworduser character varying(25),
    indirizzo character varying(50),
    datanascita date
);


ALTER TABLE public.utente OWNER TO www;

--
-- Name: viaggio; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.viaggio (
    idevento character varying(10),
    prezzoevento numeric(8,2),
    dataevento date,
    nomeevento character varying
);


ALTER TABLE public.viaggio OWNER TO www;

--
-- Data for Name: utente; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.utente (nome, cognome, sesso, username, passworduser, indirizzo, datanascita) FROM stdin;
rossella	Pale	F	ross	pass	rossella@gmail.com	\N
\.


--
-- Data for Name: viaggio; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.viaggio (idevento, prezzoevento, dataevento, nomeevento) FROM stdin;
12335	500.00	2025-04-15	Mercury
12336	1500.00	2025-05-23	Venus
12337	2500.00	2025-06-11	Earth
12338	3500.00	2025-07-19	Mars
12339	4500.00	2025-08-30	Jupiter
12340	1300.00	2025-09-15	Saturn
12341	2800.00	2025-10-25	Uranus
12342	3200.00	2025-11-17	Neptune
12343	4700.00	2025-12-28	Pluto
12344	1100.00	2025-04-14	Andromeda
12345	2400.00	2025-05-21	Triangulum
12346	3600.00	2025-06-29	Whirlpool
12347	4900.00	2025-07-10	Pinwheel
12348	1600.00	2025-08-05	Moon
12349	2600.00	2025-09-27	Titan
12350	3400.00	2025-10-13	Europa
12351	4200.00	2025-11-15	Enceladus
12352	1800.00	2025-04-03	Tarantula Nebula
12353	2200.00	2025-05-17	Horsehead
12354	3100.00	2025-06-21	Eagle
12355	4800.00	2025-07-12	Carina
12356	1700.00	2025-08-29	Helix
\.


--
-- PostgreSQL database dump complete
--

