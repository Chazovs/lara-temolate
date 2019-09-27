<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use GuzzleHttp;
use phpDocumentor\Reflection\Types\Integer;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
     {
         //
     }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reqArray = $request->all();
       $userInfo= $this->getUserById($reqArray['responsible_id']);
        return $userInfo;
        $taskId=$this->callToBitrix24($reqArray);
        return serialize($taskId);
        $ticket = Ticket::create($reqArray);
        return $ticket;
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(/*Ticket $ticket*/ Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    /*public function edit(Ticket $ticket)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    /**
     * Принимает в себя айдишник пользователя в Б24
     * @param array $reqArray
     * @return array
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function callToBitrix24(array $reqArray)
    {
        $queryData = ['fields' => [
            "TITLE" => 'Заявка от жильца',
            "RESPONSIBLE_ID" => $reqArray['responsible_id'],
            "DESCRIPTION" => $reqArray['description'],
        ],
        ];

        $reqB24 = new GuzzleHttp\Client();
       return $reqB24->request('POST', 'https://b24-d8brqi.bitrix24.ru/rest/1/rqr2dk7onooo6qg8/tasks.task.add.json', ['json' => $queryData]);
    }

    public function getUserById($userID)
    {
        $queryData = [/*'FILTER' => [*/
            "ID" => $userID,
       /* ],*/
        ];
        $reqB24 = new GuzzleHttp\Client();
        return $reqB24->request('POST', 'https://b24-d8brqi.bitrix24.ru/rest/1/rqr2dk7onooo6qg8/user.get.json', ['json' => $queryData]);
    }

}
