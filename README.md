<br />

<div align="center">
  
  <img src="storage/app/public/logo.png" alt="Logo" width="80" height="80">

  <h3 align="center">Online Shopping System</h3>

  <p align="center">
    Web-based online shopping system following the MVC architechture.
    <br />
    <a href="https://github.com/othneildrew/Best-README-Template"><strong>Live Preview »</strong></a>
    <br />
    <br />

  </p>
</div>



## Built with

* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]


## Attribution

[Favicon created by bqlqn - Flaticon](https://www.flaticon.com/free-icons/buy)


## Getting Started

1- Clone the repository.
```
git clone https://github.com/S-Y-A-N/itcs489-project.git
```

2- Install nvm to install node and npm.
- nvm:

    - [Windows](https://github.com/coreybutler/nvm-windows?tab=readme-ov-file#nvm-for-windows)

    - [Mac/Linux](https://github.com/nvm-sh/nvm?tab=readme-ov-file#install--update-script)

- node and npm: (Terminal as administrator)
```
nvm install latest
```

```
npm install -g npm
```

3- [Install PHP, Composer, and Laravel](https://laravel.com/docs/12.x/installation#installing-php)

4- Run these in the project root to get required dependencies:
```
npm install

# May require editing php.ini to enable extensions
composer update
composer install
```

5- [Install Docker](https://www.docker.com/products/docker-desktop/) and Laravel Sail

Laraval Sail already exists in the project vendor folder. How to run it:

**Mac/Linux:**

Create an alias for Sail by adding this line to ```~/.zshrc``` or ```~/.bashrc``` :
```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

Now you can run the project locally:
```
sail up -d # or ./vendor/bin/sail up -d

npm run dev
```

**Windows:**

You can only run Sail in WSL.

1- Install WSL and Ubuntu from Microsoft Store.

2- Enable "Windows Subsystem for Linux" in Windows Features and reboot.