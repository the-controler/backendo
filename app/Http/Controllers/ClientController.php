<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClient() {
        return response()->json(Client::all(), 200);
    }
    public function getClientById($id) {
        $client = Client::find($id);
        if(is_null($client)) {
            return response()->json(['message' => 'Client Not Found'], 404);
        }
        return response()->json($client::find($id), 200);
    }

    public function addClient(Request $request) {
        $client = Client::create($request->all());
        $id=$client->id;
        return response($client, 201);
    }

    public function updateClient(Request $request, $id) {
        $client = Client::find($id);
        if(is_null($client)) {
            return response()->json(['message' => 'Client Not Found'], 404);
        }
        $client->update($request->all());
        return response($client, 200);
    }

    public function deleteClient(Request $request, $id) {
        $client = Client::find($id);
        if(is_null($client)) {
            return response()->json(['message' => 'Client Not Found'], 404);
        }
        $client->delete();
        return response()->json(null, 204);
    }

    public function getClientId() {

        $maxValue = Client::orderBy('id', 'desc')->value('id');

      // $clientf= Client::find($maxValue, ['id']);;
        return $maxValue;
    }
    public function lastcli() {

        $clientf= Client::find($this->getClientId());
        return response()->json($clientf, 200);
    }
}
