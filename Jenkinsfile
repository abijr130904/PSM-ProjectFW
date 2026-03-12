node {

    stage('Clone Repository') {
        checkout scm
    }

    stage('Install Dependency') {
        docker.image('php:8.3-cli').inside {
            sh '''
            apt update
            apt install -y git unzip curl libzip-dev libicu-dev
            docker-php-ext-install intl zip

            curl -sS https://getcomposer.org/installer | php
            mv composer.phar /usr/local/bin/composer

            composer install
            '''
        }
    }

    stage('Laravel Setup') {
        docker.image('php:8.3-cli').inside {
            sh '''
            cp .env.example .env || true
            php artisan key:generate
            '''
        }
    }

    stage('Testing') {
        docker.image('php:8.3-cli').inside {
            sh '''
            php artisan test || true
            '''
        }
    }

    stage('Build Docker Image') {
        sh 'docker build -t laravel-app .'
    }

    stage('Deploy Container') {
        sh '''
        docker stop laravel-app || true
        docker rm laravel-app || true
        docker run -d -p 8000:8000 --name laravel-app laravel-app
        '''
    }

}
