UI automation text example using Laravel`s Dusk.

Chrome driver is needed. Download it [here](http://chromedriver.chromium.org/downloads)

Add driver`s path to the windows 'Path' enviroment variable

After cloning the project:
1) Copy ".env.example" and rename it to ".env"
2) Set APP_URL (example for prod):
> APP_URL=https://printify.com 
3) Run composer install

To run the test use:
> php artisan dusk
