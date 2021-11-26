<?php
	class Vars {
		// BASE DE DATOS
		public $host = "";
		public $usuario = "";
		public $contrasenia  = "";
		public $bd = "";
        
		//MAIL
		public $cuenta = "";
		public $pass = "";
		public $hostMail = "";
		public $puertoMail = 465;
		public $smtpSecure = "";
		public $smtpAuth = true;
		public $from = "";
		public $fromName =  "";
		public $mailAdmin1 = "";
		public $mailAdminName1 = "";
		public $mailAdmin2 = "";
		public $mailAdminName2 = "";
		public $mailAdmin3 = "";
		public $mailAdminName3 = "";

		function __construct($dt)
		{
			//DESARROLLO
			/*
			$this->host = $dt["db.desa.host"];
			$this->usuario = $dt["db.desa.usuario"];
			$this->contrasenia = $dt["db.desa.contrasenia"];
			$this->bd = $dt["db.desa.bd"]; 
			*/
			//PRODUCCION
			
			$this->host = $dt["db.prod.host"];
			$this->usuario = $dt["db.prod.usuario"];
			$this->contrasenia = $dt["db.prod.contrasenia"];
			$this->bd = $dt["db.prod.bd"];
			
			$this->cuenta = $dt["em.cuenta"];
			$this->pass = $dt["em.pass"];
			$this->hostMail = $dt["em.hostMail"];
			$this->puertoMail = $dt["em.puertoMail"];
			$this->smtpSecure = $dt["em.smtpSecure"];
			$this->smtpAuth = $dt["em.smtpAuth"];
			$this->from = $dt["em.from"];
			$this->fromName = $dt["em.fromName"];
			$this->mailAdmin1 = $dt["em.mailAdmin1"];
			$this->mailAdminName1 = $dt["em.mailAdminName1"];
			$this->mailAdmin2 = $dt["em.mailAdmin2"];
			$this->mailAdminName2 = $dt["em.mailAdminName2"];
			$this->mailAdmin3 = $dt["em.mailAdmin3"];
			$this->mailAdminName3 = $dt["em.mailAdminName3"];
		} 
	}
?>