<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
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
        $employees = Employee::all();

        if($employees)
            return response()->json($employees);

        return response()->json(['error' => 'Response not found'], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->first_name = $request->last_name;
        $employee->last_name = $request->last_name;
        $employee->address = $request->address;
        $employee->users_id = $request->user_id;
        $employee->companies_id = $request->companies_id;
        $employee->save();

        if($employee)
            return response()->json($employee);

        return response()->json(['error' => 'Response not salve'], 401);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $employee = Employee::find($id);

        if($employee)
            return response()->json($employee);

        return response()->json(['error' => 'Response not found'], 401);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $employee =  Employee::find($id);
        $employee->first_name = $request->last_name;
        $employee->last_name = $request->last_name;
        $employee->address = $request->address;
        $employee->users_id = $request->user_id;
        $employee->companies_id = $request->companies_id;
        $employee->save();

        if($employee)
            return response()->json($employee);

        return response()->json(['error' => 'Response not fund'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
