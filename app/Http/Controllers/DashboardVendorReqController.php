<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardVendorReqController extends Controller
{
    public function index()
    {
        return view('dashboard.pengajuans.index', [
            'pengajuans' =>  Pengajuan::where('ktp', null)
                            ->where('sertifikat', null)
                            ->join('users', 'pengajuans.user_id', '=', 'users.id')
                            ->select('pengajuans.*', 'users.username as uname')
                            ->get(),
        
        ]);
    }
    public function update(Request $request, $id)
    {
        $pengajuans = Pengajuan::findOrFail($id);

        $pengajuans->update([
            'status' => $request->status,
        ]);

        $pengajuans
            ->where('status', 'Lolos')
            ->join('users', 'pengajuans.user_id', '=', 'users.id')
            ->update(['role_id' => '4']);
            
        $pengajuans
            ->where('status', 'Review')
            ->join('users', 'pengajuans.user_id', '=', 'users.id')
            ->update(['role_id' => '2']);


        // dd($pengajuans);
        if ($pengajuans) {
            return redirect('/dashboard/pengajuan-vendor')
                ->with([
                    'success' => 'Request Status has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
}
