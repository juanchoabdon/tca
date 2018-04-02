<?php

namespace App\Http\Controllers\Admin;


use App\Subscription;
use App\Training;
use App\SubscriptionFeatures;
use App\SoftTrainings;
use App\Models\Estrategias\Estrategias;
use App\Señales;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends MainAdminController
{

    public function index()
    {
    	$suscriptions = Subscription::where('id','!=','14')->get();
      return view('admin.pages.subscriptions',compact('suscriptions'));
    }
    public function add(){
      $trainings =  Training::all();
      $estrategias = Estrategias::all();
      $señales = Señales::all();

      $softTrainings = SoftTrainings::all();

      return view('admin.pages.addSubscription',compact('trainings','estrategias','señales', 'softTrainings'));

    }

    public function store(Request $request){
        $subscription = new Subscription();
        $subscription->name = $request->name;
        $subscription->description = $request->description;
        $subscription->cost = $request->cost;
        $subscription->status = "active";
        $subscription->save();

        $id = $subscription->id;
        foreach ($request->trainings as $training) {
            $features = new SubscriptionFeatures();
            $features->suscriptions_id = $id;
            $features->training_id = $training;
            $features->type="training";
            $features->save();

        }

        if($request->estrategias){
         foreach ($request->estrategias as $estrategia) {
             $features = new SubscriptionFeatures();
             $features->suscriptions_id = $id;
             $features->training_id = $estrategia;
             $features->type="estrategia";
             $features->save();

         }
       }

       if($request->softskills){
        foreach ($request->softskills as $training) {
            $features = new SubscriptionFeatures();
            $features->suscriptions_id = $id;
            $features->training_id = $training;
            $features->type="softskills";
            $features->save();

        }
      }

        if ($request->senales) {
          foreach ($request->senales as $senal) {
              $features = new SubscriptionFeatures();
              $features->suscriptions_id = $id;
              $features->training_id = $senal;
              $features->type="senal";
              $features->save();

          }
        }



        \Session::flash('flash_message', 'Añadido con Exito');

        return redirect()->back();

    }

    public function edit($id){

      $features = SubscriptionFeatures::where('suscriptions_id','=',$id)->get();
      $subscription = Subscription::find($id);
      $trainings =  Training::all();
      $estrategias = Estrategias::all();
      $señales = Señales::all();

      $softTrainings = SoftTrainings::all();
      return view('admin.pages.editSubscription',compact('trainings','features','subscription','estrategias','id','señales', 'softTrainings'));

    }

   public function update($id,Request $request){

     $subscription = Subscription::find($id);
     $subscription->name = $request->name;
     $subscription->description = $request->description;
     $subscription->cost = $request->cost;
     $subscription->status = "active";
     $subscription->save();
     SubscriptionFeatures::where('suscriptions_id','=',$id)->delete();

    if($request->trainings){
     foreach ($request->trainings as $training) {
         $features = new SubscriptionFeatures();
         $features->suscriptions_id = $id;
         $features->training_id = $training;
         $features->type="training";
         $features->save();

     }
   }
   if($request->estrategias){
    foreach ($request->estrategias as $estrategia) {
        $features = new SubscriptionFeatures();
        $features->suscriptions_id = $id;
        $features->training_id = $estrategia;
        $features->type="estrategia";
        $features->save();

    }
  }

  if($request->softskills){
   foreach ($request->softskills as $training) {
       $features = new SubscriptionFeatures();
       $features->suscriptions_id = $id;
       $features->training_id = $training;
       $features->type="softskills";
       $features->save();

   }
 }

  if ($request->senales) {
    foreach ($request->senales as $senal) {
        $features = new SubscriptionFeatures();
        $features->suscriptions_id = $id;
        $features->training_id = $senal;
        $features->type="senal";
        $features->save();

    }
  }
  if ($request->podcast) {
        $features = new SubscriptionFeatures();
        $features->suscriptions_id = $id;
        $features->training_id = '1';
        $features->type="podcast";
        $features->save();
  }







     \Session::flash('flash_message', 'Editado');

     return redirect()->back();


   }




}
