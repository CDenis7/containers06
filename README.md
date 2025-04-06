# Crearea unei aplicații multi-containe
# Scopul lucrării

Famialiarizarea cu gestiunea aplicației multi-container creat cu docker-compose.

# Sarcina

Creearea unei aplicații php pe baza a trei containere: nginx, php-fpm, mariadb, folosind docker-compose.

# Execuție

Cream un repozitoriu containers06 și il copiem pe computerul nostru.

![image](https://github.com/user-attachments/assets/d0bde93a-07d1-49e2-9602-440f09c71043)

# Site-ul pe php

În directorul containers06 cream directorul mounts/site. În acest director, rescriem site-ul pe php, creat în cadrul disciplinei php.

![image](https://github.com/user-attachments/assets/35df8604-4e71-4c23-ab0a-0d74599929f6)

![image](https://github.com/user-attachments/assets/22e03203-8940-4299-803c-6baadc1df23d)

# Fișiere de configurare

Cream fișierul .gitignore în rădăcina proiectului și adăugam următoarele linii:

![image](https://github.com/user-attachments/assets/f3fd3fa5-05eb-4648-9a5e-dc208b40950c)

Cream în directorul containers06 fișierul nginx/default.conf cu următorul conținut:

![image](https://github.com/user-attachments/assets/f17a7026-de32-49d5-b252-a2040d6a9c99)

Cream în directorul containers06 fișierul docker-compose.yml cu următorul conținut:

![image](https://github.com/user-attachments/assets/62893042-0564-4cca-b11e-943f261359e8)

Cream fisierul mysql.env în rădăcina proiectului și adăugam în el următoarele linii:

![image](https://github.com/user-attachments/assets/52f20f37-0493-4c8e-960d-4614a9045a07)

# Pornire și testare

Pornim containerele cu comanda:

docker-compose up -d

![image](https://github.com/user-attachments/assets/acdc008c-ede1-42ee-bac5-612f80b8c822)

Verificam funcționarea site-ului în browser, trecând la adresa http://localhost.

![Uploading image.png…]()

# Răspunsuri la întrebările:

<h3> În ce ordine sunt pornite containerele? </h3>

Containerele sunt pornite conform dependențelor definite în docker-compose. Docker Compose va încerca să le pornească în paralel, dar dacă există dependențe ("depends_on"), va respecta ordinea. În cazul nostru, cum nu avem dependențe explicite, containerele sunt lansate în paralel, dar serviciile care depind de altele vor aștepta până când serviciile dependente sunt disponibile.

<h3> Unde sunt stocate datele bazei de date? </h3>

Datele bazei de date sunt stocate într-un volum numit db_data, care este definit în secțiunea volumes a fișierului docker-compose.yml. Fizic, volumul este gestionat de Docker și stocat în sistemul de fișiere al gazdei.
    
<h3> Cum se numesc containerele proiectului? </h3>

Containerele proiectului vor fi numite automat ca: containers06_frontend_1, containers06_backend_1 și containers06_database_1, unde "containers06" este numele directorului proiectului.

<h3> Trebuie să adăugați încă un fișier app.env cu variabila de mediu APP_VERSION pentru serviciile backend și frontend. Cum se face acest lucru? </h3>

Cream fișierul app.env:

    echo 'APP_VERSION=1.0.0' > app.env

Apoi modificam fișierul docker-compose.yml pentru a adăuga acest fișier la serviciile respective:

      frontend:
      image: nginx:1.19
      volumes:
        - ./mounts/site:/var/www/html
        - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
      ports:
        - "80:80"
      networks:
        - internal
      env_file:
        - app.env
    
    backend:
      image: php:7.4-fpm
      volumes:
        - ./mounts/site:/var/www/html
      networks:
        - internal
      env_file:
        - mysql.env
        - app.env

# Concluzii:

În cadrul acestei lucrări de laborator, am învățat cum să configurăm și să gestionăm o aplicație PHP multi-container folosind Docker Compose. Am configurat trei containere diferite care lucrează împreună pentru a furniza o aplicație web completă: nginx pentru servirea conținutului, PHP-FPM pentru procesarea scripturilor și MySQL pentru baza de date.
Docker Compose simplifică semnificativ gestionarea aplicațiilor complexe, făcând posibilă definirea întregii infrastructuri într-un singur fișier de configurare. Acest lucru facilitează dezvoltarea, testarea și implementarea aplicațiilor într-un mod consistent și reproducibil.
