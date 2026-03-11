pipeline {
    agent any

    environment {
        APP_NAME = 'laravel-app'
        DOCKER_IMAGE = 'laravel-app-image'
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/username/repo-laravel.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
            }
        }

        stage('Run Tests') {
            steps {
                sh './vendor/bin/phpunit'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh "docker build -t $DOCKER_IMAGE ."
            }
        }

        stage('Deploy') {
            steps {
                sh "docker run -d -p 8000:8000 --name $APP_NAME $DOCKER_IMAGE"
            }
        }
    }

    post {
        success {
            echo 'Pipeline berhasil dijalankan!'
        }
        failure {
            echo 'Pipeline gagal, cek log!'
        }
    }
}
