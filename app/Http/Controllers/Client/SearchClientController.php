<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Value\SearchClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class SearchClientController extends Controller
{
    public function __invoke(SearchClientRequest $request)
    {
        $data = $request->validated();

        if ($data['date'] == null && $data['name'] == null){
            return [];
        }

        $clients = Client::where('name', 'like', "%{$data['name']}%");

        if ($data['date'] != null)
            $clients = $clients->where('birthday', '=', $data['date']);

        $clients = $clients->get();

        $arr = [];
        foreach($clients as $client){
            $item['id'] = $client->id;
            $item['name'] = $client->name;
            $item['email'] = $client->user->email;
            $item['birthday'] = $client->birthday;
            $arr[] = $item;
        }

        return $arr;
    }
}
