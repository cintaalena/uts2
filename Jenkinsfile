pipeline {
    agent any
    environment {
        SONAR_TOKEN = credentials('sonarqube-token')
    }
    stages {
        // Tahap 'Checkout' dari tutorial dihapus karena tidak diperlukan

        stage('Install Dependencies') {
            steps {
                bat 'composer install'
            }
        }
        stage('Run PHPUnit') {
            steps {
                bat 'vendor//bin//phpunit --configuration phpunit.xml'
            }
        }
        stage('SonarQube Analysis') {
            steps {
                withSonarQubeEnv('SonarQube') {
                    // Path disesuaikan dengan lokasi di mesin Jenkins
                    bat 'C:\\sonar-scanner-7.1.0.4889-windows-x64\\bin\\sonar-scanner.bat'
                }
            }
        }
    }
    post {
        failure {
            echo 'Pipeline gagal, cek log.'
        }
        success {
            echo 'Pipeline berhasil!'
        }
    }
}
