pipeline {
    agent {
        docker {
            image 'php:8.2-cli'   // container resmi PHP
            args '-u root'         // jalankan sebagai root supaya bisa write folder workspace
        }
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

        stage('Install Composer') {
            steps {
                sh 'php -r "copy(\'https://getcomposer.org/installer\', \'composer-setup.php\');"'
                sh 'php composer-setup.php'
                sh 'mv composer.phar /usr/local/bin/composer'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist'
            }
        }

        stage('Test') {
            steps {
                sh 'php artisan test'
            }
        }
    }

    post {
        success { echo "Pipeline berhasil ✅" }
        failure { echo "Pipeline gagal ❌" }
    }
}