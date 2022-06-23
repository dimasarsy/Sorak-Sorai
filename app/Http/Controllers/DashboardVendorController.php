<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuans = DB::table('Pengajuans')
            ->where('Pengajuans.ktp', '=', null)
            ->where('Pengajuans.sertifikat', '=', null)
            ->where('Pengajuans.status', '=', 'Lolos')
            ->join('Users', 'Pengajuans.user_id', '=', 'Users.id')
            ->select('Pengajuans.*', 'Users.username as uname')
            ->get();

        return view('dashboard.vendors.index', [
            'users' => User::query()->latest()->get(),
            'pengajuans' => $pengajuans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $datavendor = Datavendor::find($request->datavendorID);
        $datavendor->is_vendor = 1;
        $datavendor->update();

        return redirect()->to('/dashboard/vendors')->with('success', 'Datavendor has been updated.');
        
    }

    public function postApprove($id)
    {
        $datavendor = Datavendor::where('id', '=', e($id))->first();
        $datavendor->author->is_vendor = 1;
        $datavendor->save();

        return redirect()->to('/dashboard/vendors')->with('success', 'Datavendor has been updated.');
        
    }

    function status_update($id)
    {
        //get product status with the help of product ID
        $datavendor = Datavendor::table('datavendor')
                    ->select('user_id')
                    ->where('id','=',$id)
                    ->first();
    
        //Check user is_vendor
        if($datavendor->author->is_vendor == '1'){
            $is_vendor = '0';
        }else{
            $is_vendor = '1';
        }
    
        //update datavendor is_vendor
        $values = array('user_id' => $is_vendor );
        Datavendor::table('datavendor')->where('id',$id)->update($values);
    
        session()->flash('msg','datavendor is_vendor has been updated successfully.');
        return redirect('main/successlogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
