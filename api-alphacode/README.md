# Instruções
### Passo 1: Construindo a Imagem Docker
 1. Clone o projeto para sua máquina local;
 2. Navegue até a pasta em que está localizado o Dockerfile;
 3. Abra o terminal;
 4. Execute o seguinte comando;

````bash
    docker build -t alphacode-database .
````

>Este comando cria uma imagem Docker chamada alphacode-database.

### Passo 2: Executando o Contêiner MySQL
1. Agora execute o contêiner 

```` bash
    docker run -d -p 3306:3306 -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=alphacode_test alphacode-database
````
>Este comando cria e inicia um contêiner Docker chamado alphacode-database.

### Acessando o Banco de Dados MySQL

Agora você pode acessar o banco de dados MySQL. Use as seguintes informações de conexão:

* Host: localhost (ou 127.0.0.1)
* Porta: 3306
* Nome de usuário: root
* Senha: root
* Banco de dados: alphacode_test