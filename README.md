# nbp-service

### Wstępne założenia
1. Możliwość wstrzykiwania serwisu po interfejsie.
2. Możliwość odpalania serwisu przez HTTP (get) i Konsolę.

### To do 
1. Model currency
2. Serwis: kontrakt
3. Serwis: implementacja


**mysql**  
```
CREATE USER 'nbpservice'@'localhost' IDENTIFIED BY '1234'
create database if not exists nbp_service;
GRANT ALL PRIVILEGES ON `nbp_service`.* TO 'nbpservice'@'localhost';
```
**.env**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nbp_service
DB_USERNAME=nbpservice
DB_PASSWORD=1234
```