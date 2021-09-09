<?php

namespace PurchaseControl\Http\Controllers;

use PurchaseControl\Branches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PurchaseControl\Http\Requests\Branch as BranchRequest;
use PurchaseControl\User;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branches::all();
        return view('admin.branches.index',[
            'branches'=>$branches
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        
        return view('admin.branches.create',[
            'users' => $users
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
       $branchCreate = Branches::create($request->all());
       
       return redirect()->route('branches.edit', [
            'branch' => $branchCreate->id
        ])->with([
            'color'=>'alert-success',
            'message' => 'Centro de Custo Cadastrado com sucesso!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \PurchaseControl\branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function show(branches $branches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PurchaseControl\branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $branch = Branches::where('id', $id)->first();
        $users = User::orderBy('name')->get();

        return view('admin.branches.edit',[
            'branch' => $branch,
            'users' => $users,
            
        ]);
        
        //var_dump($branch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PurchaseControl\branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, $id)
    {
        $branch = Branches::where('id', $id)->first();
       
        $branch->fill($request->all());

        if(!$branch->save())
        {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('branches.edit', [
            'branch' => $branch->id
        ])->with([
            'color'=>'alert-success',
            'message' => 'Centro de Custo Atualizado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PurchaseControl\branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function destroy(branches $branches)
    {
        //
    }
}
