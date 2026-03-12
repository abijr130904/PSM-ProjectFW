node {

    checkout scm

    stage("Build") {
        docker.image('php:8.3-cli').inside('-u root') {

            sh 'apt update'
            sh 'apt install -y git unzip libzip-dev libicu-dev rsync openssh-client'
            sh 'docker-php-ext-install intl zip'
            sh 'git config --global --add safe.directory /var/jenkins_home/workspace/Laravel-DevOps'
            sh 'curl -sS https://getcomposer.org/installer | php'
            sh 'mv composer.phar /usr/local/bin/composer'
            sh 'composer install'
        }
    }

    stage("Testing") {
        sh 'echo "Pipeline Laravel berhasil dijalankan"'
    }
    
    stage("Deploy") {
        docker.image('php:8.3-cli').inside('-u root') {
            sshagent(credentials: ['ssh-prod']) {
                sh '''
                    mkdir -p ~/.ssh
                    chmod 700 ~/.ssh
    
                    ssh-keyscan -H 172.27.236.254 >> ~/.ssh/known_hosts
    
                    ssh gymwo@172.27.236.254 "mkdir -p ~/laravel-production"
    
                    rsync -avz --delete -e "ssh -o StrictHostKeyChecking=no" \
                    ./ gymwo@172.27.236.254:/home/gymwo/laravel-production
                '''
            }
        }
    }






