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
                script {
                    docker.image('shippingdocker/php-composer:8.2').inside('-u root') {
                        sh 'rm -f composer.lock'
                        sh 'composer install'
                    }
                }
            }
        }

        stage('Test') {
            steps {
                script {
                    docker.image('ubuntu').inside('-u root') {
                        sh 'echo "Ini adalah test"'
                    }
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