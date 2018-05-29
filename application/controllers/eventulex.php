<?php
class eventulex extends CI_Controller 
{
    // http://localhost/eventulex2/index.php/eventulex
    public function index() // Página principal
    {

    	$this->load->helper(array('form', 'url'));
    	$this->load->library('table');
    	$this->load->library('session');
        $this->load->model('eventulex_model','',TRUE);
		$data['query'] = $this->eventulex_model->muestraEventos();

        $this->load->view('eventCabecera');
        $this->load->view('eventPrincipal',$data);
        $this->load->view('eventPie');
    }

    public function login()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->view('eventCabecera');
        $this->load->view('eventAcceso');
        $this->load->view('eventPie');
    }

    public function logout()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('/eventulex', 'auto', 301);
    }

    public function usuarioValida()  //Validar usuario registrado
    {
    	// helpers y libraries
    	$this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->library('session');

      // Validaciones
        $this->form_validation->set_rules('alias', 'Alias', 'required', array('required' => 'El Alias es obligatorio.'));

        $this->form_validation->set_rules('pass', 'Contraseña', 'required', array('required' => 'La Contraseña es obligatoria.')); 


        if ($this->form_validation->run()) // Si se valida todo bien 
        {
               
            $this->load->model('eventulex_model','',TRUE);
            $data['query'] = $this->eventulex_model->login();
            if (count($data['query'])!= 0)
            {
              $this->session->set_userdata(array(
                'alias' => $_POST['alias']
              ));
              $this->load->view('eventCabecera');
              $this->load->view('eventUserPrivado'); // <----- Faltara crear la sesión
              $this->load->view('eventPie');
            }
              else
              {
                $data['query'] = $this->eventulex_model->existe();
              if (count($data['query'])!= 0)
              {
                  echo "<script>" .
                      "alert('Contraseña incorrecta');" .
                      "window.location.assign('" . site_url("/eventulex/login/") . "');</script>";
              }
              else
              {
                  echo "<script>" .
                      "alert('Usuario no registrado');" .
                      "window.location.assign('" . site_url("/eventulex/login/") . "');</script>";
              }
            }
        }
        else // Error al validar
        {
            echo "<script>" .
                "alert('Error del servidor, intentelo más tarde');" .
                "window.location.assign('" . site_url("/eventulex/login/") . "');</script>";
        }
    }

    public function validaNuevo() // Validar nuevo usuario
    {
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->library('session');

      // Validaciones
        $this->form_validation->set_rules('usuario', 'Usuario', 'required', array('required' => 'El nombre de Usuario es obligatorio.'));

        $this->form_validation->set_rules('alias', 'Alias', 'required', array('required' => 'El alias es obligatorio.'));

        $this->form_validation->set_rules('pass', 'Contraseña', 'required', array('required' => 'La Contraseña es obligatoria.')); 

        $this->form_validation->set_rules('pass2', 'validación', 'required|matches[pass]', array('required' => 'La validación es obligatoria.', 'matches' => 'Las contraseñas no coinciden.'));

        $this->form_validation->set_rules('dni', 'DNI', 'required|regex_match[/^[0-9XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i]', array('required' => 'El DNI es obligatorio.', 'regex_match' => 'El formato del DNI es incorrecto.')); 

        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email', array('required' => 'El correo es obligatorio.', 'valid_email' => 'El formato del Correo es incorrecto.'));

        if ($this->form_validation->run()) // Si se valida todo bien 
        {
          $this->load->model('eventulex_model','',TRUE);
          $data['query'] = $this->eventulex_model->existe();
          $data['query2'] = $this->eventulex_model->existeCorreo();
          if (count($data['query'])!= 0)
          {
            echo "<script>" .
                  "alert('El usuario ya existe');" .
                  "window.location.assign('" . site_url("/eventulex/login/") . "');</script>";
          }
          else if(count($data['query2'])!= 0)
          {
            echo "<script>" .
                  "alert('El correo ya existe');" .
                  "window.location.assign('" . site_url("/eventulex/login/") . "');</script>";
          }
          else
          {
            $data['query'] = $this->eventulex_model->alta();

            echo "<script>" .
                  "alert('Usuario dado de alta');" .
                  "window.location.assign('" . site_url("/eventulex/") . "');</script>";
          } 
        }
        else // Error al validar
        {
            echo "<script>" .
                "alert('Error del servidor, intentelo más tarde');" .
                "window.location.assign('" . site_url("/eventulex/login/") . "');</script>";
        }
    }

    /*public function acceso()
    {
    	$this->load->view('eventCabecera');
      $this->load->view('eventUserAcceso');
      $this->load->view('eventPie');
    }*/

    public function cargaEvento($evento)
    {
      $this->load->helper(array('form', 'url'));
      $this->load->library('table');
      $this->load->library('session');
      $this->load->model('eventulex_model','',TRUE);
      $data['query'] = $this->eventulex_model->fichaEvento($evento);
      $data2['query2'] = $this->eventulex_model->fichaEntradas($evento);
      
      $this->load->view('eventCabecera');
      $this->load->view('eventPrincipal',$data);
      $this->load->view('eventFichaEvento',$data2);
      $this->load->view('eventPie');
    }

    public function quienes_somos()
    {
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->view('eventCabecera');
      $this->load->view('eventSomos');
      $this->load->view('eventPie');
    }

    public function compraEntrada($evento) //Funcion para añadir las entradas en la base de datos
    {

    }

    public function como_funcionamos()
    {
      $this->load->helper('url');
      $this->load->view('eventCabecera');
      $this->load->view('eventFunciona');
      $this->load->view('eventPie');
    }
}