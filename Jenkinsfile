pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            steps {
                docker.image('shippingdocker/php-composer:8.1').inside('-u root') {
                    sh 'rm -f composer.lock'
                    sh 'composer install'
                }
            }
        }

        stage('Test') {
            steps {
                docker.image('ubuntu').inside('-u root') {
                    sh 'echo "Ini adalah test"'
                }
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