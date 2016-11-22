<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inmobiliaria extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Inmobiliaria_model');

    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = array();
    $id_tipo = (isset($_GET['id_tipo']))?$_GET['id_tipo']+0:0;
    $data['tipo_seleccionado'] = $id_tipo;
    $data['anuncios'] = $this->Inmobiliaria_model->listarAnuncios($id_tipo);
//    var_dump($data); exit;
    $data['tipos'] = $this->Inmobiliaria_model->listarTipos();
    $this->load->template('inmobiliaria/inicio', $data);
  }
  function mapa(){

    $this->load->library('googlemaps');
    $config['center'] = '18.49367523972544, -69.89712523296475';
    $config['zoom'] = 'auto';
    $this->googlemaps->initialize($config);

    $marcadores = $this->Inmobiliaria_model->listarAnuncios(0);

    foreach($marcadores as $marcador){
      $marker = array();
      $marker['position'] = $marcador->ubicacion;
      $content = "<div>$marcador->titulo</div><div>Precio: \$$marcador->precio</div> <div><a href=" . base_url("detalle_articulo/?articulo={$marcador->id_anuncio}") . ">Ir a anuncio</a> </div> ";
      $marker['infowindow_content'] = $content ;
      $this->googlemaps->add_marker($marker);
    }

    $data['map'] = $this->googlemaps->create_map();
    $this->load->template('inmobiliaria/mapa', $data);
  }




}
