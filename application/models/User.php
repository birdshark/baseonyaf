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
}
