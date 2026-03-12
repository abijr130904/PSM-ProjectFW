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
                        sh '''
                            apt update
                            apt install -y git unzip libzip-dev libicu-dev rsync
                            docker-php-ext-install intl zip
                            git config --global --add safe.directory /var/jenkins_home/workspace/Laravel-DevOps
                            curl -sS https://getcomposer.org/installer | php
                            mv composer.phar /usr/local/bin/composer
                            composer install
                        '''
                    }
                }
            }
        }

        stage("Testing") {
            steps {
                sh 'echo "Pipeline sukses"'
            }
        }

        stage("Deploy") {
            steps {
                sshagent(credentials: ['ssh-prod']) {
                    sh '''
                        # Membuat folder target di host deploy
                        ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null gymwo@172.27.236.254 "mkdir -p ~/laravel-production"

                        # Menyalin seluruh workspace ke host deploy
                        rsync -av -e "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null" ./ gymwo@172.27.236.254:~/laravel-production
                    '''
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
