## Install

### 2. run the sever

A) using apache server

a. add the following to you host file

```bash
# Sample
192.168.59.103  localdock
192.168.59.103  cms.localdock
192.168.59.103  api.localdock
```

b. run apache in docker

`
    docker run -v .../lumen/yoda-prototype:/var/www/ -p 8008:80 -d --name mega-apache mahmoudz/apache-php-ready
`

c. open browser to this link:

`
    http://cms.localdock:808/articles/create
`





B) using artisan (not recommended) 


a. add the following to you host file

```bash
# Sample
127.0.0.1   sample.dev
127.0.0.1   cms.sample.dev
127.0.0.1   api.sample.dev
```

b. run the php server with artisan

`
    php artisan serve --host=sample.dev --port=8000
`

