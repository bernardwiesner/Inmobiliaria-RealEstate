<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    //Codeigniter : Write Less Do More
  }

  function iniciarSesion($usuario, $clave){
    $this->db->where('usuario',$usuario);
    $this->db->where('clave',md5($clave));

    $query = $this->db->get('usuario');
    $rs = $query->result();


    if(count($rs) > 0){
      $usuario = $rs[0];
      return $usuario;

    }
    return false;

  }

  function eliminarUsuario($id){
    $this->db->where('id=',$id);
    $this->db->delete('usuario');

  }

  function guardarUsuario($usuario){

        $this->db->insert('usuario',$usuario);


  }

  function editarUsuario($usuario){
    $id = $usuario['id'];
    unset($usuario['id']);
    $this->db->where('id=', $id);
    $this->db->update('usuario',$usuario);

  }

  function listarUsuarios(){

    $query = $this->db->get('usuario');
    return $query->result();

  }

  function cargarUsuario($id){
    $usuario = new stdClass();
    $usuario->id = 0;
    $usuario->usuario = "";
    $usuario->clave = "";
    $usuario->nombre = "";
    $usuario->email = "";

    $query = $this->db->query("SELECT id, usuario, cedula, correo, nombre, apellido, telefono, celular, fax, informacion, activo, admin from usuario where id = $id");



    $rs = $query->result();
    if(count($rs) > 0){
      $usuario = $rs[0];
    }

    return $usuario;

  }
}
