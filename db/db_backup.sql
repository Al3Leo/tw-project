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
    acquirente character varying,
    idvolo character varying,
    idacquisto character varying NOT NULL,
    acquirenteuser character varying
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
    passworduser character varying(128) NOT NULL,
    indirizzo character varying(50) NOT NULL,
    datanascita date,
    email_utente character varying
);


ALTER TABLE public.utente OWNER TO www;

--
-- Name: viaggio; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.viaggio (
    idevento character varying(10) NOT NULL,
    prezzoevento numeric(4,0),
    nomeevento character varying,
    etichetta character varying,
    datapartenza date,
    dataritorno date,
    launchlocation character varying
);


ALTER TABLE public.viaggio OWNER TO www;

--
-- Name: newsletter id; Type: DEFAULT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.newsletter ALTER COLUMN id SET DEFAULT nextval('public.newsletter_id_seq'::regclass);


--
-- Data for Name: acquisti; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.acquisti (acquirente, idvolo, idacquisto, acquirenteuser) FROM stdin;
alessio	10001	2312025	ale
alessio	30010	2612025	ale
alessio	30001	2412025	ale
alessio	20015	2712025	ale
alessio	10021	2512025	ale
\.


--
-- Data for Name: newsletter; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.newsletter (email, id) FROM stdin;
\.


--
-- Data for Name: utente; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.utente (nome, cognome, sesso, username, passworduser, indirizzo, datanascita, email_utente) FROM stdin;
\N	\N	\N	prova	pass	prova@gmail.com	\N	\N
Alessio	Leo	M	ale	$2y$10$rxW3OXsSaUhOaQwG9BWxO.eRh/rS62L/UlCEOJftP7mqh2XAZTv4m	Italy	2003-12-19	\N
\.


