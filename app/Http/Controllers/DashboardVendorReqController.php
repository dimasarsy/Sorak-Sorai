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
        $pengajuans = DB::table('Pengajuans')
            ->where('Pengajuans.ktp', '=', null)
            ->where('Pengajuans.sertifikat', '=', null)
            ->join('Users', 'Pengajuans.user_id', '=', 'Users.id')
            ->select('Pengajuans.*', 'Users.username as uname')
            ->get();
        // dd($pengajuans);
        return view('dashboard.pengajuans.index', ['pengajuans' => $pengajuans]);
    }
    public function update(Request $request, $id)
    {
        $pengajuans = Pengajuan::findOrFail($id);

        $pengajuans->update([
            'status' => $request->status,
        ]);

        $pengajuans->where('Pengajuans.status', '=', 'Lolos')->join('Users', 'Pengajuans.user_id', '=', 'Users.id')->update(['role_id' => '4']);
        $pengajuans->where('Pengajuans.status', '=', 'Review')->join('Users', 'Pengajuans.user_id', '=', 'Users.id')->update(['role_id' => '2']);


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
