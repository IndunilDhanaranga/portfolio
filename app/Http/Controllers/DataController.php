<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\PortfolioUser;
use App\Models\PortfolioUserConnection;

class DataController extends Controller
{
    public function getBasicDetails(){
        $basic_details = PortfolioUser::with('connections','userImage','coverImage')->first();
        return $basic_details;
    }

    public function getPortfolioConnections(){
        $portfolio_connections = PortfolioUserConnection::all();
        return $portfolio_connections;
    }
}
