<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->database();
  }

  function modificarAnuncio($id, $activo){
    if($activo == 1){
      $this->db->query("UPDATE anuncio set activo = 0 where id = $id");
    }else{
      $this->db->query("UPDATE anuncio set activo = 1 where id = $id");
    }


  }

  function guardarAnuncio($anuncio){
    $id = $anuncio['id'];
    if($id+0 > 0){
        $this->db->where('id=',$id);
        unset($anuncio['id']);

        $this->db->update('anuncio', $anuncio);
    }else{
        if(!$this->db->insert('anuncio',$anuncio)){
          echo $this->db->_error_message();
          exit;
        }else{
          $insert_id =  $this->db->insert_id();
          return $insert_id;
        }
    }

  }
  function guardarFoto($id_anuncio, $path, $id_anuncio_form, $num){
    $id = $id_anuncio_form;
    $data = array(
      'id_anuncio' => $id_anuncio ,
      'foto' => $path,
      'num' => $num
    );

    if($id+0 > 0){
      $this->db->query("INSERT INTO foto (id_anuncio, foto, num) values ('{$id_anuncio_form}', '$path', '$num') ");

    }else{
      if(!$this->db->insert('foto',$data)){
        echo $this->db->_error_message();
        exit;
      }
    }
  }
  function eliminarFoto($id_foto, $path){


    if (!unlink($path)){

    }else{

      $this->db->query("DELETE from foto where id = {$id_foto}");
    }

  }

  function listarAnuncios($usuario_id){
    $query = $this->db->query("SELECT * from anuncio where id_usuario = $usuario_id ORDER BY id desc");
    return $query->result();

  }
  function cargarAnuncio($id){
//    $mascota = new stdClass();
//    $mascota->id = 0;

    $query = $this->db->query("select * from anuncio where anuncio.id = $id");

    $rs = $query->result();
    if(count($rs) > 0){
      return $rs[0];
    }
  }
  function cargarFotos($id){
//    $mascota = new stdClass();
//    $mascota->id = 0;

    $query = $this->db->query("select foto.id, foto, num from anuncio inner join foto on (anuncio.id = foto.id_anuncio) where anuncio.id = $id");

    $rs = $query->result();
    if(count($rs) > 0){
      return $rs;
    }
  }

  function listarTipos(){

    $query = $this->db->get('tipo');
    return $query->result();

  }
  function listarAcciones(){

    $query = $this->db->get('accion');
    return $query->result();

  }
}
