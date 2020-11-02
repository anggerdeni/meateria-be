# Meateria Backend
This repository contains laravel-based back-end source code for Meateria Project. Meateria is blablabla.

# How To Run

## Docker way
### setting up for the first time
1. Clone the project 
    - HTTPS: `git clone https://github.com/anggerdeni/meateria-be.git`
    - SSH: `git clone git@github.com:anggerdeni/meateria-be.git`
2. Go into the project directory  
    `cd meateria-be`
3. Build and run the containers using predefined `docker-compose.yml` file  
    `docker-compose up --build -d`
4. Copy `.env.docker` to `.env`  
    `cp .env.docker .env`
5. Enter `meateria-be-app` container using command `docker exec -it meateria-be-app bash`
6. Install all dependency using command `composer install`
7. Migrate the database `php artisan migrate:fresh --seed`
8. Exit the container (Ctrl+D) or just close the terminal
9. Test if app is running on [localhost:40003](http://localhost:40003)
10. To stop the containers, simpy type  
    `docker-compose down`

### running the containers
1. Simply type `docker-compose up`
2. To stop the container type `docker-compose down`

## Other way
TODO

# Note
## Docker
1. There are 5 containers (maybe too many): `meateria-be-app` (Laravel), `meateria-be-db` (MySQL), `meateria-be-nginx` (Nginx), `meateria-be-pma` (PhpMyAdmin), `meateria-be-postwoman` (Postwoman)
2. To enter a container: `docker exec -it <container_name> bash`
3. To enter a container as root: `docker exec -u 0 -it <container_name> bash`

# Contributor
<table>
<tr>
<td align="center"><img src="https://i.ibb.co/hgJzWkq/circle-cropped.png" width="100px;" alt="Ganjar Muhammad Parikesit"/><br /><sub><b>Alfa</b></sub></a><br /></td>
<td align="center"><img src="https://i.ibb.co/hgJzWkq/circle-cropped.png" width="100px;" alt="Ganjar Muhammad Parikesit"/><br /><sub><b>Amarilis</b></sub></a><br /></td>
<td align="center"><img src="https://i.ibb.co/hgJzWkq/circle-cropped.png" width="100px;" alt="Ganjar Muhammad Parikesit"/><br /><sub><b>Ganjar</b></sub></a><br /></td>
<td align="center"><img src="https://i.ibb.co/hgJzWkq/circle-cropped.png" width="100px;" alt="Ganjar Muhammad Parikesit"/><br /><sub><b>Novian</b></sub></a><br /></td>
<td align="center"><img src="https://i.ibb.co/hgJzWkq/circle-cropped.png" width="100px;" alt="Ganjar Muhammad Parikesit"/><br /><sub><b>Retno</b></sub></a><br /></td>
<td align="center"><img src="https://i.ibb.co/hgJzWkq/circle-cropped.png" width="100px;" alt="Ganjar Muhammad Parikesit"/><br /><sub><b>Rizaldi</b></sub></a><br /></td>
</tr>
</table>

# Supervisor
<table>
<td align="center"><img src="https://i.ibb.co/h8Y9Hrb/azhari.png" width="200px;" alt="Azhari Satria Nugraha"/><br /><sub><b>Azhari SN</b></sub></a><br /></td>
</table>