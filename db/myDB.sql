CREATE DATABASE social_media;


CREATE TABLE public.user(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
);

CREATE TABLE public.message(
   id SERIAL NOT NULL PRIMARY KEY,
   user_id INT NOT NULL REFERENCES public.user(id),
   message_text TEXT NOT NULL
);

-- More Useful commands:

-- heroku pg:psql
-- insert into public.user values(1, 'DanielSlaugh', '12', '12345', 'Daniel');
-- select * from public.user
