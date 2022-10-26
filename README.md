# Sectoteca

Plataforma de livros e leitura on-line. Nesta plataforma, é possível criar playlists e nela adicionar conteúdo de tecnologia
conhecidos na internet.

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.


### 📋 Pré-requisitos


- PHP Version 8.1.6
- MySql 8.1.6
- Laravel Framework 9.25.1
- Git


<em>Caso ainda não tenha o Laravel instalado recomendamos a leitura desse artigo: https://hcode.com.br/blog/instalando-e-configurando-o-laravel-no-windows-linux-e-mac</em>

### 🔧 Instalação

Tendo o ambiente já preparado: 

- Starte seu servidor web

- Acesse seu gerenciador de banco de dados (ex: phpmyadmin) e crie um novo banco de dados, configurando as credenciais de sua preferência.

- Abra a pasta em que deseja instalar o projeto.

- Clique com o botão direito e selecione 'Git bash here' para abrir o bash do Git ou abra um gerenciador de versões de sua preferência

- Execute o comando para clonar o repositório do projeto:https://gitlab.com/gabriel.passion/sectotech_challenge_gabrieldemellopaixao.git

```bash
git clone https://gitlab.com/gabriel.passion/sectotech_challenge_gabrieldemellopaixao.git
```

- Acesse a pasta onde foi clonado o repositório e abra o arquivo .env (localizado na raiz da pasta onde está o projeto)

- Neste trecho abaixo, substitua os valores das variáveis pelos dados de acesso ao banco de dados que você criou

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sectotech
DB_USERNAME=root
DB_PASSWORD=
```

- Dentro desta mesma pasta execute o comando abaixo

```bash
php artisan migrate
```

- Logo após, execute o seguinte comando para levantar o servidor:

```bash
php artisan serve
```


## ⚙️ Executando!

- Pronto! Agora basta acessar em seu browser o endereço http://127.0.0.1:8000/ para usufruir da sua SectoTeca (Que tal começar criando uma playlist?). 


## ✒️ Autor


* **Gabriel Paixão** - *Analista de Sistemas Sênior* 

## 📄 Licença

Este projeto é um projeto de avaliação.

## 🎁 Expressões de gratidão

* Obrigado!
* Deus abençõe a todos 🫂;


