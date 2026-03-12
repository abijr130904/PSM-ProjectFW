node {
    checkout scm

    stage("Build") {
        docker.image('php:8.3-cli').inside('-u root') {
            sh 'apt update'
            sh 'apt install -y git unzip libzip-dev libicu-dev rsync'
            sh 'docker-php-ext-install intl zip'
            sh 'git config --global --add safe.directory /var/jenkins_home/workspace/Laravel-DevOps'
            sh 'curl -sS https://getcomposer.org/installer | php'
            sh 'mv composer.phar /usr/local/bin/composer'
            sh 'composer install'
        }
    }

    stage("Testing") {
        sh 'echo "Pipeline sukses"'
    }

    stage("Deploy") {
        sshagent(credentials: ['ssh-prod']) {
            sh '''
                mkdir -p ~/.ssh
                ssh-keyscan -H 172.27.236.254 >> ~/.ssh/known_hosts
    
                # Pastikan folder target ada
                ssh gymwo@172.27.236.254 "mkdir -p ~/laravel-production"
    
                # Salin workspace ke host
                rsync -av --delete ./ gymwo@172.27.236.254:/home/gymwo/laravel-production
            '''
        }
    }
}



