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


![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)

![Docker](https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white)

![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

![SASS](https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white)



## Attribution

[Favicon created by bqlqn - Flaticon](https://www.flaticon.com/free-icons/buy)

## Getting Started

### Prerequisites

This section references [Laravel docs](https://laravel.com/docs/12.x/installation#creating-a-laravel-project).

To run the local development environment using Laravel Sail, you need PHP, Composer, and the Laravel installer installed.

**[Run the installation command of your OS.](https://laravel.com/docs/12.x/installation#installing-php)**

**Important:** If you use Windows, you need [WSL](https://learn.microsoft.com/en-us/windows/wsl/install) installed.


### Installation

1- Clone the repository

- In Windows, it is recommended that you clone inside WSL (e.g. from the Ubuntu terminal).
```sh
git clone https://github.com/S-Y-A-N/itcs489-project.git
```
To open in VS code:
```sh
cd path/to/project

code .
```

2- Copy ``.env-example`` and rename it to ``.env`` in your code editor or through command:
```sh
cp .env-example .env
```

3- Install dependencies:
```
composer install
```
```
npm install
```

4- Run through Sail:
 
```sh
./vendor/bin/sail up -d
```
* The flag ``-d`` runs Sail in the background (detatched mode)

Then run:
```
npm run dev
```

To configure a shell alias so you can simply run ``sail up``, add the following line to ``~/.zshrc`` or ``~/.bashrc``:
```sh
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

Now you can run:
```sh
sail up
```

### VS Code Recommended Extentions
- Docker
- Dev Containers
- Bootstrap IntelliSense
- ...