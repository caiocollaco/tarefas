# Lista de Tarefas

Aplicação para controle de tarefas que permite listar, criar, editar e excluir tarefas, bem como criar novos funcionários.

Cada funcionário poderá ter no máximo 3 tarefas.

Link do repositório: https://github.com/caiocollaco/tarefas

## 🚀 Começando

Este tutorial explicar como implantar e configurar o projeto em sua máquina local.

Deve ser utilizado Sistema Operacional Windows 10 ou 11 e ter acesso de administrador.

Consulte **[Implantação](#-implanta%C3%A7%C3%A3o)** para saber como implantar o projeto.

### 📋 Pré-requisitos

- Sistema Operacional Windows 10 ou 11
- XAMPP, versão 8.2.12
	
	Link de download: https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe

	MySQL, deve ser executado na porta padrão, 3306

- Git, vesão 2.43.2
	Link para download: https://git-scm.com/download/win

### 🔧 Instalação

1º Passo - Abra o Git Bash

2º Passo - Acesse o diretório htdocs do xampp

	Execute o comando a seguir no Git Bash
	cd c/xampp/htdocs

3º Passo - Clone o repositório do projeto

	Execute o comando a seguir no Git Bash
	git clone https://github.com/caiocollaco/tarefas.git

	Será criado um novo diretório com o nome "tarefas", em htdocs

4º Passo - Inicie o xampp

5º Passo - Inicie o servidor Apache através da interface gráfica do xampp

6º Passo - Inicie o banco de dados MySQL através da interface gráfica do xampp

7º Passo - Abra o PHPMyAdmin no browser de sua preferência

	Link de acesso:
	http://localhost/phpmyadmin/

8º Passo - Importe o SQL da Base de Dados através do PHPMyAdmin

	A importação do SQL resultará na criação da Base de Dados do projeto (tarefas),
	bem como as tabelas, relações e regitros necessários para funcionamento do sistema.

9º Passo - Abra o sistema numa nova aba do seu browser

	Link de acesso:
	http://localhost/tarefas

	O sistema será executado automaticamente ao acessar o link, você será direcionado para a lista de tarefas.

## 🛠️ Construído com

* PHP 8.2.12
* MariaDB 10.4.32
* JQuery 3.7.1
* Bootstrap 5.3.2
* Sublime Text 3

## 📌 Versão 0.0.1

## ✒️ Autor

Caio Hornes Collaço (https://github.com/caiocollaco)
