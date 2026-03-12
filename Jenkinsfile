node {
    checkout scm

    stage("Build") {
        docker.image('php:8.3-cli').inside('-u root') {
            sh 'apt update'
            sh 'apt install -y git unzip libzip-dev libicu-dev'
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
                ssh-keyscan -H 127.0.0.1 >> ~/.ssh/known_hosts
                rsync -av --delete ./ gymwo@127.0.0.1:/home/gymwo/laravel-production
            '''
        }
    }
}
