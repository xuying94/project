<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this ->load ->model('user_model');
        $this->load->library('pagination');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    //蛋糕师注册 开始
    public function login()
    {
        $this->load->view('login');
    }
    public function do_login()
    {
        $firstname=$this->input->post('firstname');
        $lastname=$this->input->post('lastname');

        $this->load->model('user_model');
        //echo"haha";
        $row=$this->user_model->get_by_firstname_lastname($firstname,$lastname);
        if($row){
            $this->load->view('index');
        }
        else{
            $this->load->view('login');
        }
    }
    public function zhuce_uname()
    {

        $this->load->view('zhuce_uname');
    }

    public function zhuce_message()
    {
        $this->load->view('zhuce_message');
    }
    public function do_zhuce_message()
    {
        $firstname=$this->input->post('firstname');
        //tcookie('name','$firstname');
        //$this->input->set_cookie($name,$firstname);
        $psd1=$this->input->post('psd1');
        $psd2=$this->input->post('psd2');
        //ar_dump($firstname);
        //die();
        if($psd1!=$psd2){
            $this->load->view("zhuce_message");
        }
        else{

            $this->load->model('user_model');
            $result=$this->user_model->save($firstname,$psd1);

            //ar_dump($result);
            //die();
            if($result){
                $this->load->view('zhuce_success');
            }
            else{
                $this->load->view('zhuce_message');
            }
        }
    }

    public function zhuce_success()
    {
        $this->load->view('zhuce_success');
    }
    public function do_bakercheck (){
        $name=$this->input->post('realname');
        $num=$this->input->post('num');
        //$name=$this->input->cookie($name);
        $this->load->model('user_model');
        $result=$this->user_model->bakercheck($name,$num);
        if($result){
            $this->load->view('login');
        }else{
            $this->load->view('zhuce_success');
        }
    }

    //蛋糕师注册 结束






    //蛋糕师修改资料 开始
    public function index(){
        $query = $this -> user_model -> get_user();
        //var_dump($query);die;
        $data = array(
            "query" => $query
        );

        $this->load->view('edit_user',$data);

    }

    public function edit(){
        $user = $this -> user_model -> get_by_userid(1);
        $this -> session -> set_userdata('user', $user);
        $this->load->view('edit_user');
    }



    // public function baker(){
    // $user = $this -> user_model -> get_by_userid(1);
    // $this -> session -> set_userdata('user', $user);
    // $this->load->view('baker');
    // }

    public function do_hongbei(){
        $name=$this->input->post('name');
        $youxiang=$this->input->post('youxiang');
        $tel=$this->input->post('tel');
        $person=$this->input->post('person');
        $x=$this->input->post('x');
        $birthday=$this->input->post('birthday');
        $per_sign=$this->input->post('per_sign');
        $rec_addr=$this->input->post('rec_addr');
        $is_city=$this->input->post('is_city');
        $city=$this->input->post('city');
        $this->user_model->update_user($name,$youxiang,$tel,$person,$x,$birthday,$per_sign,$rec_addr,$is_city,$city);
        // if($user){
        // $this->session->set_userdata("hongpei_user",$row);
        // $this->load->view('index');
        // }
        // else{
        // $this->load->view('hongpei');
        $query = $this -> user_model -> get_user();
        $data = array(
            "query" => $query
        );
        $this->load->view('edit_user',$data);

    }

    public function upload_product(){

        $name=$this->input->post('name');
        $youxiang=$this->input->post('youxiang');
        $tel=$this->input->post('tel');
        $person=$this->input->post('person');
        $x=$this->input->post('x');
        $birthday=$this->input->post('birthday');
        $per_sign=$this->input->post('per_sign');
        $rec_addr=$this->input->post('rec_addr');
        $is_city=$this->input->post('is_city');
        $city=$this->input->post('city');
        $this->user_model->update_user($name,$youxiang,$tel,$person,$x,$birthday,$per_sign,$rec_addr,$is_city,$city);

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload("product_picture")) {
            echo '上传图片失败，可能是图片过大，不要上传超过10M的图片！';
        } else {
            $upload_data = $this->upload->data();

            if ($upload_data['file_size']) {

                $this->load->library("image_lib");

                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_data['full_path'];
                $config['thumb_marker'] = '';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['master_dim'] = 'width';
                $config['width'] = 500;
                $config['height'] = 300;

                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();
                $data['user_pic'] = $upload_data['file_name'];

                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $upload_data['full_path'];
                $config2['thumb_marker'] = '_thumb';
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config['master_dim'] = 'width';
                $config2['width'] = 140;
                $config2['height'] = 140;

                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                $thumb_image_name = $upload_data["raw_name"] . "_thumb" . $upload_data["file_ext"];
                $data['product_picture'] = $thumb_image_name;
            }
            $data = array(
                'user_pic_thumb' =>$thumb_image_name
            );
            $result = $this ->user_model -> upload_product($data);

            $query = $this -> user_model -> get_user();
            $data = array(
                "query" => $query
            );
            $this->load->view('index',$data);

            // if($result){
            // redirect('welcome/index');
            // }

        }}

        //蛋糕师修改资料 开始


}