-- Criação do usuário para utilização do banco de dados taskmanager
CREATE USER 'taskmanageruser'@'localhost' IDENTIFIED BY '#taskmgr2020-2';

-- Concedendo permissões ao usuário para realizar todas as operações (INSERT, UPDATE, DELETE, CREATE, etc)
--  no banco de dados taskmanager somente no host localhost
GRANT ALL PRIVILEGES ON taskmanager.* TO 'taskmanageruser'@'localhost';

-- Atualizando informações de privilégios dos usuários
FLUSH PRIVILEGES;

