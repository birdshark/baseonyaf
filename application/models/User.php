<?php
/**
 * @name SampleModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author bird_shark\bird
 */
class UserModel extends Core_Model_Mongodb{

    /**
     * @param $name
     * @return mixed
     */
    public function selectUser($name) {
        $result = $this->where(array("login"=>$name))->find();
        if(is_object($result)){
            $result = json_decode(json_encode($result),true);
        }
        return $result;
    }

    public function insertUser($data){
        $format = $this->data_format($data);
        $result = $this->add($format);
        return $result;
    }
    

    private function data_format($data){
        $format = array();
        $format['login'] = $data['login'];
        $format['pwd'] = $data['pwd'];
        $format['email'] = $data['email'];
        return $format;
    }
}
