# Plural Education

## Para Executar com o docker-compose:
 - clone do projeto 
   `git clone https://github.com/exetasmente/livewire-form.git`
 - criar container 
    `docker-compose up -d` - Verificar  arquivo docker-compose.yml
 - instalar composer
    `docker-compose exec php composer install`
 - instalar node 
    `docker-compose run npm install`
 - build js
   `docker-compose run npm run prod`
 - copiar .env.example > .env 
   `cp .env.example .env`
 - criar chave:
    `docker-compose exec php artisan key:generate`
 - migrations (com seed):
   `docker-compose exec php artisan migrate --seed`