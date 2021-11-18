# Tennis Test

This POC was built using Sail, Tailwindcss, Alpinejs, Laravel Livewire to illustrate the scoring system for a tennis game


# Running the project

Requirements

This app requires ~php8.0 and composer version 2

 Clone repository
 
    git clone git@github.com:zekini-com/tall-stack-tennis.git

Create .env file

    cp .env.example .env

Run composer install to install composer dependencies at the project root

    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

Serve application

    ./vendor/bin/sail up -d

    http://0.0.0.0:81/

# Running test
To run the unit test

    ./vendor/bin/sail test

# Playing the game
Click on "Player x score" starts the game and the "New Game" resets the game


