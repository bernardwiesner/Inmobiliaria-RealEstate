<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inmobiliaria extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Inmobiliaria_model');
    $this->load->library('pagination');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = array();
    $id_tipo = (isset($_GET['id_tipo']))?$_GET['id_tipo']+0:0;
    $data['tipo_seleccionado'] = $id_tipo;
//    var_dump($data); exit;
    $data['tipos'] = $this->Inmobiliaria_model->listarTipos();

//  pagination
    $config = array();
    $config["base_url"] = base_url("inmobiliaria/index/");
    $total_row = $this->Inmobiliaria_model->record_count($id_tipo);
    $config["total_rows"] = $total_row;
    $config["per_page"] = 8;
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = round($total_row/$config["per_page"]);

    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
    $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

    $this->pagination->initialize($config);
    if($this->uri->segment(3)){
    $page = ($this->uri->segment(3)) ;
    }
    else{
    $page = 1;
    }
    $data["anuncios"] = $this->Inmobiliaria_model->listarAnuncios($config["per_page"], $page, $id_tipo);
    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links );


    $this->load->template('inmobiliaria/inicio', $data);
  }
  public function pagination(){
  }

  function mapa(){

    $this->load->library('googlemaps');
    $config['center'] = '18.49367523972544, -69.89712523296475';
    $config['zoom'] = 'auto';
    $this->googlemaps->initialize($config);

    $marcadores = $this->Inmobiliaria_model->listarAnuncios(100,1,0);

    foreach($marcadores as $marcador){
      $marker = array();
      $marker['position'] = $marcador->ubicacion;
      $content = "<div>$marcador->titulo</div><div>Precio: RD$" . number_format($marcador->precio). "</div> <div><a href=" . base_url("detalle_articulo/?articulo={$marcador->id_anuncio}") . ">Ir a anuncio</a> </div> ";
      $marker['infowindow_content'] = $content ;
      $this->googlemaps->add_marker($marker);
    }

    $data['map'] = $this->googlemaps->create_map();
    $this->load->template('inmobiliaria/mapa', $data);
  }




}
