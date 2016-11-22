<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    //Codeigniter : Write Less Do More
  }

  function editarUsuario($usuario){
    $id = $usuario['id'];
    unset($usuario['id']);
    $this->db->where('id=', $id);
    $this->db->update('usuario',$usuario);

  }

  function listarTipos(){

    $query = $this->db->get('tipo');
    return $query->result();

  }

  function cargarTipo($id){
      $tipo = new stdClass();
      $tipo->id = 0;
      $tipo->nombre = "";

      $query = $this->db->where('id=',$id);
      $query = $this->db->get('tipo');


      $rs = $query->result();
      if(count($rs) > 0){
        $tipo = $rs[0];
      }

      return $tipo;

  }
  function listarAcciones(){

    $query = $this->db->get('accion');
    return $query->result();

  }

  function cargarAccion($id){
      $accion = new stdClass();
      $accion->id = 0;
      $accion->nombre = "";

      $query = $this->db->where('id=',$id);
      $query = $this->db->get('accion');


      $rs = $query->result();
      if(count($rs) > 0){
        $accion = $rs[0];
      }

      return $accion;

  }

  function guardarAccion($accion){
    $id = $accion['id'];
    if($id+0 > 0){

        $this->db->where('id=',$id);
        unset($accion['id']);
        $this->db->update('accion', $accion);


    }else{
        $this->db->insert('accion',$accion);
    }

  }
  function guardarTipo($tipo){
    $id = $tipo['id'];
    if($id+0 > 0){

        $this->db->where('id=',$id);
        unset($tipo['id']);
        $this->db->update('tipo', $tipo);


    }else{
        $this->db->insert('tipo',$tipo);
    }

  }

  function deleteTipo($id){
    $this->db->where('id=', $id);
    $this->db->delete('tipo');
  }
  function deleteAccion($id){
    $this->db->where('id=', $id);
    $this->db->delete('accion'); 

  }

}
