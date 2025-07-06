pipeline {
    agent any
    environment {
        SONAR_TOKEN = credentials('sqp_4776741b07c62ccd65f3a9a0de26fbf378472bd2')
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
                    bat 'C:/sonar-scanner-7.1.0.4889-windows-x64/bin/sonar-scanner.bat'
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
