<?php

namespace Bantenprov\IKKabupatenKota\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\IKKabupatenKota\Facades\IKKabupatenKotaFacade;

/* Models */
use Bantenprov\IKKabupatenKota\Models\Bantenprov\IKKabupatenKota\IKKabupatenKota;

/* Etc */
use Validator;

/**
 * The IKKabupatenKotaController class.
 *
 * @package Bantenprov\IKKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class IKKabupatenKotaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IKKabupatenKota $ik_kabupaten_kota)
    {
        $this->ik_kabupaten_kota = $ik_kabupaten_kota;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->ik_kabupaten_kota->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->ik_kabupaten_kota->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ik_kabupaten_kota = $this->ik_kabupaten_kota;

        $response['ik_kabupaten_kota'] = $ik_kabupaten_kota;
        $response['status'] = true;

        return response()->json($ik_kabupaten_kota);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IKKabupatenKota  $ik_kabupaten_kota
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ik_kabupaten_kota = $this->ik_kabupaten_kota;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:ik_kabupaten_kotas,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $ik_kabupaten_kota->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $ik_kabupaten_kota->label = $request->input('label');
                $ik_kabupaten_kota->description = $request->input('description');
                $ik_kabupaten_kota->save();

                $response['message'] = 'success';
            }
        } else {
            $ik_kabupaten_kota->label = $request->input('label');
            $ik_kabupaten_kota->description = $request->input('description');
            $ik_kabupaten_kota->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ik_kabupaten_kota = $this->ik_kabupaten_kota->findOrFail($id);

        $response['ik_kabupaten_kota'] = $ik_kabupaten_kota;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IKKabupatenKota  $ik_kabupaten_kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ik_kabupaten_kota = $this->ik_kabupaten_kota->findOrFail($id);

        $response['ik_kabupaten_kota'] = $ik_kabupaten_kota;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IKKabupatenKota  $ik_kabupaten_kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ik_kabupaten_kota = $this->ik_kabupaten_kota->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:ik_kabupaten_kotas,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $ik_kabupaten_kota->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $ik_kabupaten_kota->label = $request->input('label');
                $ik_kabupaten_kota->description = $request->input('description');
                $ik_kabupaten_kota->save();

                $response['message'] = 'success';
            }
        } else {
            $ik_kabupaten_kota->label = $request->input('label');
            $ik_kabupaten_kota->description = $request->input('description');
            $ik_kabupaten_kota->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IKKabupatenKota  $ik_kabupaten_kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ik_kabupaten_kota = $this->ik_kabupaten_kota->findOrFail($id);

        if ($ik_kabupaten_kota->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
