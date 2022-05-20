# COM2027-Software-Engineering-Project
   FitMate Application created by Group 3
   Heroku link can be found here: https://fitmate-application.herokuapp.com/

## Requirement
- Composer
- Npm
- Mysql



## Clone this project



```bash
git clone https://github.com/Peterwisu/FitMate.git
```

### Install dependencies

```bash
composer install 
npm install
```

### Set up .env file
```bash
# create environment files
touch .env
# generate keys in .env file
php artisan key:generate
```
put all required credentials in .env file (Google Map API key,Database,Pusher JS and Mailer)

### Database migration
```bash
# migrates all the tables to database
php artisan migrate
```

### Reset a cache
```
php artisan optimize
```

### Compile webpack.mix.js
```
npm run dev
```
### Start a server
```
php artisan serve
```




## Contribution
- Wish Suharitdamrong
- Julianna Grefkowicz
- Paula Rodriguez
- Oliver Venables
- Hamza Aroussi

## License
University of Surrey and all the members contributed in this project