--
-- Data for Name: viaggio; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.viaggio (idevento, prezzoevento, nomeevento, etichetta, datapartenza, dataritorno, launchlocation) FROM stdin;
10021	1500	Mars	planets	2025-04-14	2025-04-29	Tanegashima Space Center, Giappone\n
30001	1000	Moon	moons	2027-01-26	2027-02-03	Cape Canaveral Space Force Station, Florida, USA
30010	1500	Titan	moons	2025-01-20	2025-01-31	Centro Spaziale Luigi Broglio, Malindi, Kenya
10001	2500	Mercury	planets	2025-02-25	2025-03-08	Kennedy Space Center, Florida, USA
10002	2500	Mercury	planets	2025-09-25	2025-10-06	Kennedy Space Center, Florida, USA
10003	2500	Mercury	planets	2026-09-04	2026-09-15	Kennedy Space Center, Florida, USA
10004	2500	Mercury	planets	2027-06-20	2027-07-01	Kennedy Space Center, Florida, USA
10005	2500	Mercury	planets	2026-02-27	2026-03-10	Kennedy Space Center, Florida, USA
10006	2500	Mercury	planets	2026-12-03	2026-12-14	Kennedy Space Center, Florida, USA
10007	2000	Venus	planets	2026-08-22	2026-09-05	Kennedy Space Center, Florida, USA
10008	2000	Venus	planets	2027-08-30	2027-09-13	Kennedy Space Center, Florida, USA
10009	2000	Venus	planets	2027-07-12	2027-07-26	Kennedy Space Center, Florida, USA
10010	2000	Venus	planets	2025-07-24	2025-08-07	Kennedy Space Center, Florida, USA
10011	2000	Venus	planets	2027-08-18	2027-09-01	Kennedy Space Center, Florida, USA
10012	2000	Venus	planets	2027-11-02	2027-11-16	Kennedy Space Center, Florida, USA
10019	1500	Mars	planets	2027-03-16	2027-03-31	Kennedy Space Center, Florida, USA
10020	1500	Mars	planets	2026-08-20	2026-09-04	Kennedy Space Center, Florida, USA
10022	1500	Mars	planets	2027-07-11	2027-07-26	Cape Canaveral Space Force Station, Florida, USA
10023	1500	Mars	planets	2026-09-03	2026-09-18	Cape Canaveral Space Force Station, Florida, USA
10024	1500	Mars	planets	2026-02-16	2026-03-03	Cape Canaveral Space Force Station, Florida, USA
10025	3500	Jupiter	planets	2026-06-28	2026-07-03	Cape Canaveral Space Force Station, Florida, USA
10026	3500	Jupiter	planets	2025-12-10	2025-12-15	Cape Canaveral Space Force Station, Florida, USA
10027	3500	Jupiter	planets	2025-09-04	2025-09-09	Cape Canaveral Space Force Station, Florida, USA
10028	3500	Jupiter	planets	2026-09-09	2026-09-14	Cape Canaveral Space Force Station, Florida, USA
10029	3500	Jupiter	planets	2026-07-27	2026-08-01	Cape Canaveral Space Force Station, Florida, USA
10030	3500	Jupiter	planets	2025-02-20	2025-02-25	Cape Canaveral Space Force Station, Florida, USA
10031	2500	Saturn	planets	2027-03-07	2027-03-14	Cape Canaveral Space Force Station, Florida, USA
10032	2500	Saturn	planets	2025-07-20	2025-07-27	Cape Canaveral Space Force Station, Florida, USA
10033	2500	Saturn	planets	2025-02-11	2025-02-18	Cape Canaveral Space Force Station, Florida, USA
10034	2500	Saturn	planets	2026-11-04	2026-11-11	Cape Canaveral Space Force Station, Florida, USA
10035	2500	Saturn	planets	2027-12-05	2027-12-12	Cape Canaveral Space Force Station, Florida, USA
10036	2500	Saturn	planets	2026-07-26	2026-08-02	Cape Canaveral Space Force Station, Florida, USA
10037	3500	Uranus	planets	2025-02-16	2025-02-28	Vandenberg Space Force Base, California, USA
10038	3500	Uranus	planets	2025-05-21	2025-06-02	Vandenberg Space Force Base, California, USA
10039	3500	Uranus	planets	2027-05-31	2027-06-12	Vandenberg Space Force Base, California, USA
10040	3500	Uranus	planets	2025-07-01	2025-07-13	Vandenberg Space Force Base, California, USA
10041	3500	Uranus	planets	2027-08-26	2027-09-07	Vandenberg Space Force Base, California, USA
10042	3500	Uranus	planets	2025-01-29	2025-02-10	Vandenberg Space Force Base, California, USA
10043	4500	Neptune	planets	2026-12-12	2026-12-17	Vandenberg Space Force Base, California, USA
10044	4500	Neptune	planets	2027-05-01	2027-05-06	Vandenberg Space Force Base, California, USA
10045	4500	Neptune	planets	2026-11-16	2026-11-21	Vandenberg Space Force Base, California, USA
10046	4500	Neptune	planets	2027-09-25	2027-09-30	Vandenberg Space Force Base, California, USA
10047	4500	Neptune	planets	2026-09-27	2026-10-02	Vandenberg Space Force Base, California, USA
10048	4500	Neptune	planets	2027-08-10	2027-08-15	Vandenberg Space Force Base, California, USA
20001	2000	Andromeda	galaxies	2025-06-26	2025-07-04	Vandenberg Space Force Base, California, USA
20002	2000	Andromeda	galaxies	2026-11-12	2026-11-20	Vandenberg Space Force Base, California, USA
20003	2000	Andromeda	galaxies	2026-05-29	2026-06-06	Vandenberg Space Force Base, California, USA
20004	2000	Andromeda	galaxies	2027-10-14	2027-10-22	Vandenberg Space Force Base, California, USA
20005	2000	Andromeda	galaxies	2027-06-28	2027-07-06	European Spaceport, Kourou, Guyana francese
20006	2000	Andromeda	galaxies	2025-07-02	2025-07-10	European Spaceport, Kourou, Guyana francese
20007	3000	Triangulum	galaxies	2026-08-03	2026-08-12	European Spaceport, Kourou, Guyana francese
20008	3000	Triangulum	galaxies	2027-01-14	2027-01-23	European Spaceport, Kourou, Guyana francese
20009	3000	Triangulum	galaxies	2027-10-20	2027-10-29	European Spaceport, Kourou, Guyana francese
20010	3000	Triangulum	galaxies	2027-05-11	2027-05-20	European Spaceport, Kourou, Guyana francese
20011	3000	Triangulum	galaxies	2027-01-25	2027-02-03	European Spaceport, Kourou, Guyana francese
20012	3000	Triangulum	galaxies	2026-06-04	2026-06-13	European Spaceport, Kourou, Guyana francese
20013	3500	Whirlpool	galaxies	2026-08-16	2026-08-25	European Spaceport, Kourou, Guyana francese
20014	3500	Whirlpool	galaxies	2026-06-14	2026-06-23	European Spaceport, Kourou, Guyana francese
20015	3500	Whirlpool	galaxies	2026-07-04	2026-07-13	Sea Launch Platform, Pacific Ocean
20016	3500	Whirlpool	galaxies	2025-10-05	2025-10-14	Sea Launch Platform, Pacific Ocean
20017	3500	Whirlpool	galaxies	2027-07-15	2027-07-24	Sea Launch Platform, Pacific Ocean
20018	3500	Whirlpool	galaxies	2027-01-17	2027-01-26	Sea Launch Platform, Pacific Ocean
20019	5000	Pinwheel	galaxies	2025-10-16	2025-10-22	Sea Launch Platform, Pacific Ocean
20020	5000	Pinwheel	galaxies	2025-11-20	2025-11-26	Sea Launch Platform, Pacific Ocean
20021	5000	Pinwheel	galaxies	2026-03-06	2026-03-12	Sea Launch Platform, Pacific Ocean
20022	5000	Pinwheel	galaxies	2027-01-31	2027-02-06	Sea Launch Platform, Pacific Ocean
20023	5000	Pinwheel	galaxies	2026-01-16	2026-01-22	Sea Launch Platform, Pacific Ocean
20024	5000	Pinwheel	galaxies	2026-10-14	2026-10-20	Sea Launch Platform, Pacific Ocean
30002	1000	Moon	moons	2025-06-02	2025-06-10	Satish Dhawan Space Centre, India
30003	1000	Moon	moons	2027-11-05	2027-11-13	Satish Dhawan Space Centre, India
30004	1000	Moon	moons	2027-10-24	2027-11-01	Satish Dhawan Space Centre, India
30005	1000	Moon	moons	2025-03-31	2025-04-08	Satish Dhawan Space Centre, India
30006	1000	Moon	moons	2027-10-26	2027-11-03	Satish Dhawan Space Centre, India
30007	1500	Titan	moons	2026-03-18	2026-03-29	Satish Dhawan Space Centre, India
30008	1500	Titan	moons	2026-02-19	2026-03-02	Satish Dhawan Space Centre, India
30009	1500	Titan	moons	2026-02-02	2026-02-13	Satish Dhawan Space Centre, India
30011	1500	Titan	moons	2026-01-19	2026-01-30	Satish Dhawan Space Centre, India
30012	1500	Titan	moons	2027-04-17	2027-04-28	Tanegashima Space Center, Giappone\n
30013	2000	Europa	moons	2026-05-03	2026-05-14	Tanegashima Space Center, Giappone\n
30014	2000	Europa	moons	2027-08-30	2027-09-10	Tanegashima Space Center, Giappone\n
30015	2000	Europa	moons	2026-01-04	2026-01-15	Tanegashima Space Center, Giappone\n
30016	2000	Europa	moons	2027-06-18	2027-06-29	Tanegashima Space Center, Giappone\n
30017	2000	Europa	moons	2025-05-29	2025-06-09	Tanegashima Space Center, Giappone\n
30018	2000	Europa	moons	2026-02-24	2026-03-07	Tanegashima Space Center, Giappone\n
30019	2500	Enceladus	moons	2025-10-31	2025-11-05	Tanegashima Space Center, Giappone\n
30020	2500	Enceladus	moons	2027-10-23	2027-10-28	Tanegashima Space Center, Giappone\n
30021	2500	Enceladus	moons	2027-02-16	2027-02-21	Centro Spaziale Luigi Broglio, Malindi, Kenya
30022	2500	Enceladus	moons	2025-05-09	2025-05-14	Centro Spaziale Luigi Broglio, Malindi, Kenya
30023	2500	Enceladus	moons	2025-03-07	2025-03-12	Tanegashima Space Center, Giappone\n
30024	2500	Enceladus	moons	2025-07-21	2025-07-26	Tanegashima Space Center, Giappone\n
40001	4000	Tarantula	nebulae	2027-10-31	2027-11-08	Jiuquan Satellite Launch Center, Cina\n
40002	4000	Tarantula	nebulae	2027-12-25	2028-01-02	Jiuquan Satellite Launch Center, Cina\n
40003	4000	Tarantula	nebulae	2027-07-02	2027-07-10	Jiuquan Satellite Launch Center, Cina\n
40004	4000	Tarantula	nebulae	2026-10-25	2026-11-02	Centro Spaziale Luigi Broglio, Malindi, Kenya
40005	4000	Tarantula	nebulae	2027-05-15	2027-05-23	Jiuquan Satellite Launch Center, Cina
40006	4000	Tarantula	nebulae	2025-03-03	2025-03-11	Jiuquan Satellite Launch Center, Cina\n
40007	3000	Horsehead	nebulae	2027-09-06	2027-09-13	Centro Spaziale Luigi Broglio, Malindi, Kenya
40008	3000	Horsehead	nebulae	2025-05-31	2025-06-07	Jiuquan Satellite Launch Center, Cina\n
40009	3000	Horsehead	nebulae	2026-11-26	2026-12-03	Jiuquan Satellite Launch Center, Cina\n
40010	3000	Horsehead	nebulae	2027-08-30	2027-09-06	Vostochny Cosmodrome, Russia\n
40011	3000	Horsehead	nebulae	2025-02-12	2025-02-19	Centro Spaziale Luigi Broglio, Malindi, Kenya
40012	3000	Horsehead	nebulae	2025-07-01	2025-07-08	Vostochny Cosmodrome, Russia\n
40013	2500	Eagle	nebulae	2025-01-23	2025-01-29	Vostochny Cosmodrome, Russia\n
40014	2500	Eagle	nebulae	2027-12-14	2027-12-20	Vostochny Cosmodrome, Russia\n
40015	2500	Eagle	nebulae	2027-11-19	2027-11-25	Centro Spaziale Luigi Broglio, Malindi, Kenya
40016	2500	Eagle	nebulae	2025-04-28	2025-05-04	Vostochny Cosmodrome, Russia\n
40017	2500	Eagle	nebulae	2025-06-27	2025-07-03	Vostochny Cosmodrome, Russia\n
40018	2500	Eagle	nebulae	2025-03-05	2025-03-11	Vostochny Cosmodrome, Russia\n
40019	5500	Carina	nebulae	2026-01-29	2026-02-09	Vostochny Cosmodrome, Russia\n
40020	5500	Carina	nebulae	2025-05-23	2025-06-03	Baikonur Cosmodrome, Kazakistan\n
40021	5500	Carina	nebulae	2025-06-16	2025-06-27	Centro Spaziale Luigi Broglio, Malindi, Kenya
40022	5500	Carina	nebulae	2027-09-24	2027-10-05	Baikonur Cosmodrome, Kazakistan\n
40023	5500	Carina	nebulae	2027-12-11	2027-12-22	Baikonur Cosmodrome, Kazakistan\n
40024	5500	Carina	nebulae	2025-06-08	2025-06-19	Baikonur Cosmodrome, Kazakistan\n
40025	6000	Helix	nebulae	2027-01-22	2027-01-28	Baikonur Cosmodrome, Kazakistan\n
40026	6000	Helix	nebulae	2026-05-15	2026-05-21	Baikonur Cosmodrome, Kazakistan\n
40027	6000	Helix	nebulae	2025-10-31	2025-11-06	Centro Spaziale Luigi Broglio, Malindi, Kenya
40028	6000	Helix	nebulae	2025-02-20	2025-02-26	Centro Spaziale Luigi Broglio, Malindi, Kenya
40029	6000	Helix	nebulae	2026-09-19	2026-09-25	Centro Spaziale Luigi Broglio, Malindi, Kenya
40030	6000	Helix	nebulae	2026-04-16	2026-04-22	Centro Spaziale Luigi Broglio, Malindi, Kenya
50001	7800	Pluto	planets	2025-05-05	2029-07-07	Centro Spaziale Luigi Broglio, Malindi, Kenya
50002	7800	Pluto	planets	2025-06-25	2025-07-07	Baikonur Cosmodrome, Kazakistan\n
50003	7800	Pluto	planets	2025-08-08	2025-10-17	Vostochny Cosmodrome, Russia\n
\.


--
-- Name: newsletter_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www
--

SELECT pg_catalog.setval('public.newsletter_id_seq', 3, true);


--
-- Name: acquisti acquisti_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.acquisti
    ADD CONSTRAINT acquisti_pkey PRIMARY KEY (idacquisto);


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
-- Name: viaggio viaggio_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.viaggio
    ADD CONSTRAINT viaggio_pkey PRIMARY KEY (idevento);


--
-- PostgreSQL database dump complete
--

