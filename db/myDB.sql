
CREATE DATABASE IF NOT EXISTS social_media
    WITH
    OWNER = postgres
	ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;


CREATE TABLE IF NOT EXISTS public.users(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS public.message(
   id SERIAL NOT NULL PRIMARY KEY,
   user_id INT NOT NULL REFERENCES public.users(id),
   time TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
   message_text TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS public.comment(
   id SERIAL NOT NULL PRIMARY KEY,
   message_id INT NOT NULL REFERENCES public.message(id),
   user_id INT NOT NULL REFERENCES public.users(id),
   comment_text TEXT NOT NULL
);



-- Useful commands:

-- SELECT * FROM pg_stat_activity;
-- heroku pg:psql
-- insert into public.user values(1, 'DanielSlaugh', '12', '12345', 'Daniel');
-- select * from public.user
