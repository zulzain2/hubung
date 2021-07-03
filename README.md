<p align="center"><a href="https//hubung.zulzayn.com/"><img src="https://gitlab.com/zulwaqarzain96/hubung/-/raw/master/public/icons/192.png" width="170"></a></p>

<p align="center">
<a href="https://gitlab.com/ImranShamm/hse-magicx/-/pipelines"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## REQUIREMENT
This installation is intended to be used with laragon that comes with preinstall tools needed for the project for local development environment. For other ways the requirement is still the same but you need to configure them yourself.

Just make sure that your Laragon run with below Environment
- PHP >= 7.4 < 8.0
- MySQL 5.7
- Apache 2.4
- Node v12

## INSTALLATION STEPS

**_To Run Web System_** 

**1) Clone**
- SSH : `git clone git@gitlab.com:zulwaqarzain96/hubung.git`
- HTTPS : `git clone https://gitlab.com/zulwaqarzain96/hubung.git`

**2) run - `composer install`**

**3) run - `npm install`**

**4) Copy .env.example file** 
- change `DB_DATABASE=dev_hubung`

**5) run - `php artisan key:generate`**

**6) run - `php artisan storage:link`**

**7) Create database - dev_hubung**

**8) run - `php artisan migrate`**

**_To Run Websocket_** 

**1) Navigate to - /socket/socket-chat**

**2) Run - `npm install`**

**3) Run - `npm run dev`**
