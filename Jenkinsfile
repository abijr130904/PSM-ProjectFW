pipeline {
    agent any

    stages {
        stage("Checkout") {
            steps {
                checkout scm
            }
        }

        stage("Build") {
            steps {
                script {
                    docker.image('php:8.3-cli').inside('-u root') {
                        // Update dan install dependencies termasuk rsync dan SSH client
                        sh 'apt update'
                        sh 'apt install -y git unzip libzip-dev libicu-dev rsync openssh-client'
                        sh 'docker-php-ext-install intl zip'

                        // Setup Git dan Composer
                        sh 'git config --global --add safe.directory /var/jenkins_home/workspace/Laravel-DevOps'
                        sh 'curl -sS https://getcomposer.org/installer | php'
                        sh 'mv composer.phar /usr/local/bin/composer'
                        sh 'composer install'
                    }
                }
            }
        }

        stage("Testing") {
            steps {
                sh 'echo "Pipeline Laravel berhasil dijalankan"'
            }
        }

        stage("Deploy") {
            steps {
                script {
                    docker.image('php:8.3-cli').inside('-u root') {
                        // Pastikan rsync & SSH client tersedia di container
                        sh 'apt update && apt install -y rsync openssh-client'

                        sshagent(credentials: ['ssh-prod']) {
                            sh '''
                                mkdir -p ~/.ssh
                                chmod 700 ~/.ssh

                                # Tambahkan host ke known_hosts agar SSH tidak menanyakan fingerprint
                                ssh-keyscan -H 172.27.236.254 >> ~/.ssh/known_hosts

                                # Pastikan folder target di host ada
                                ssh gymwo@172.27.236.254 "mkdir -p ~/laravel-production"

                                # Salin seluruh workspace ke host
                                rsync -avz --delete -e "ssh -o StrictHostKeyChecking=no" \
                                ./ gymwo@172.27.236.254:/home/gymwo/laravel-production
                            '''
                        }
                    }
                }
            }
        }
    }

    post {
        always {
            echo "Pipeline selesai"
        }
        success {
            echo "Pipeline berhasil!"
        }
        failure {
            echo "Pipeline gagal. Periksa log!"
        }
    }
}
