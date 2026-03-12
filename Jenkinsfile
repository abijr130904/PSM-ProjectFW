node {

    stage('Clone Repository') {
        checkout scm
    }

    stage('Build Container') {
        sh 'docker compose build'
    }

    stage('Run Container') {
        sh 'docker compose down || true'
        sh 'docker compose up -d'
    }

}
