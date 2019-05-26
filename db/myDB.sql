
CREATE DATABASE IF NOT EXISTS social_media
    WITH
    OWNER = postgres
	ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;


CREATE TABLE public.users(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
);

INSERT INTO users (username, password, display_name) VALUES ('DanielSlaugh', 'qwertyuiop0987654321', 'Daniel Slaugh');
INSERT INTO users (username, password, display_name) VALUES ('BobbyRozz', 'PaintersRC00l', 'Bob Ross');


select u.display_name, m.message_text, m.message_time from users u join message m on u.id = m.user_id;


CREATE TABLE public.message(
   id SERIAL NOT NULL PRIMARY KEY,
   user_id INT NOT NULL REFERENCES public.users(id),
   message_time TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
   message_text TEXT NOT NULL
);

INSERT INTO message (user_id, message_text) VALUES (1, 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO message (user_id, message_text) VALUES (1, 'This is my second message');
INSERT INTO message (user_id, message_text) VALUES (2, 'Only Happy Trees');


CREATE TABLE public.comment(
   id SERIAL NOT NULL PRIMARY KEY,
   message_id INT NOT NULL REFERENCES public.message(id),
   user_id INT NOT NULL REFERENCES public.users(id),
   comment_text TEXT NOT NULL
);

INSERT INTO comment (message_id, user_id, comment_text) VALUES (1, 1, 'Cool Script. LOL.');



-- Useful commands:

-- SELECT * FROM pg_stat_activity;
-- heroku pg:psql
-- insert into public.user values(1, 'DanielSlaugh', '12', '12345', 'Daniel');
-- select * from public.user
