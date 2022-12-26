<?php

namespace App\Http\Controllers;

use App\Http\Requests\Organisation\AddCommentRequest;
use App\Services\Organisation\OrganisationService;
use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Category;
use App\Models\Comment;


class OrganisationController extends Controller
{
    public function index(){  
        $categories = Category::all();
        $category_ids = request('cat_ids',[]);
        $organisation = Organisation::when(!empty($category_ids), function($q){
            $q->whereHas('categories', function($query){
                $query->whereIn('id', request('cat_ids'));
            });
        })->with('categories')
            ->get();
        return view('organisations.index')
            ->with('categories', $categories)
            ->with('organisation', $organisation)
            ->with('categories_id', $category_ids);
        }
     

        public function edit(Request $request, $id)
        {
            $organisation = Organisation::find($id);
            $update = [
                'legal_name' => request('legal_name'),
                'description' => request('description'),
            ];
            if($request->hasFile('logo'))
            {
                $ext = $request
                    ->file('logo')
                    ->extension();
                $file_name = str_replace(' ', '_', $organisation->legal_name).'_logo_'.time().'.'.$ext;
                $update['logo'] = $request
                    ->file('logo')
                    ->storeAs(
                        'organisations/logo',
                        $file_name, 
                        'public'
                    );
                $old_file_name = $organisation->logo;
                $old_logo_path = storage_path('app/').$old_file_name;
            }
            if($organisation->update($update)){
                if(!is_null($old_file_name) && file_exists($old_logo_path))
                {
                    unlink($old_logo_path);
                }
                return redirect()->back()->with('message', 'succes');
            }
            unlink(storage_path('app/').$$file_name);
            return redirect()->back()->with('message', 'can\'t update');
        }
    
 

public function destroy($id) {
    if(Organisation::find($id)->delete())
    {
        return redirect()->back()->with('message', 'succes');
    }
    return redirect()->back()->with('message', 'can\'t delete');
}

public function store(Request $request)
   {
       Organisation::create($request->all());
       return redirect()->back()->with('message', 'created');
   }


   public function attach_category(Request $request, $id)
   {
       $organisation = Organisation::find($id);
       if($organisation->categories()->attach(request('category_id')))
       {
           return redirect()->back()->with('message', 'succes');
       }
       return redirect()->back()->with('message', 'can\'t delete');
   }

   public function attach_category_api(Request $request){
    $category_name = request('category_name');
    $organisation_id = request('organisation_id');
    $category = Category::firstOrCreate([
        'name' => $category_name
    ]);
    $organisation = Organisation::with('categories')->findOrFail($organisation_id);
    $cat_ids = $organisation->categories->map(fn(Category $cat) => $cat->id)->toArray();
    $cat_ids[] = $category->id;
    if($organisation->categories()->sync($cat_ids))
    {
        return ['message'=> 'success'];
    }
    return ['message'=> 'failed'];
}

public function add_comment(AddCommentRequest $request)
{

    $service = new OrganisationService(request('organisation_id'));
    $comment = $service->add_comment(
        text: request('text'),
        username: request('username'),
        rate: request('rate'),
        parent_comment_id: request('parent_comment_id')
    );
   
    if(!empty($comment))
    {
        $rendered = view('organisations.comment', ['comment'=> $comment])->render();
        return ['message'=> 'success', 'html' => $rendered];
    }
    return ['message'=> 'failed'];
}

public function api_organisations(Request $request)
{
        $organisation = Organisation::ApiFilter()->get();

        return response()->json([
            'message' => 'success',
            'data' => $organisation,
        ]);
}


}

