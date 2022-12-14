<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Aplicação CRUD em Laravel

Criar uma aplicação utilizando Laravel, MySql 

A aplicação deve prover um sistema de Login e nível de acesso simples. 

O administrador do sistema deverá Manter permissões e Manter usuários, cada usuário com uma ou mais permissões para a execução das seguintes tarefas:

* Manter produtos;
* Manter categorias;
* Manter marcas.

O administrador não tem acesso às tarefas relacionadas a manter produtos, categorias e marcas;
Apenas os CRUDs de usuário e permissões são necessários.

Sobre os usuários
    Administrador;
    Comum


## Instalação

Após instalar o laravel deve rodar:

```bash
php artisan db:seed
```
Os usuario para acesso são:

```
admin@natanfiuza.dev.br 
Senha: abc123

comum@natanfiuza.dev.br 
Senha: abc123

```
### Preview

Utilize o endereço:
[http://crud-laravel.natanfiuza.dev.br/](http://crud-laravel.natanfiuza.dev.br/)
