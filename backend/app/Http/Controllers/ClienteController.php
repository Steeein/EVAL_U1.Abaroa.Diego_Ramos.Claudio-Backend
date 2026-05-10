<?php
namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ClienteController extends Controller
{
    // //GET Listar todos los clientes
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients,200); // codigo 200 estado ok array clientes
    }

    // POST Crear un nuevo cliente
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rut' => 'required|unique:clientes,rut',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); //alguna validacion fallo codigo 422 error de validacion
        }

        $client = Client::create($request->all());
        return response()->json($client, 201);  //codigo 201 cliente creado exitosamente
    }
    // //GET consultar cliente especifico por id
    public function show($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json(['message' => 'Cliente no encontrado'], 404); // cliente no encontrado codigo 404
        }
        return response()->json($client, 200); // cliente encontrado codigo 200
    }
}
