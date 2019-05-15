CREATE DATABASE social_media;

\c social_media


CREATE TABLE public.user(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
);

CREATE TABLE public.message(
   id SERIAL NOT NULL PRIMARY KEY,
   username INT NOT NULL REFERENCES public.user(username),
   message_text TEXT NOT NULL
);