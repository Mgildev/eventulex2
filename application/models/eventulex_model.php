<?php
class eventulex_model extends CI_Model 
{
	public function muestraEventos() // Mostrar noticias
    {
    	//SELECT e.id, e.nombre, e.lugar, e.maps, e.fecha_ini, e.fecha_fin, e.aforo, e.descripcion, e.logo, c.nombre FROM evento e, categoria c WHERE e.categoria=c.id AND e.fecha_fin > CURRENT_DATE;

    	$this->db->select('e.id, e.nombre, e.lugar, e.maps, e.fecha_ini, e.fecha_fin, e.aforo, e.descripcion, e.logo, c.nombre as cat');
		$this->db->from('evento e, categoria c');
		$this->db->where('e.categoria=c.id');
		$this->db->where('e.fecha_fin > ' . date(time()));
		$this->db->order_by("e.fecha_ini ASC");
		
		return $this->db->get()->result();
    }

    public function fichaEvento($evento) // Mostrar datos evento seleccionado
    {
    	$this->db->select('e.id, e.nombre, e.lugar, e.maps, e.fecha_ini, e.fecha_fin, e.aforo, e.descripcion, e.logo, c.nombre as cat');
		$this->db->from('evento e, categoria c');
		$this->db->where('e.categoria=c.id');
		$this->db->where('e.id = ' . $evento);
		
		return $this->db->get()->result();
    }

    public function fichaEntradas($evento) // Mostrar entradas relacionadas al evento seleccionado
    {
    	//SELECT e.id, e.id_evento, e.precio, e.fecha_ini, e.fecha_fin, e.hora_ini, e.hora_fin, e.descripcion FROM entrada e WHERE e.id_evento=1 
    	$this->db->select('e.id, e.id_evento, e.precio, e.fecha_ini, e.fecha_fin, e.hora_ini, e.hora_fin, e.descripcion');
		$this->db->from('entrada e');
		$this->db->where('e.id_evento=' . $evento);
		
		return $this->db->get()->result();
    }

    public function compraEntrada($evento) // Insertar entradas en la base de datos
    {

    }
    
 	public function entradasNoPagadas($user) // historial entradas no pagadas por usuario
 	{
		/*SELECT ev.nombre, ev.fecha_ini, ev.fecha_fin, e.descripcion, e.precio
		FROM entrada e, evento ev, ticket t, usuario u
		WHERE e.id_evento=t.id_entrada
		AND t.id_evento=ev.id
		AND t.id_usuario=u.id
		AND t.comprada=0
		AND e.fecha_ini > CURRENT_DATE  <---  date(time()));
		AND t.id=1 */

		$this->db->select('ev.nombre, ev.fecha_ini, ev.fecha_fin, e.descripcion, e.precio');
		$this->db->from('entrada e, evento ev, ticket t, usuario u');
		$this->db->where('e.id_evento=t.id_entrada');
		$this->db->where('t.id_evento=ev.id');
		$this->db->where('t.id_usuario=u.id');
		$this->db->where('t.comprada=0');
		$this->db->where('e.fecha_ini >'. date(time()));
		$this->db->where('t.id=' . $user);
		
		return $this->db->get()->result();
	}

	public function login()  //Login usuario
    {
        $query = $this->db->get_where('usuario', array('alias' => $_POST['alias'], 'contrasenya' => $_POST['pass']));
 
        return $query->result();
    }

    public function existe()  //Si existe en la base de datos el usuario
    {
        $query = $this->db->get_where('usuario', array('alias' => $_POST['alias']));
 
        return $query->result();
    }

    public function existeCorreo()  //Si existe en la base de datos el usuario
    {
        $query = $this->db->get_where('usuario', array('correo' => $_POST['correo']));
 
        return $query->result();
    }

    public function alta()  // Insertar en la BD un nuevo usuario
    {
        $this->nombre = $this->input->post('usuario');
        $this->dni = $this->input->post('dni');
        $this->contrasenya = $this->input->post('pass');
        $this->correo = $this->input->post('correo');
        $this->alias = $this->input->post('alias');
        $this->db->insert('usuario', $this); 
        return TRUE;       
    }

    public function precioBajoEntrada($evento)
    {
    	//SELECT e.precio FROM entrada e WHERE e.id_evento=1 order by e.precio asc limit 1
    	$this->db->select('e.precio');
		$this->db->from('entrada e');
		$this->db->where('e.id_evento=' . $evento);
		$this->db->order_by('e.precio ASC');
		$this->db->limit(1);
		return $this->db->get()->result();
    }
}