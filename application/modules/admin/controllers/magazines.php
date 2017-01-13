<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazines extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('magazines_model');
	}
    public function index(){
        $config['base_url'] = site_url('admin/magazines/index/');
        $config['total_rows'] = count($this->magazines_model->find());
        $config['per_page'] = 10;
        $config["uri_segment"] = 4;
        echo $config['total_rows'];
        $user_id = null;

        if(!in_array('admin', $this->current_groups)){
            $user_id = $this->session->userdata('user_id');
        }


        if ($this->input->get('q')):
            $q = $this->input->get('q');
            $this->data['magazines'] = $this->magazines_model->find($config['per_page'], $this->uri->segment(4),$user_id, $q);
            if (empty($this->data['magazines'])) {
                $this->session->set_flashdata('message', message_box('Data tidak ditemukan','danger'));
                redirect('admin/magazines/index');
            }
            $config['total_rows'] = count($this->data['magazines']);
        else:
            $this->data['magazines'] = $this->magazines_model->find($config['per_page'], $this->uri->segment(4),$user_id);
        endif;
        $this->data['pagination'] = $this->bootstrap_pagination($config);

        $this->load_admin('magazines/index');
    }
    public function add(){
        $this->form_validation->set_rules('title', 'title', 'required|is_unique[posts.title]');
//        $this->form_validation->set_rules('body', 'body', 'required');
        if($this->ion_auth->is_admin()){
            $this->form_validation->set_rules('status', 'status', 'required');
        }
        $this->form_validation->set_rules('published_at', 'date', '');
        $this->form_validation->set_error_delimiters('', '<br/>');
        if ($this->form_validation->run() == TRUE) {

            $data = $_POST;
            // print_data($data);exit;
            $data['type'] = 'magazine';
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $data['user_id'] = $this->session->userdata('user_id');

            if(!$this->ion_auth->is_admin()){
                $data['status'] = 0;
            }
            $this->upload('pdf','body');
            $this->upload('gif|jpg|png','featured_image');
            $data['body'] = 'assets/uploads/'.$_FILES['body']['name'];
            $data['featured_image'] = 'assets/uploads/'.$_FILES['featured_image']['name'];

            $this->magazines_model->create($data);
            $this->session->set_flashdata('message', message_box('New magazine has been saved','success'));
            redirect('admin/magazines');
        }
        $this->load_admin('magazines/add');
    }

    public function upload($allowed_types,$name)
    {
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = $allowed_types;
        $config['max_size']             = 1000000000000000000000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name))
        {

            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            die();
        }
    }

    public function delete($id = null){
        if(!empty($id)){
            $this->magazines_model->delete($id);
            $this->session->set_flashdata('message',message_box('Magazine has been deleted','success'));
            redirect('admin/magazines/index');
        }else{
            $this->session->set_flashdata('message',message_box('Invalid id','danger'));
            redirect('admin/magazines/index');
        }
    }



}
