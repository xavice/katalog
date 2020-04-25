<?php

namespace App\Http\Controllers;

use App\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = new Catalog();
        $catalog->getBooksResults(20);
        $pagination = $catalog->results;

        if (request()->ajax()) {
            $ajax_response = [
                'html' => view('components.xhrItemList', compact('catalog'))->render(),
                'nextUrl' => $pagination->appends(Input::except('page'))->nextPageUrl(),
                'pagination' => (string) $pagination->appends(Input::except('page'))->links(),
                'last' => $pagination->currentPage() === $pagination->lastPage()
            ];
            return response()->json($ajax_response, 200);
        }

        return view('welcome', compact('catalog'));
    }
}

