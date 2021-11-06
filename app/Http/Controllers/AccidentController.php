<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accident;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Auth;
    
class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:accident-list|accident-create|accident-edit|accident-delete', ['only' => ['index','store']]);
         $this->middleware('permission:accident-create', ['only' => ['create','store']]);
         $this->middleware('permission:accident-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:accident-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accidents = Accident::orderBy('id','DESC')->paginate(5);
        return view('accidents.index',compact('accidents'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accidents.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:accidents,title',
            'location' => 'required',
            'accident_detail' => 'required',
            'detail_injured_people' => 'required',
            'car_detail' => 'required',
            'event_date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $image_archivo = '';

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $image_archivo = "$profileImage";
        }

        $accident = Accident::create([
            'title' => $request->input('title'),
            'location' => $request->input('location'),
            'accident_detail' => $request->input('accident_detail'),
            'detail_injured_people' => $request->input('detail_injured_people'),
            'car_detail' => $request->input('car_detail'),
            'event_date' => $request->input('event_date'),
            'image' => $image_archivo,
            'user_id' => Auth::id(),
    ]);
        
        return redirect()->route('accidents.index')
                        ->with('success','Accidente creado exitosamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accident = Accident::find($id);
        return view('accidents.show',compact('accident'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accident = Accident::find($id);     
        return view('accidents.edit',compact('accident'));
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

        $this->validate($request, [
            'location' => 'required',
            'accident_detail' => 'required',
            'detail_injured_people' => 'required',
            'car_detail' => 'required',
            'event_date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $image_archivo = '';
        
        $accident = Accident::find($id);
        $accident->title = $request->input('title');
        $accident->location = $request->input('location');
        $accident->accident_detail = $request->input('accident_detail');
        $accident->detail_injured_people = $request->input('detail_injured_people');
        $accident->car_detail = $request->input('car_detail');
        $accident->event_date = $request->input('event_date');

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $image_archivo = "$profileImage";
            $accident->image = $image_archivo;
        }

        $accident->save();
    
        return redirect()->route('accidents.index')
                        ->with('success','Accidente actualizado exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("accidents")->where('id',$id)->delete();
        return redirect()->route('accidents.index')
                        ->with('success','Accidente eliminado exitosamente');
    }
}
