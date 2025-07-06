pipeline {
    agent any
    environment {
        SONAR_TOKEN = credentials('squ_15c0d6ac4b95ac29da45a092578e8a08e388969f')
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
                bat 'vendor\\bin\\phpunit --configuration phpunit.xml'
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
