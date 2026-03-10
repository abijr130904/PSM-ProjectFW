pipeline {
    agent any

    environment {
        WORKSPACE_DIR = "${WORKSPACE}"
    }

    stages {
        stage('Checkout') {
            steps {
                git(
                    url: 'https://github.com/abijr130904/PSM-ProjectFW.git',
                    branch: 'main',
                    credentialsId: 'devmos-github'
                )
            }
        }

        stage('Setup') {
            steps {
                echo "Memastikan composer dan PHP tersedia"
                sh 'php -v'
                sh 'composer --version || curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist'
            }
        }

        stage('Build') {
            steps {
                echo "Build Laravel project (misal migrate)"
                sh 'php artisan migrate --force'
            }
        }

        stage('Test') {
            steps {
                echo "Menjalankan test Laravel"
                sh 'php artisan test'
            }
        }
    }

    post {
        success {
            echo "Pipeline berhasil ✅"
        }
        failure {
            echo "Pipeline gagal ❌"
        }
    }
}