## Attribution
[Favicon created by bqlqn - Flaticon](https://www.flaticon.com/free-icons/buy)

## Required Installations
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

5- Laravel Sail

**Mac/Linux:**

Create an alias for Sail by adding this line to ```~/.zshrc``` or ```~/.bashrc``` :
```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

Now you can run the project locally:
```
sail up -d

npm run dev
```

**Windows:**

1- Install WSL2 and Ubuntu from Microsoft Store.

2- Enable "Windows Subsystem for Linux" in Windows Features and reboot.