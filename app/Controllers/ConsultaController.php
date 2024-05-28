<?php
namespace App\Controllers;

use App\Models\Consulta;

class ConsultaController extends BaseController{


    public function newConsulta(){


        helper('form');

        $data = $this->request->getPost(['nombre','email', 'consulta', 'mensaje']);

            $rules = [
                'nombre' => [
                    'rules' => 'required|max_length[230]|min_length[3]',
                    'errors' => [
                        'required' => 'El nombre es obligatorio.',
                        'max_length' => 'El nombre no debe exceder los 30 caracteres.',
                        'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                    ],
                ],
                'email' => [
                    'rules' => 'required|valid_email|max_length[250]|min_length[3]',
                    'errors' => [
                        'required' => 'El email es obligatorio.',
                        'valid_email' => 'Por favor, introduce un email valido.',
                        'max_length' => 'El email no debe exceder los 30 caracteres.',
                        'min_length' => 'El email debe tener al menos 3 caracteres.',
                    ],
                ],
                'mensaje' => [
                    'rules' => 'required|max_length[1000]|min_length[3]',
                    'errors' => [
                        'required' => 'El mensaje es obligatorio.',
                        'max_length' => 'El mensaje no debe exceder los 30 caracteres.',
                        'min_length' => 'El mensaje debe tener al menos 3 caracteres.',
                    ],
                ],
            ];

        if (! $this->validateData($data, $rules)) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->with('errors', $errors);
        }
 
        $model = model(Consulta::class);
      
        $consulta = $model->save([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'tipo' => $data['consulta'] == 'true' ? 0 : 1,
            'mensaje' => $data['mensaje'],
        ]);

        if ($consulta) {
            $mensaje = $data['consulta'] == 'true' ? 'Su consulta ha sido registrada con exito. Gracias por preferirnos.' : 'Su mensaje ha sido registrada con exito. Gracias por preferirnos.';
            return redirect()->back()->with('success', $mensaje);
        }else{
            return redirect()->back()->with('error', 'Algo fallo...');
        }


    }


    



}