
   INFO  Running migrations.  

  2014_10_12_100000_create_password_reset_tokens_table ..................................................................................  
  ⇂ create table "password_reset_tokens" ("email" varchar(255) not null, "token" varchar(255) not null, "created_at" timestamp(0) without time zone null)  
  ⇂ alter table "password_reset_tokens" add primary key ("email")  
  2019_08_19_000000_create_failed_jobs_table ............................................................................................  
  ⇂ create table "failed_jobs" ("id" bigserial not null primary key, "uuid" varchar(255) not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" timestamp(0) without time zone not null default CURRENT_TIMESTAMP)  
  ⇂ alter table "failed_jobs" add constraint "failed_jobs_uuid_unique" unique ("uuid")  
  2019_12_14_000001_create_personal_access_tokens_table .................................................................................  
  ⇂ create table "personal_access_tokens" ("id" bigserial not null primary key, "tokenable_type" varchar(255) not null, "tokenable_id" bigint not null, "name" varchar(255) not null, "token" varchar(64) not null, "abilities" text null, "last_used_at" timestamp(0) without time zone null, "expires_at" timestamp(0) without time zone null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)  
  ⇂ create index "personal_access_tokens_tokenable_type_tokenable_id_index" on "personal_access_tokens" ("tokenable_type", "tokenable_id")  
  ⇂ alter table "personal_access_tokens" add constraint "personal_access_tokens_token_unique" unique ("token")  
  2024_03_17_063020_create_users_table ..................................................................................................  
  ⇂ create table "users" ("id" bigserial not null primary key, "username" varchar(255) not null, "email" varchar(255) not null, "password" varchar(255) not null, "role" varchar(255) not null, "avatar" varchar(255) null, "background_image" varchar(255) null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)  
  2024_03_17_064741_create_books_table ..................................................................................................  
  ⇂ create table "books" ("id" bigserial not null primary key, "title" varchar(255) not null, "author_id" bigint not null, "publication_year" timestamp(0) without time zone not null, "description" varchar(255) not null, "pdf_link" varchar(255) not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)  
  ⇂ alter table "books" add constraint "books_author_id_foreign" foreign key ("author_id") references "authors" ("id") on delete cascade  
  2024_03_19_113723_create_authors_table ................................................................................................  
  ⇂ create table "authors" ("id" bigserial not null primary key, "description" varchar(255) not null, "is_verified" boolean not null, "user_id" bigint not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)  
  ⇂ alter table "authors" add constraint "authors_user_id_foreign" foreign key ("user_id") references "users" ("id") on delete cascade  
  2024_03_22_113112_create_reviews_table ................................................................................................  
  ⇂ create table "reviews" ("id" bigserial not null primary key, "user_id" bigint not null, "book_id" bigint not null, "content" varchar(255) not null, "rating" bigint not null, "created_at" timestamp(0) without time zone null, "updated_at" timestamp(0) without time zone null)  
  ⇂ alter table "reviews" add constraint "reviews_user_id_foreign" foreign key ("user_id") references "users" ("id") on delete cascade  
  ⇂ alter table "reviews" add constraint "reviews_book_id_foreign" foreign key ("book_id") references "books" ("id") on delete cascade  

