create database IF NOT EXISTS bjsea_run DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
grant all on bjsea_run.* to 'bjsea_user'@'%' identified by '123qwe';
flush privileges;
