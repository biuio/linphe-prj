<?php

namespace lib;

use Yjtec\Linmodel\Model;
use function env;

/**
 * Description of BaseMD
 *
 * @author Administrator
 */
class BaseMD extends Model {

    public $dbConf;

    public function __construct() {
        $this->dbConf = [
            'db_type' => env('db_type'),
            'db_user' => env('db_user'),
            'db_pwd' => env('db_pwd'),
            'db_host' => env('db_host'),
            'db_port' => env('db_port'),
            'db_name' => env('db_name'),
            'db_prefix' => env('db_prefix'),
        ];
        parent::__construct($this->dbConf);
    }

    public function getById($id) {
        if (!$id) {
            return [];
        }
        return $this->where(['id' => $id])->select(TRUE);
    }

    public function updataFieldVal($id, $data) {
        return $this->where(['id' => $id])->update($data);
    }

}
