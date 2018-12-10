# Gerador-de-questoes-de-multipla-escolha
Um projeto para cadastrar tópicos,subtópicos e questões de múltipla escolha para os mesmos.

Necessario ter instalado o docker e o docker-compose

-Criacao do ambiente docker:
	
	docker-compose up -d --no-deps --build web              //em caso de erro usar sudo
	docker-compose up -d --no-deps --build db

-Rodando o ambiente em background	
	
	docker-compose up -d

Em caso de erro de endereço em uso, trocar a porta no arquivo docker-compose.yaml

Portas sendo usada : 
9000 para visualizar o banco de dados com adminer.

8000 para a aplicação

Endereço utilizado localhost.

Acessar com localhost:8000 a aplicação.

Em caso de erro de permissão, dar permissao a pasta inicial do projeto de leitura para todos.
-No linux
	
	chmod -R o+rw /var/www/html


