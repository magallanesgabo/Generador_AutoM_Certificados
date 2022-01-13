<?php
    /* Inicializando la sesion del usuario */
    session_start();

    /* Iniciamos Clase Conectar */
    class Conectar{
        protected $dbh;

        /* Funcion Protegida de la cadena de Conexion */
        protected function Conexion(){
            try {
                /* Cadena de Conexion QA*/
				$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=andercode_diplomas","root","");
                /* Cadena de Conexion Produccion*/
				//$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=andercode_diplomas","diploma1","@ndercode");
				return $conectar;
			} catch (Exception $e) {
                /* En Caso hubiera un error en la cadena de conexion */
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        }

        /* Para impedir que tengamos problemas con las ñ o tildes */
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        /* Ruta principal del proyecto */
        public static function ruta(){
            //QA
            return "http://localhost:90/PERSONAL_CertificadosDiplomas/";
            //Produccion
            //return "http://diplomas.anderson-bastidas.com/";
        }

    }
?>