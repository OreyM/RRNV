# RRNV Laravel

## Install

Execute command:

```
php artisan passport:install
```

Add next in **.env**:

- `OAUTH_PERSONAL_ACCESS_CLIENT=` - key value from `Personal access client`
- `OAUTH_PASSWORD_GRAND_CLIENT=` - key value from `Password grant client`

## Settings

### Access prefix to the application administration section

By default, the access prefix to the application administration section is set to `admin`. So for:

```
Authentication
http://localhost:8000/admin/login

Administration section
http://localhost:8000/admin/dashboard
```

You can change this behavior in environment variables, file **.env**, by setting the appropriate value of the variable `APP_ADMIN_PREFIX`.

To get this value in a project:

```php
config('app.admin_prefix');
```

To get a route in an application instead of the helper `route()`, use the helper `Routing::url()`, the first parameter in which specify the name of the route without the prefix of the administration section.

## API

### Auth Api

```
Register user
POST    /api/v1/auth/register   auth.register

Login user
POST    /api/v1/auth/login      auth.login

Logout user (token)
GET     /api/v1/auth/logout     auth.logout
```

### User Api

```
GET     /api/v1/user/profile    user.profile
```
