<?php
namespace App\Http\Controllers;
use App\User;
use App\link;
use DB;
use Illuminate\Http\Request;
class homeController extends Controller
{
    public function home(){
        return view('home');
    }
    public function act(Request $request){
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $link = $request->input('link');  
        $short = generateRandomString();
        DB::table('link')->insert(
            array('link_url' => $link, 'link_short' => $short)
        );
         return redirect('/?link='.$link.'&short='.$short);
    }
    public function re_act(Request $request){
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $link = $request->input('path');  
        $short = generateRandomString();
         
        DB::table('link')->insert(
            array('link_url' => $link, 'link_short' => $short)
        );
         return $short;
    }
    public function path($link){
         $user = DB::table('link')->where('link_short', $link)->first();
     return  redirect($user->link_url);
    }
}
