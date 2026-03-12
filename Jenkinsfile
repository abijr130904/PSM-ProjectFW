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
                    // pakai image composer:2 yang sudah ada composer
                    docker.image('composer:2').inside('-u root') {
                        sh '''
                            apt update
                            apt install -y git unzip libzip-dev libicu-dev rsync
                            docker-php-ext-install intl zip
                            git config --global --add safe.directory /var/jenkins_home/workspace/Laravel-DevOps
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
                        ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null gymwo@172.27.236.254 "mkdir -p ~/laravel-production"
                        rsync -av -e "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null" ./ gymwo@172.27.236.254:~/laravel-production
                    '''
                }
            }
        }
    }

    post {
        always { echo "Pipeline selesai" }
        success { echo "Pipeline berhasil!" }
        failure { echo "Pipeline gagal. Periksa log!" }
    }
}
