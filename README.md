## Setup local development environment with Homestead

Download & Install [Vagrant](https://www.vagrantup.com) and [Virtualbox](https://www.virutalbox.com)

Install hostname plugin for Vagrant, run command `vagrant plugin install vagrant-hostmanager`

Run `php vender/bin/homestead make` to generate your `Homestead.yaml`

You need an ssh keypair, Homestead defaults to "id_rsa", but you can configure a different pair in the project `Homestead.yaml`. To generate a new key pair see this reference - https://git-scm.com/book/en/v2/Git-on-the-Server-Generating-Your-SSH-Public-Key

Once everything is set up you can visit the project via http://homestead.test in the browser

## Setup the application

Copy the `env.example` to `.env`

Generate the app key - `php artisan key:generate`

Migrate the database - `php artisan migrate`

Install passport keys - `php artisan passport:install`

## Commands

Seeder `php artisan db:seed`

Clear notifications `php artisan notifications:clear`

## API Endpoints

Importable Postman collection file included in repo `api-example.postman_collection`

### Registration

[POST] `/api/register`

Request params: `name`, `email`, `password`

Response: `{"token":"..."}`

### Login

[POST] `/api/login`

Request params: `email`, `password`

Response: `{"token":"..."}`

### Current User

[GET] `/api/user`

Response:
```
{
    "user": {
        "id": 1,
        "name": "User",
        "email": "user@example.com",
        "email_verified_at": null,
        "created_at": "2020-07-23T12:51:03.000000Z",
        "updated_at": "2020-07-23T12:51:03.000000Z"
    }
}
```

### Notifications Index (List)

[GET] `/api/notifications`

Response:
```
{
    "success": true,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "message": "Test notification",
            "read": 0,
            "created_at": "2020-07-23T14:14:12.000000Z",
            "updated_at": "2020-07-23T14:14:12.000000Z"
        }
    ]
}
```

### Notifications Store (Create)

[POST] `/api/notifications`

Request param: `message`

Response:
```
{
    "success": true,
    "data": {
        "message": "Test notification",
        "user_id": 1,
        "updated_at": "2020-07-23T14:14:12.000000Z",
        "created_at": "2020-07-23T14:14:12.000000Z",
        "id": 1
    }
}
```

### Notifications Show

[GET] `/api/notifications/{id}`

Response:
```
{
    "success": true,
    "data": {
        "id": 1,
        "user_id": 1,
        "message": "Test notification",
        "read": 0,
        "created_at": "2020-07-23T14:14:12.000000Z",
        "updated_at": "2020-07-23T14:14:12.000000Z"
    }
}
```

### Notifications Update

[PUT] `/api/notifications/{id}`

Request param: `read` (boolean)

Response:
```
{
    "success": true
}
```

### Notifications Delete

[DELETE] `/api/notifications/{id}`

Response:
```
{
    "success": true
}
```
