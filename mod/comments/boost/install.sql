-- @author Matthew McNaney <mcnaney at gmail dot com>
-- @version $Id$

CREATE TABLE comments_items (
  id int NOT NULL default 0,
  thread_id int NOT NULL default 0,
  parent int NOT NULL default 0,
  author_ip varchar(15) NOT NULL,
  author_id int NOT NULL default 0,
  subject varchar(100) NOT NULL,
  entry text NOT NULL,
  anon_name varchar(50) default NULL,
  edit_author varchar(50) default NULL,
  create_time int NOT NULL default 0,
  edit_time int NOT NULL default 0,
  edit_reason varchar(255) default NULL,
  reported smallint NOT NULL default 0,
  approved smallint NOT NULL default 1,
  parent_author_id int NOT NULL default 0,
  parent_anon_name varchar(50) default NULL,
  protected smallint NOT NULL default 0,
  PRIMARY KEY  (id)
);

CREATE TABLE comments_threads (
  id int NOT NULL default 0,
  key_id int NOT NULL default 0,
  total_comments int NOT NULL default 0,
  last_poster varchar(40) default NULL,
  allow_anon smallint NOT NULL default 0,
  approval smallint not null default 0,
  locked      smallint NOT NULL default '0',
  PRIMARY KEY  (id)
);

CREATE TABLE comments_users (
  user_id int NOT NULL default 0,
  display_name varchar(50) NOT NULL,
  comments_made int NOT NULL default 0,
  joined_date int NOT NULL default 0,
  locked smallint NOT NULL default 0,
  suspendmonitors smallint NOT NULL default 0,
  monitordefault smallint NOT NULL default 1,
  securitylevel smallint NOT NULL default -1,
  groups varchar(50) NOT NULL,
  PRIMARY KEY  (user_id)
);

CREATE UNIQUE INDEX userid_idx on comments_users(user_id);

CREATE TABLE comments_monitors (
    thread_id   int NOT NULL,
    user_id     int NOT NULL,
    send_notice smallint NOT NULL default 1,
    suspended smallint NOT NULL default 0
);
CREATE INDEX comments_monitors_user_id_idx ON comments_monitors (user_id, thread_id);
CREATE INDEX comments_monitors_thread_id_idx ON comments_monitors (thread_id, send_notice, suspended);
