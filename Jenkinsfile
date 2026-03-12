node {

    stage('Clone Repository') {
        checkout scm
    }

    stage('Build Container') {
        sh 'docker compose build --no-cache'
    }

    stage('Run Container') {
        sh 'docker compose down || true'
        sh 'docker compose up -d'
    }

}

