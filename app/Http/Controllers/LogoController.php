<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Auth;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = Logo::paginate(10);
        return view('pages.server.logolist')->with('logo', $logo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.logoadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logo = new Logo();
        $files = $request->file('img');
        $request->validate([
            'slide_img' => ['required'],
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'detail' =>['required','min:20'],
            'keyword' => ['required']
       ]);
       // Define upload path
           $destinationPath = public_path('/server/assets/images/logo'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$logo->img="$profileImage";
        // $properties = Collection::make([
        //     $request->name,
        //     $request->detail,
        //     $request->keyword,
        //     $request->img,
        //     ])->all();
        // $array[] = logo::$array  ;
        // $logo->properties = "$array";
        // $logo->properties = $request->name $request->id_cate, $request->price,
        // $request->color,$request->detail,$request->keyword,
        // $request->quantity,$request->img;//
        foreach ($request->file('slide_img') as $file){
       // Define upload path
           $destinationPath = public_path('/server/assets/images/logo/hover'); // upload path
        // Upload Orginal Image           
           $slide_profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
           $file->move($destinationPath, $slide_profileImage);
 
           $insert[] = "$slide_profileImage";
        // Save In Database
		$logo->slide_img="$slide_profileImage";
        }
        $logo->save();
        return redirect()->route('Logo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logo = Logo::find($id);return view('pages.server.logoshow')->with('logo', $logo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo = Logo::find($id);
        return view('pages.server.logoedit')->with('logo', $logo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $logo = logo::find($id);
        $files = $request->file('img');
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'detail' =>['required','min:20'],
            'keyword' => ['required']
       ]);
       // Define upload path
           $destinationPath = public_path('/server/assets/images/logo'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$logo->img="$profileImage";
        $logo->save();
        return redirect()->route('Logo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = Logo::find($id);
        $logo->delete();
        return redirect()->route('Logo.index');
    }

    public function disabled(Request $request, $id)
    {
        $logo = Logo::find($id);
        $logo->status = 0;
        $logo->save();
        return redirect()->route('Logo.index');
    }
    public function enabled(Request $request, $id)
    {
        $logo = Logo::find($id);
        $logo->status = 1 ;
        $logo->save();
        return redirect()->route('Logo.index');
    }
}
