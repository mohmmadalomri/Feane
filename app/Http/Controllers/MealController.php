<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::paginate(5);
        $categories = Category::all();
        $category = Meal::leftJoin('categories', 'categories.id', '=', 'meals.category_id')
            ->select('meals.*', 'categories.name as category.name')->get();
        return view('meals.index', compact('meals','category','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $meals = new Meal();
        $categories = Category::all();

        return view('meals.create', compact('meals', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('image');
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image_url = $image->store('meals', 'public');
            $data['image'] = $image_url;
        }
        Meal::create($data);
        return redirect()->route('meals.index')->with('done', 'meal add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        // $meal=Meal::all();

        return view('meals.show', ['meal' => $meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $meals = Meal::where('id')->first();

        // $meals = Meal::where('id', '<>', $meal->id)->get();
        $meals = Meal::findOrFail($id);
        return view('meals.edit', compact('meals'));
    }
    /**
     *   resource in s
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $meals = Meal::FindOrFail($id);
        // $meals->name = $request->name;
        // $meals->description = $request->description;
        // $meals->price = $request->price;
        // $meals->image = $request->image;
        // $meals->categories = $request->categories;
        $meals->update($request->all());

        $meals->save();
        return redirect()->route('meals.index')->with('done', 'meal updated');
    }

    /**

     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {

        $meal->delete();
        return redirect()->route('meals.index')->with('done', 'meal deleted');
    }
}
