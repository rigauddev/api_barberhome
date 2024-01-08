<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $companies = Company::all();

        if($companies)
            return response()->json($companies);

        return response()->json(['erro' => 'Response not found.'], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->cnpj = $request->cnpj;
        $company->phone = $request->phone;
        $company->activated = 1;
        $company->social_link = $request->social_link;
        $company->latitude = $request->latitude;
        $company->longitude = $request->longitude;
        $company->save();

        if($company)
            return response()->json($company);

        return response()->json(['erro' => 'Resource not save.'], 401);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $company = Company::find($id);

        if($company)
            return response()->json($company);

        return response()->json(['erro' => 'Response not found.'], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */

    //TODO veriricar por que esta atualizando todos os campos e nao so o campo enviado.
    public function update(Request $request, int $id): JsonResponse
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->cnpj = $request->cnpj;
        $company->phone = $request->phone;
        $company->activated = 1;
        $company->social_link = $request->social_link;
        $company->latitude = $request->latitude;
        $company->longitude = $request->longitude;
        $company->save();

        if($company)
            return response()->json($company);

        return response()->json(['erro' => 'Resource not update.'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if($company) {
            $company->delete();
            return response()->json($company);
        }

        return response()->json(['erro' => 'Rosource not destroy']);
    }
}
