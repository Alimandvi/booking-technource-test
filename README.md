Bookings crud (Technource practical test)
- Clone this repository
- Run command: Composer install
- Copy .env.example and create .env file, paste content of .env.example file into .env file
- Run command: php artisan key:generate (to generate APP_KEY)
- Configure database
- Run command: php artisan migrate (to create table)
- Run command: php artisan serve (to run project)


Note: Edit of following fields can't be done because of defined validations at the time of booking
- Booking type
- Booking slot
- Booking date
