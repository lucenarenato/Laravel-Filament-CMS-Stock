CREATE USER 'sail'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'sail'@'%' WITH GRANT OPTION;

ALTER USER sail
IDENTIFIED WITH caching_sha2_password
BY 'password';

CREATE USER 'sail'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'sail'@'localhost' WITH GRANT OPTION;

CREATE USER 'root'@'%' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;

SET GLOBAL log_bin_trust_function_creators = 1;

FLUSH PRIVILEGES;
