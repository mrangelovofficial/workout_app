<h1>👋 Gym App - Open Source</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-1.1.0-blue.svg?cacheSeconds=2592000" />
  
  <a href="#" target="_blank">
    <img alt="Maintenance" src="https://img.shields.io/badge/Maintained-yes-green.svg" />
  </a>
  <a href="https://www.codefactor.io/repository/github/mrangelovofficial/gym-app"><img src="https://www.codefactor.io/repository/github/mrangelovofficial/gym-app/badge" alt="CodeFactor" /></a>
</p>

> Gym is a web application that was created for personal use. In it you can create your workout routines, add your exercises and track your development.


## Prerequisites

- php >=7.2.0
- composer >= 1.9.0
- npm >= 6.0.0

## Install

```sh
cp .env.example .env
composer install
npm install && npm run dev
php artisan key:generate
php artisan migrate
```

## Usage

```sh
php artisan serve
```


## Author

👤 **Georgi Angelov**

* Website: https://mrangelov.ga/
* Github: [@mrangelovofficial](https://github.com/mrangelovofficial)



## 📝 License
MIT License
Copyright (c) [2020] [Georgi Angelov](https://github.com/mrangelovofficial)
