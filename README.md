## Installation

- You need to clone the repository first with the given command

```bash
git clone git@github.com:MohamedKhedr700/blog-example.git
```

- Then you have to run 
```bash
Composer install
```
this will install all required packages

- Then create your `.env` file
```bash
cp .env.example .env
```

- Now you can use sail to initialize the project
```bash
./vendor/bin/sail up -d
```

- The final step is to use this command to install project configurations and migrations
```bash
./vendor/bin/sail artisan app:install
```

The project is now up and running on 
**[http://localhost/](http://localhost/)**.

You can use admin dashboard on
**[http://localhost/admin/](http://localhost/admin/)**.

with these credentials

`email: admin@blog.net`

`password: password`

`ps:` You will find a Postman collection and Telescope entries in the `attachments` directory in the project.
