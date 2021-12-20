<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
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
                return response()->json(['msg' => '¡El Documento no está disponible!']);
            }
            $client->save();
            return response()->json(['msg' => '¡El Cliente ha sido creado!']);
        }
        return response()->json(['msg' => '¡El campo Nombre, Cédula y Fecha son obligatorios!']);
    }
}
