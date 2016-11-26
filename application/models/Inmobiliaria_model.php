<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inmobiliaria_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->database();
  }


  function listarAnuncios($id_tipo){
    if($id_tipo == 0){
    $query = $this->db->query('select titulo, id_anuncio, foto, ubicacion, precio from anuncio inner join
    (select min(foto.id) as idfoto, foto.id_anuncio, foto.foto from foto group by foto.id desc) foto on
    (anuncio.id = foto.id_anuncio) where activo = 1 group by id_anuncio ORDER BY anuncio.id desc');
  }else{ //Filtro
    $query = $this->db->query("select titulo, id_anuncio, foto, ubicacion, precio from anuncio inner join
    (select min(foto.id) as idfoto, foto.id_anuncio, foto.foto from foto group by foto.id desc) foto on
    (anuncio.id = foto.id_anuncio) inner join tipo on (anuncio.id_tipo = tipo.id) where activo = 1 and
    tipo.id = {$id_tipo} group by id_anuncio ORDER BY anuncio.id desc");
  }
    return $query->result();

  }
  function listarTipos(){

    $query = $this->db->get('tipo');
    return $query->result();

  }
  function cargarAnuncio($id){
//    $mascota = new stdClass();
//    $mascota->id = 0;

    $query = $this->db->query("select tipo.nombre as tipo_nombre, accion.nombre as accion_nombre, anuncio.*,
     usuario.correo, usuario.nombre, usuario.apellido, usuario.telefono, usuario.celular, usuario.fax, usuario.informacion from anuncio
    inner join tipo on(anuncio.id_tipo = tipo.id)
    inner join accion on(anuncio.id_accion = accion.id)
    inner join usuario on (anuncio.id_usuario = usuario.id) where anuncio.id = $id");

    $rs = $query->result();
    if(count($rs) > 0){
      return $rs[0];
    }


  }
  function cargarFotos($id){

    $query = $this->db->query("select foto.* from foto
    inner join anuncio on(foto.id_anuncio = anuncio.id)
    where anuncio.id = $id order by foto.id");

    $rs = $query->result();
    if(count($rs) > 0){
      return $rs;
    }


  }

}
