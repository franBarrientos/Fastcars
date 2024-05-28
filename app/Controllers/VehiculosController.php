<?php 

namespace App\Controllers;

use App\Models\Vehiculo;

class VehiculosController extends BaseController 
{	



    public function delete($id){
        $vehiculo = model(Vehiculo::class)->find($id);
        if ($vehiculo['baja'] == 'SI') {
            model(Vehiculo::class)->update($id, ['baja' => 'NO']);
            return redirect()->to('/admin/vehiculos')->with('success', 'Vehiculo dado de alta.');
        }else{
        model(Vehiculo::class)->update($id, ['baja' => 'SI']);
        return redirect()->to('/admin/vehiculos')->with('success', 'Vehiculo dado de baja.');
        }
    }

    public function newVehiculo(){

        $rules = [
            'marca' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La marca es obligatoria.',
                ],
            ],
            'modelo' => [
                'rules' => 'required|max_length[60]|min_length[1]',
                'errors' => [
                    'required' => 'El modelo es obligatorio.',
                    'max_length' => 'El modelo no debe exceder los 60 caracteres.',
                    'min_length' => 'El modelo debe tener al menos 1 caracter.',
                ],
            ],
            'año' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'El año es obligatorio.',
                    'integer' => 'El año debe ser un número entero.',
                ],
            ],
            'color' => [
                'rules' => 'required|max_length[60]',
                'errors' => [
                    'required' => 'El color es obligatorio.',
                    'max_length' => 'El color no debe exceder los 60 caracteres.',
                ],
            ],
            'precio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El precio es obligatorio.',
                ],
            ],
            'motor' => [
                'rules' => 'required|max_length[60]',
                'errors' => [
                    'required' => 'El motor es obligatorio.',
                    'max_length' => 'El motor no debe exceder los 60 caracteres.',
                ],
            ],
            'img' => [
                'rules' => 'uploaded[img]|is_image[img]',
                'errors' => [
                    'uploaded' => 'La imagen es obligatoria.',
                    'is_image' => 'El archivo debe ser una imagen.',
                ],
            ],
            'descripcion' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'La descripción es obligatoria.',
                    'max_length' => 'La descripción no debe exceder los 255 caracteres.',
                ],
            ],
        ];
    
        if (! $this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        // Get the form data
    $marca = $this->request->getPost('marca');
    $modelo = $this->request->getPost('modelo');
    $año = $this->request->getPost('año');
    $color = $this->request->getPost('color');
    $precio = $this->request->getPost('precio');
    $motor = $this->request->getPost('motor');
    $descripcion = $this->request->getPost('descripcion');


    // Validate the form data
      
      // Upload the image file
      $img = $this->request->getFile('img');
      $newName = $img->getRandomName();
      $img->move(ROOTPATH . 'assets/img/uploads', $newName);
      
      $vehicleModel = new \App\Models\Vehiculo();
      $data = [
          'marca' => $marca,
          'modelo' => $modelo,
          'año' => $año,
          'color' => $color,
          'precio' => $precio,
          'motor' => $motor,
          'descripcion' => $descripcion,
          'img' => $newName,
      ];
      $vehicleModel->insert($data);

      return redirect()->back()->with('success', 'Vehiculo creado.');
    }

    public function buscarVehiculo(){
        $query = $this->request->getGet('query');
        $vehicleModel = new \App\Models\Vehiculo();
        $data['vehiculos'] =  $vehicleModel->like('marca', $query)
        ->orLike('modelo', $query)
        ->findAll();
        $data['page'] = "vehiculos";
        $data['query'] = $query;
        return view('layouts/header', $data)
        .view('admin/vehiculos')
        .view('layouts/footer');
    }



}