<?php
/**
 * @name SampleModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author bird_shark\bird
 */
class UserModel extends Core_ModelMain{
    public function __construct() {
        parent::__construct();
    }


    /**
     * @param $name
     * @return mixed
     */
    public function selectUser($name) {
        $result = $this->where(array("login"=>$name))->find();
        return $result;
    }

    public function insertUser($data){
        $formate = $this->data_formate($data);
        $result = $this->add($formate);
        return $result;
    }

    private function data_formate($data){
        $formate = array();
        $formate['login'] = $data['login'];
        $formate['pwd'] = $data['pwd'];
        $formate['email'] = $data['email'];
        return $formate;
    }
}
