<?php

namespace App\Http\Controllers\api\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teacher;
use Validator ;
class TeacherController extends Controller
{
    public function index ()
    {

        try {

        $teachers = teacher::get() ;
        if($teachers)
        {
            return  response()->json(['data'=>$teachers , 'error'=> ''] , 200) ;
        }else{
            return  response()->json(['data'=>'لايوجد بيانات ', 'error'=> ''] , 200) ;

        }

          } catch (\Exception $e) {

            return  response()->json(['data'=>'' , 'error'=> $e] , 200) ;
          }


    }

    public function create(Request $request)

    {

        try {
            $validated = Validator::make($request->all(),[
                'name' => 'required|max:255',
                'phoneNumber' => 'required|numeric|digits:11',
                'dateOfBirth' => 'required|date_format:Y-m-d|before:today' ,
                'address' => 'required|max:255',

            ]);
            if($validated ->fails()){
                return response()->json(['data'=> '' , 'error' =>$validated->errors()]);
            }

            $teacher = new teacher  ;

            $teacher -> name = $request->name ;
            $teacher -> phoneNumber = $request->phoneNumber ;
            $teacher -> dateOfBirth = $request->dateOfBirth ;
            $teacher -> address = $request->address ;
            $teacher->save();
            if($teacher)
            {
                return  response()->json(['data'=>$teacher ,'massge'=> 'تم الحفظ بنجاح' , 'error'=> ''] , 200) ;
            }else{
                return  response()->json(['data'=>''  , 'error'=> 'لم يتم حفظ البيانات'] , 200) ;

            }


              } catch (\Exception $e) {

                return  response()->json(['data'=>'' , 'error'=> $e] , 200) ;
              }
    }

    public function showbyId($id)
    {
      //  return "Ok" ;

        try {

            $teacher =  teacher::find($id)  ;

            if($teacher)
            {
                return  response()->json(['data'=>$teacher , 'error'=> ''] , 200) ;
            }else{
                return  response()->json(['data'=>''  , 'error'=> 'لم يتم العثور على نتائج'] , 200) ;

            }

              } catch (\Exception $e) {

                return  response()->json(['data'=>'' , 'error'=> $e] ) ;
              }
    }
    public function UpdatebyId(Request $request ,$id)
    {
      //  return "Ok" ;

        try {

            $teacher =  teacher::find($id)  ;

            if($teacher)
            {

                $validated = Validator::make($request->all(),[
                    'name' => 'required|max:255',
                    'phoneNumber' => 'required|numeric|digits:11',
                    'dateOfBirth' => 'required|date_format:Y-m-d|before:today' ,
                    'address' => 'required|max:255',

                ]);
                if($validated ->fails()){
                    return response()->json(['data'=> '' , 'error' =>$validated->errors()]);
                }

                $teacher -> name = $request->name ;
                $teacher -> phoneNumber = $request->phoneNumber ;
                $teacher -> dateOfBirth = $request->dateOfBirth ;
                $teacher -> address = $request->address ;
                $teacher->save();

                return  response()->json(['massge'=> 'تم تعديل بيانات  بنجاح ', 'data'=>$teacher  ,'error'=> ''] , 200) ;
              //  return  response()->json(['data'=>$teacher , 'error'=> ''] , 200) ;

            }else{
                return  response()->json(['data'=>''  , 'error'=> 'لم يتم العثور على نتائج'] , 200) ;

            }

              } catch (\Exception $e) {

                return  response()->json(['data'=>'' , 'error'=> $e] ) ;
              }
    }
    public function Delete($id){
        try {

            $teacher =  teacher::find($id)  ;

            if($teacher)
            {

                $teacher->delete();

                return  response()->json(['massge'=> 'تم حذف البيانات  بنجاح ', 'data'=>''  ,'error'=> ''] , 200) ;

            }else{
                return  response()->json(['data'=>''  , 'error'=> 'لم يتم العثور على نتائج'] , 200) ;

            }

              } catch (\Exception $e) {

                return  response()->json(['data'=>'' , 'error'=> $e] ) ;
              }
    }
}
