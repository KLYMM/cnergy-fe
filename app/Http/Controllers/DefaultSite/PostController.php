<?php
namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;

use Site, Data, Util, Src;

class PostController extends Controller
{
    function index()
	{
		if( method_exists($this, '_'.\Str::camel(\request()->method)) )
		{
			return $this->{'_'.\Str::camel(\request()->method)}();
		}
		else return abort(404);
	}

    function _report()
    {
        $validator =  [
            'name' => 'required',
            'from' => 'required|email', 
            'phone' => 'required', 
            'url' => 'required', 
            'subject' => 'required', 
            'content' => 'required', 
            'type' => 'required', 
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ];

        request()->validate($validator);
        request()->request->add(['captcha_token'=>request('g-recaptcha-response')]); 
        request()->request->add(['date'=>date('Y-m-d H:i:s')]); 
        request()->request->remove('g-recaptcha-response'); 


        $response=Data::reporting(request()->all());
        
        return response()->json(['status'=>'success', 'res'=>$response]);
    }

    function contact_us()
    {
        config()->set('site.attributes.meta', [
            "title"=>config('site.attributes.title'),
        ]);

        return Site::view('pages.contact_us');
    }

    function _webHook()
    {
        if (request('section')=='news') 
        {
            $slug=Src::detail(request('data'));
            \Artisan::call('sitecache:clear',['type' => 'readpage', '--slug' => $slug]);
    
            return response()->json(['status'=> 'success', 'slug'=>$slug, 'out'=>\Artisan::output()]);
        }
        elseif ( in_array(request('section'), ['frontend-setting', 'domain', 'inventory-management']) ) 
        {
            \Artisan::call('sitecache:clear',['type' => 'global', '--slug' => null]);
    
            return response()->json(['status'=> 'success', 'out'=>\Artisan::output()]);
        }
    }

    function _getToken()
    {
        return response()->json([
            'status'=> 'success',
            'token'=> csrf_token()
        ]);
    }
}