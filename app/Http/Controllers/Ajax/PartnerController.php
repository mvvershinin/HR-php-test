<?php

namespace App\Http\Controllers\Ajax;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    /**
     * Display a listing of all partners.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {

        dd($data);

        return response()->json([ 'html' => $html, 'paginate' => (string)$paginate ], 200);
    }
}
