<?php

namespace App\Http\Controllers;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection; 
use Illuminate\Http\Request;
use App\Person;
class PersonController extends Controller
{
    public function show(Person $person):PersonResource{
         /**
          *  @param Person $person
          *  @return PersonResource
          */
        return new PersonResource($person);
    }
  /**
   * @return PersonResourceCollection
   */
    public function index(): PersonResourceCollection{
        return new PersonResourceCollection(Person::paginate());
    }

    /**
     * @param Request $request
     * @return PersonResource
     */

     public function store(Request $request){
      //create the person
      $request->validate([
          'first_name'=>'required',
          'last_name'=>'required',
          'phone'=>'required',
          'eamil'=>'required',
          'city'=>'required',
      ]);
      //return the person
      $per = Person::create($request->all());
      return new PersonResource($per);
     }

     /**
      * @param Person $person 
      * @param Request $request
      * @return PersonResourse
      */

      public function update(Person $person,Request $request):PersonResource{
        //update work
         $person->update($request->all());
        //retun data
        return new PersonResource($person);
      }

      /**
       * 
       * 
       */

       public function destroy(Person $person){
            $person->delete();
            return response()->json();
       }


}
 