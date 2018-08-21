<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metadata;

class MetadataController extends Controller
{
    /**
     * get all or specific key metadata entry
     * 
     * @param string|false $key metadata key
     */
    public function index($key = false) 
    {
        return $key === false ? Metadata::all() : Metadata::where('key', $key)->get();
    }

    /**
     * add new metadata entry
     */
    public function add()
    {
        // add metadata
    }

    /**
     * update metadata entry
     */
    public function update($key)
    {
        // update metadata
    }

    /**
     * delete metadata entry
     */
    public function delete($key)
    {
        // delete metadata
    }
}
