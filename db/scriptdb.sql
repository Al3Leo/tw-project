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
-- Name: acquisti; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.acquisti (
    acquirente character varying NOT NULL,
    acquirenteuser character varying NOT NULL,
    idvolo character varying NOT NULL
);


ALTER TABLE public.acquisti OWNER TO www;

--
-- Name: newsletter; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.newsletter (
    email character varying(50) NOT NULL,
    id bigint NOT NULL
);


ALTER TABLE public.newsletter OWNER TO www;

--
-- Name: newsletter_id_seq; Type: SEQUENCE; Schema: public; Owner: www
--

CREATE SEQUENCE public.newsletter_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.newsletter_id_seq OWNER TO www;

--
-- Name: newsletter_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: www
--

ALTER SEQUENCE public.newsletter_id_seq OWNED BY public.newsletter.id;


--
-- Name: utente; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.utente (
    nome character varying(50),
    cognome character varying(50),
    sesso character(1),
    username character varying(25) NOT NULL,
    passworduser character varying(25) NOT NULL,
    indirizzo character varying(50) NOT NULL,
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
    nomeevento character varying,
    etichetta character varying
);


ALTER TABLE public.viaggio OWNER TO www;

--
-- Name: newsletter id; Type: DEFAULT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.newsletter ALTER COLUMN id SET DEFAULT nextval('public.newsletter_id_seq'::regclass);


--
-- Data for Name: acquisti; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.acquisti (acquirente, acquirenteuser, idvolo) FROM stdin;
\.


--
-- Data for Name: newsletter; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.newsletter (email, id) FROM stdin;
\.


--
-- Data for Name: utente; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.utente (nome, cognome, sesso, username, passworduser, indirizzo, datanascita) FROM stdin;
\N	\N	\N	prova	pass	prova@gmail.com	\N
\.


