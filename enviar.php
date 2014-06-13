<?php
		if(isset($_POST['boton'])){
                    
                
                   
                        if($_POST['Contact'] == ''){
				$error1 = '<span class="error">Ingrese su nombre</span>';
                                
			}else if($_POST['Address'] == ''){
				$error3 = '<span class="error">Ingrese un asunto</span>';                                
                                
			}else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
				$error2 = '<span class="error">Ingrese un email correcto</span>';

			}else if($_POST['Comments'] == ''){
				$error4 = '<span class="error">Ingrese un mensaje</span>';
			}else{			
				$dest = "ascad.semastec@gmail.com"; //Email de destino
                                
				$nombre = $_POST['Company'];
                                $nombre = $_POST['Contact'];
                                $asunto = $_POST['Address']; //Asunto
                                $asunto = $_POST['Phone']; //Asunto                                
				$email = $_POST['email'];
				$cuerpo = $_POST['Comments']; //Cuerpo del mensaje
				//Cabeceras del correo
				$headers = "From: $nombre $email\r\n"; //Quien envia?
				$headers .= "X-Mailer: PHP5\n";
				$headers .= 'MIME-Version: 1.0' . "\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
				
				if(mail($dest,$asunto,$cuerpo,$headers)){
					$result = '<div class="result_ok">Email enviado correctamente :)</a>';	
					// si el envio fue exitoso reseteamos lo que el usuario escribio:
					
                                        $_POST['Company'] = '';
                                        $_POST['Contact'] = '';
                                        $_POST['Address'] = ''; 
                                        $_POST['Phone'] = '';
                                        $_POST['email'] = '';
                                        $_POST['Comments'] = '';
				}else{
					$result = '<div class="result_fail">Hubo un error al enviar el mensaje :(</a>';
				}
                    
                    
                }
			
	}
	?>