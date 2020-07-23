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
