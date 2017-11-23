# Leitura Diaria

Aplicativo Web, para ser usado como lembrete de livros para leitura.<br>
Desenvolvido com PHP e Javascript.
- CakePHP 2.10.4
- Porto Template 5.7.1
- Porto Admin 1.7.0

## Configuração necessária para funcionamento:

1. Criar base de dados (banco) para utilização local. (Ver script abaixo)

2. Alterar arquivo app/Config/database.php e inserir as informações do banco criado.

       CREATE TABLE `lembretes` (
        `id` int(11) AUTO_INCREMENT PRIMARY KEY,
        `livro_id` int(11) NOT NULL,
        `repetir` int(11) NOT NULL,
        `dias_semana` varchar(7),
        `data_lembrete` date NULL,
        `hora_lembrete` time NOT NULL,
        `created` datetime DEFAULT NULL,
        `modified` datetime DEFAULT NULL
       )
      
       CREATE TABLE `livros` (
        `id` int(11) AUTO_INCREMENT PRIMARY KEY,
        `nome` varchar(200) NOT NULL,
        `total_de_paginas` int(11) NOT NULL,
        `caminho_imagem` text,
        `created` datetime DEFAULT NULL,
        `modified` datetime DEFAULT NULL
       )

## Notificação 

A Notification API funciona apenas em sites com origem segura.


      As "origens seguras" são origens que tem pelo menos um dos seguintes (scheme, host, port) padrões:
      
      (https, *, *)<br>
      (wss, *, *)<br>
      (*, localhost, *)<br>
      (*, 127/8, *)<br>
      (*, :: 1/128, *)<br>
      (file, *, -)<br>
      (chrome-extension, *, -)
      
      Esta lista pode estar incompleta e pode precisar ser alterada.

[Fonte: Chromium](https://www.chromium.org/Home/chromium-security/prefer-secure-origins-for-powerful-new-features)
