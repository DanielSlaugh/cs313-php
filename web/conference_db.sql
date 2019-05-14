drop database conference;

create table public.user(
id 			serial primary key, 
username 	varchar, 
password 	varchar

);

create table public.speakers(
id 				serial primary key,
speaker_name 	varchar
	

);

create table public.conference(
id 			serial primary key,
isFall 		boolean, 
year 		int

);


create table public.notes(
id 				serial 	not null primary key, 
user_id 		int not null references public.user(id), 
speaker_id 		int references public.speakers(id), 
conference_id 	int not null references public.conference(id), 
note_text 		text not null

);