--
-- Data for Name: viaggio; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.viaggio (idevento, prezzoevento, dataevento, nomeevento, etichetta) FROM stdin;
10001	1500.00	2025-06-15	Mercury	planets
10002	2500.00	2025-09-22	Mercury	planets
10003	3500.00	2026-01-10	Mercury	planets
10004	4500.00	2026-04-18	Mercury	planets
10005	5500.00	2026-07-25	Mercury	planets
10006	1500.00	2027-11-30	Mercury	planets
10007	1500.00	2025-06-16	Venus	planets
10008	2500.00	2025-09-23	Venus	planets
10009	3500.00	2026-01-11	Venus	planets
10010	4500.00	2026-04-19	Venus	planets
10011	5500.00	2026-07-26	Venus	planets
10012	1500.00	2027-12-01	Venus	planets
10013	1500.00	2025-06-17	Earth	planets
10014	2500.00	2025-09-24	Earth	planets
10015	3500.00	2026-01-12	Earth	planets
10016	4500.00	2026-04-20	Earth	planets
10017	5500.00	2026-07-27	Earth	planets
10018	1500.00	2027-12-02	Earth	planets
10019	1500.00	2025-06-18	Mars	planets
10020	2500.00	2025-09-25	Mars	planets
10021	3500.00	2026-01-13	Mars	planets
10022	4500.00	2026-04-21	Mars	planets
10023	5500.00	2026-07-28	Mars	planets
10024	1500.00	2027-12-03	Mars	planets
10025	1500.00	2025-06-19	Jupiter	planets
10026	2500.00	2025-09-26	Jupiter	planets
10027	3500.00	2026-01-14	Jupiter	planets
10028	4500.00	2026-04-22	Jupiter	planets
10029	5500.00	2026-07-29	Jupiter	planets
10030	1500.00	2027-12-04	Jupiter	planets
10031	1500.00	2025-06-20	Saturn	planets
10032	2500.00	2025-09-27	Saturn	planets
10033	3500.00	2026-01-15	Saturn	planets
10034	4500.00	2026-04-23	Saturn	planets
10035	5500.00	2026-07-30	Saturn	planets
10036	1500.00	2027-12-05	Saturn	planets
10037	1500.00	2025-06-21	Uranus	planets
10038	2500.00	2025-09-28	Uranus	planets
10039	3500.00	2026-01-16	Uranus	planets
10040	4500.00	2026-04-24	Uranus	planets
10041	5500.00	2026-07-31	Uranus	planets
10042	1500.00	2027-12-06	Uranus	planets
10043	1500.00	2025-06-22	Neptune	planets
10044	2500.00	2025-09-29	Neptune	planets
10045	3500.00	2026-01-17	Neptune	planets
10046	4500.00	2026-04-25	Neptune	planets
10047	5500.00	2026-08-01	Neptune	planets
10048	1500.00	2027-12-07	Neptune	planets
20001	1500.00	2025-06-15	Andromeda	galaxies
20002	2500.00	2025-09-22	Andromeda	galaxies
20003	3500.00	2026-01-10	Andromeda	galaxies
20004	4500.00	2026-04-18	Andromeda	galaxies
20005	5500.00	2026-07-25	Andromeda	galaxies
20006	1500.00	2027-11-30	Andromeda	galaxies
20007	1500.00	2025-06-16	Triangulum	galaxies
20008	2500.00	2025-09-23	Triangulum	galaxies
20009	3500.00	2026-01-11	Triangulum	galaxies
20010	4500.00	2026-04-19	Triangulum	galaxies
20011	5500.00	2026-07-26	Triangulum	galaxies
20012	1500.00	2027-12-01	Triangulum	galaxies
20013	1500.00	2025-06-17	Whirlpool	galaxies
20014	2500.00	2025-09-24	Whirlpool	galaxies
20015	3500.00	2026-01-12	Whirlpool	galaxies
20016	4500.00	2026-04-20	Whirlpool	galaxies
20017	5500.00	2026-07-27	Whirlpool	galaxies
20018	1500.00	2027-12-02	Whirlpool	galaxies
20019	1500.00	2025-06-18	Pinwheel	galaxies
20020	2500.00	2025-09-25	Pinwheel	galaxies
20021	3500.00	2026-01-13	Pinwheel	galaxies
20022	4500.00	2026-04-21	Pinwheel	galaxies
20023	5500.00	2026-07-28	Pinwheel	galaxies
20024	1500.00	2027-12-03	Pinwheel	galaxies
30001	1500.00	2025-06-15	Moon	satellites
30002	2500.00	2025-09-22	Moon	satellites
30003	3500.00	2026-01-10	Moon	satellites
30004	4500.00	2026-04-18	Moon	satellites
30005	5500.00	2026-07-25	Moon	satellites
30006	1500.00	2027-11-30	Moon	satellites
30007	1500.00	2025-06-16	Titan	satellites
30008	2500.00	2025-09-23	Titan	satellites
30009	3500.00	2026-01-11	Titan	satellites
30010	4500.00	2026-04-19	Titan	satellites
30011	5500.00	2026-07-26	Titan	satellites
30012	1500.00	2027-12-01	Titan	satellites
30013	1500.00	2025-06-17	Europa	satellites
30014	2500.00	2025-09-24	Europa	satellites
30015	3500.00	2026-01-12	Europa	satellites
30016	4500.00	2026-04-20	Europa	satellites
30017	5500.00	2026-07-27	Europa	satellites
30018	1500.00	2027-12-02	Europa	satellites
30019	1500.00	2025-06-18	Enceladus	satellites
30020	2500.00	2025-09-25	Enceladus	satellites
30021	3500.00	2026-01-13	Enceladus	satellites
30022	4500.00	2026-04-21	Enceladus	satellites
30023	5500.00	2026-07-28	Enceladus	satellites
30024	1500.00	2027-12-03	Enceladus	satellites
40001	1500.00	2025-06-15	Tarantula Nebula	nebulae
40002	2500.00	2025-09-22	Tarantula Nebula	nebulae
40003	3500.00	2026-01-10	Tarantula Nebula	nebulae
40004	4500.00	2026-04-18	Tarantula Nebula	nebulae
40005	5500.00	2026-07-25	Tarantula Nebula	nebulae
40006	1500.00	2027-11-30	Tarantula Nebula	nebulae
40007	1500.00	2025-06-16	Horsehead	nebulae
40008	2500.00	2025-09-23	Horsehead	nebulae
40009	3500.00	2026-01-11	Horsehead	nebulae
40010	4500.00	2026-04-19	Horsehead	nebulae
40011	5500.00	2026-07-26	Horsehead	nebulae
40012	1500.00	2027-12-01	Horsehead	nebulae
40013	1500.00	2025-06-17	Eagle	nebulae
40014	2500.00	2025-09-24	Eagle	nebulae
40015	3500.00	2026-01-12	Eagle	nebulae
40016	4500.00	2026-04-20	Eagle	nebulae
40017	5500.00	2026-07-27	Eagle	nebulae
40018	1500.00	2027-12-02	Eagle	nebulae
40019	1500.00	2025-06-18	Carina	nebulae
40020	2500.00	2025-09-25	Carina	nebulae
40021	3500.00	2026-01-13	Carina	nebulae
40022	4500.00	2026-04-21	Carina	nebulae
40023	5500.00	2026-07-28	Carina	nebulae
40024	1500.00	2027-12-03	Carina	nebulae
40025	1500.00	2025-06-19	Helix	nebulae
40026	2500.00	2025-09-26	Helix	nebulae
40027	3500.00	2026-01-14	Helix	nebulae
40028	4500.00	2026-04-22	Helix	nebulae
40029	5500.00	2026-07-29	Helix	nebulae
40030	1500.00	2027-12-04	Helix	nebulae
\.


--
-- Name: newsletter_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www
--

SELECT pg_catalog.setval('public.newsletter_id_seq', 3, true);


--
-- Name: acquisti acquisti_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.acquisti
    ADD CONSTRAINT acquisti_pkey PRIMARY KEY (acquirenteuser);


--
-- Name: newsletter newsletter_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.newsletter
    ADD CONSTRAINT newsletter_pkey PRIMARY KEY (id);


--
-- Name: utente utente_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.utente
    ADD CONSTRAINT utente_pkey PRIMARY KEY (username);


--
-- PostgreSQL database dump complete
--

