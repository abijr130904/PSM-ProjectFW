node {

    stage('Clone Repository') {
        checkout scm
    }

    stage('Build Docker Image') {
        sh 'docker build -t laravel-app .'
    }

    stage('Run Container') {
        sh '''
        docker stop laravel-app || true
        docker rm laravel-app || true
        docker run -d -p 8000:8000 --name laravel-app laravel-app
        '''
    }

}
