<?php 

namespace App\Controllers;

use App\Models\Usuario;

class UsuariosController extends BaseController 
{	

    public function login(){

        helper('form');

        $data = $this->request->getPost(['usuario', 'pass']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'usuario' => 'required|max_length[30]|min_length[3]',
            'pass'  => 'required|max_length[59]|min_length[3]',
        ])) {
            return redirect()->to('/login')->with('error', 'Por favor, proporciona un usuario y una contraseña válidos.');
        }

        $model = model(Usuario::class);
        $user = $model->where('usuario', $data['usuario'])->first();
        if ($user && password_verify($data['pass'], $user['pass'])) {
            $session = session();
            $session->set('user', $user['usuario']);
            $session->set('rol', $user['perfil_id'] == 1 ? 'admin' : 'cliente'); 
            return redirect()->to('/');
        }else{
            return redirect()->back()->with('error', 'Por favor, proporciona un usuario y una contraseña válidos.');
        }
    }

    public function registrar(){

        helper('form');

        $data = $this->request->getPost(['nombre','apellido','email','usuario', 'pass', 'repass']);

 $rules = [
    'nombre' => [
        'rules' => 'required|max_length[30]|min_length[3]',
        'errors' => [
            'required' => 'El nombre es obligatorio.',
            'max_length' => 'El nombre no debe exceder los 30 caracteres.',
            'min_length' => 'El nombre debe tener al menos 3 caracteres.',
        ],
    ],
    'apellido' => [
        'rules' => 'required|max_length[30]|min_length[3]',
        'errors' => [
            'required' => 'El apellido es obligatorio.',
            'max_length' => 'El apellido no debe exceder los 30 caracteres.',
            'min_length' => 'El apellido debe tener al menos 3 caracteres.',
        ],
    ],
    'email' => [
        'rules' => 'required|valid_email|max_length[30]|min_length[3]',
        'errors' => [
            'required' => 'El correo electrónico es obligatorio.',
            'valid_email' => 'Debe proporcionar un correo electrónico válido.',
            'max_length' => 'El correo electrónico no debe exceder los 30 caracteres.',
            'min_length' => 'El correo electrónico debe tener al menos 3 caracteres.',
        ],
    ],
    'repass' => [
        'rules' => 'matches[pass]',
        'errors' => [
            'matches' => 'La confirmación de contraseña no coincide con la contraseña.',
        ],
    ],
    'usuario' => [
        'rules' => 'required|max_length[30]|min_length[3]',
        'errors' => [
            'required' => 'El nombre de usuario es obligatorio.',
            'max_length' => 'El nombre de usuario no debe exceder los 30 caracteres.',
            'min_length' => 'El nombre de usuario debe tener al menos 3 caracteres.',
        ],
    ],
    'pass' => [
        'rules' => 'required|max_length[59]|min_length[3]',
        'errors' => [
            'required' => 'La contraseña es obligatoria.',
            'max_length' => 'La contraseña no debe exceder los 59 caracteres.',
            'min_length' => 'La contraseña debe tener al menos 3 caracteres.',
        ],
    ],
];
        if (! $this->validateData($data, $rules)) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->with('errors', $errors);
        }
 
        $model = model(Usuario::class);
        $exist = $model->where('usuario', $data['usuario'])->orWhere('email', $data['email'])->first();
        if ($exist) {
            return redirect()->to('/registrarme')->with('error', 'Este usuario ya existe.');
        }

        $user = $model->save([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'usuario' => $data['usuario'],
            'pass' => password_hash($data['pass'], PASSWORD_BCRYPT),
        ]);

        if ($user) {
            return redirect()->to('/login')->with('success', 'Usuario registrado correctamente. Por favor inicia sesión.');
        }else{
            return redirect()->to('/registrarme')->with('error', 'Por favor, proporcionar datos válidos.');
        }
    }

    public function logout(){
        $session = session();
        $session->remove('user');
        $session->remove('rol');
        return redirect()->to('/');
    }


    public function delete($id){
        $user = model(Usuario::class)->find($id);
        if ($user['baja'] == 'SI') {
            model(Usuario::class)->update($id, ['baja' => 'NO']);
            return redirect()->to('/admin')->with('success', 'Usuario dado de alta.');
        }else{
        model(Usuario::class)->update($id, ['baja' => 'SI']);
        return redirect()->to('/admin')->with('success', 'Usuario dado de baja.');
        }
    }


}