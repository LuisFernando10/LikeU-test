<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::all());
    }

    public function create(Request $request) {

        $name = $request->input('nombre');
        $document = $request->input('cedula');
        $birth_date = $request->input('fecha_nacimiento');

        if(!empty($name) && !empty($document) && !empty($birth_date)) {
            $client = new Client();
            $client->nombre = $name;
            $client->cedula = $document;
            $client->fecha_nacimiento = $birth_date;
            $valid_document = Client::where('cedula', $document)->first();
            if(!empty($valid_document['cedula'])) {
                return response()->json(['message' => '¡El Documento no está permitido!']);
            }
            $client->save();
            return response()->json(['message' => '¡El Cliente ha sido creado!']);
        }
        return response()->json(['message' => '¡El campo Nombre, Cédula y Fecha son obligatorios!']);
    }

    public function update(Request $request, $id) {

        $name = $request->input('nombre');
        $document = $request->input('cedula');
        $birth_date = $request->input('fecha_nacimiento');

        $client = Client::findOrFail($id);
        $client->where('cedula', '1019221');
        $client->update($request->all());
        return response()->json(['message' => '¡El Cliente ha sido actualizado!']);


        /*return redirect('usuarios');

        if(!empty($name) && !empty($document) && !empty($birth_date)) {
            $client = new Client();
            $client->nombre = $name;
            $client->cedula = $document;
            $client->fecha_nacimiento = $birth_date;
            $valid_document = Client::where('cedula', $document)->first();
            if(!empty($valid_document['cedula'])) {
                return response()->json(['message' => '¡El Documento no está permitido!']);
            }
            $client->save();
            return response()->json(['message' => '¡El Cliente ha sido creado!']);
        }
        return response()->json(['message' => '¡El campo Nombre, Cédula y Fecha son obligatorios!']);*/
    }
}
