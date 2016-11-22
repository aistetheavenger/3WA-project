<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Dish;
use Illuminate\Http\Request;




class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dishes = Dish::all();

        return view('dishesCRUD.index', compact('dishes'));
    }

    public function user(Request $request)
    {
        $dishes =Dish::all();
        $cart = $request->session()->get('cart', new Cart());;
        $cartCount=$cart->count();

        

        return view('dishesForUser.index', compact('dishes', 'cartCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishes = Dish::all();

        return view('dishesCRUD.create', compact('dishes'));
    }


    public function store(Request $request)
    {
        $file = $request->file('photo');
        $dir = public_path('uploads');
        $filename = $this->generateFileName($dir, $file);
        $request->file('photo')->move($dir, $filename);

        $dish = Dish::create($request->all());
        $dish->update(['photo' => $filename]);

        return redirect()
        ->route('dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dishes = Dish::find($id);

        return view('dishesCRUD.edit', compact('dishes'));
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
        $dish = Dish::find($id);
        $dish->update($request->except('photo'));

        if ($request->hasFile('photo')){
            $file = $request->file('photo');
            $dir = public_path('uploads');
            $filename = $this->generateFileName($dir, $file);
            $request->file('photo')->move($dir, $filename);

            $dish->update(['photo' => $filename]);
        };

//
//
        return redirect()
        ->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dishes = Dish::find($id);
        $dishes->delete();

        return redirect()
        ->route('dishes.index');
    }

    protected function generateFileName($dir, $file){
        $originalName = $file->getClientOriginalName();
        $parts= explode('.' , $originalName);
        $extension = $parts[count($parts) - 1];

        while(true){
            $filename = md5(microtime(true)) . '.' . $extension;
            if(!file_exists($dir . '/' . $filename)){
                return $filename;
            }
        }
    }
}
