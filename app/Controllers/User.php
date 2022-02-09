<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController{

    public function index(){
        $session = \Config\Services::session();
        $data['session'] = $session;

        $model = new UserModel();
        $userArray = $model->getRecords();

        $data['user'] = $userArray;

        return view('users/list', $data);
    }

    //Create section

    public function create(){
        $session = \Config\Services::session();
        helper('form');

        $data = [];

        if($this->request->getMethod()=='post'){
                $input = $this->validate([
                    'name'=>'required|min_length[6]',
                    'email'=>'required|valid_email',
                    'contact_no'=>'required|min_length[10]'
                ]);

                if($input==true){
                    //form validated successfully
                    $model = new UserModel();

                    $model->save([
                        'name' => $this->request->getPost('name'),
                        'email' => $this->request->getPost('email'),
                        'contact_no' => $this->request->getPost('contact_no')
                    ]);

                    $session->setFlashdata('success', 'Record added Successfully.');
                    return redirect()->to('user');
                }else{
                    //form not validated
                    $data['validation']=$this->validator;
                }
            }
        return view('users/create', $data);
        }

        //Edit section

        public function edit($id){
            $session = \Config\Services::session();
            helper('form');

            $model = new UserModel();
            $user = $model->getRow($id);

            if(empty($user)){
                $session->setFlashdata('error', 'Record not found');
                return redirect()->to('/users');
            }
    
            $data = [];
            $data['user'] = $user;
    
            if($this->request->getMethod()=='post'){
                    $input = $this->validate([
                        'name'=>'required|min_length[6]',
                        'email'=>'required|valid_email',
                        'contact_no'=>'required|min_length[10]'
                    ]);
    
                    if($input==true){
                        //form validated successfully
                        $model = new UserModel();
    
                        $model->update($id, [
                            'name' => $this->request->getPost('name'),
                            'email' => $this->request->getPost('email'),
                            'contact_no' => $this->request->getPost('contact_no')
                        ]);
    
                        $session->setFlashdata('success', 'Record updated Successfully.');
                        return redirect()->to('user');
                    }else{
                        //form not validated
                        $data['validation']=$this->validator;
                    }
                }
            return view('users/edit', $data);
        }

        public function delete($id){
            $session = \Config\Services::session();

            $model = new UserModel();
            $user = $model->getRow($id);

            if(empty($user)){
                $session->setFlashdata('error', 'Record not found');
                return redirect()->to('/users');
            }

            $model = new UserModel();
            $model->delete($id);

            $session->setFlashdata('success', 'Record deleted successfully');
            return redirect()->to('/users');
        }

}

?>