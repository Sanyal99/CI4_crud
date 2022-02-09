<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{

    protected $table = 'user';
    protected $allowedFields = ['name','email','contact_no'];

    public function getRecords() {
        return $this->orderBy('id','DESC')->findAll();
    }

    public function getRow($id) {
        // SELECT * FROM users where id = $id
        return $this->where('id',$id)->first();
    }


}
?>