# Steps to run this project: 
## WIP, nechytat, neskusat 

1. Clone the repository

    `git clone https://gitlab.com/xbencat/team-project.git`
2. Make a copy of `.env.example` file

3. Change the name to `.env`

4. Go to laradock/ and run `sudo docker-compose up -d apache2 postgres pgadmin`

5. Run `composer install`

6. Run `php artisan key:generate`

7. Run `npm install`  *nevim ci funguje, to som daval z hlavy*

8. Once it is done, you can see your project on localhost:81, to access Pgadmin, go to localhost:5051

9. To access workspace bash run `sudo docker-compose exec workspace bash`

10. To exit workspace bash run `exit`

FUR GREGOR    
```bash
-- Apache port: 81, 444

-- Elasticsearch ports 9201,9301 
-- Kibana port: 5602 
-- Postgres: 5433
-- PG Admin: 5051
        PGADMIN EMAIL=pgadmin4@pgadmin.org
        PGADMIN PASSWORD=admin

sudo docker-compose up -d apache2 postgres elasticsearch kibana logstash selenium pgadmin
sudo docker-compose logs **
sudo docker-compose build **
```    
