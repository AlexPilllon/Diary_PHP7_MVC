## Get Started

## Requisitos base para a aplicação: 

-> Versão do PHP 7.0 em diante;
-> Estar com PDO ativo;
-> Composer caso for rodar local (dar um update antes);


### Passo 1: 

Clone o repositório no site ou subdomínio que deseje instalar a aplicação; 

### Passo 2: 

Crie o usuário e crie o banco de dados para a aplicação, o arquivo do banco está disponível na pasta installation como o nome banco.sql;

### Passo 3: 

Vá em: App\core\Model.php

Na linha 10, altere o host, dbname, username e passwd igual ao que você configurou em seu banco de dados. 

Passo 4: Vá em: public\index.php
Na linha 7, altere o parametro após URL_BASE para o site ou subdomínio ao qual você irá rodar o serviço; 

Pronto! se tudo estiver correto o sistema já estará funcionando, para logar na aplicação você poderá utilizar o usuário:
Email: admin@admin.com
Password: 123456

Após logar crie o seu proprio usuário =)

