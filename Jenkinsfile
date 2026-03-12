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
        sh 'echo "Pipeline Laravel berhasil dijalankan"'
    }
}
