<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\admin;

use Illuminate\Http\Request;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

/******************************************public Route*******************************************/

/**************************route auth config************************* */
Auth::routes();
Auth::routes(['register' => false]);
/*Route::get('/register',function(){
	echo "l'url /regsiter pas disponible";
});*/
/**************************end route auth config************************* */


/******************************************end public Route*******************************************/
Route::post('/sendmail','MailController@sendmailcontactform')->name('sendmail');
Route::get('/','HomeController@welcome')->name('welcome');
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

/***************************************administrateur Route***************************************/
Route::post('changephotoprofile','ProfileController@changephotoprofile')->name('changephotoprofile')->middleware("auth");

Route::prefix('admin')->group(function()
{ 
	Route::middleware(['Check_Admin','auth'])->group(function () {
		/************************************dashboard statistique***************************************/
			Route::get('/dashboard','AdminController@index')->name('admin');
			Route::get('/profile','AdminController@profile')->name('profile');
			Route::post('/updateprofile', 'ProfileController@changedata')->name('updatedataadmin');
	/************************************Gestion de compte***************************************/
			Route::get('listpatient','AdminController@allpatient')->name('allpatient');
			Route::get('listprofessionnel','AdminController@allprofessionnel')->name('allprofessionnel');
			Route::get('listadmin','AdminController@alladmin')->name('alladmin');
			Route::get('delete/{id}','AdminController@deletecompte')->name('deletecompte');
			Route::post('searchuser','AdminController@search')->name('search');
			/*****************************Gestion Hoptial*************************************/
			Route::get('addhopital','HopitalController@showforumaddhopital')->name('showforumaddhopital');	
			Route::post('addhopital','HopitalController@addhopital')->name('addhopital');	
			Route::get('listhopital','HopitalController@listhopital')->name('listhopital');
			Route::get('deletehopital/{id}','HopitalController@deletehopital')->name('deletehopital');
			Route::get('showupdatehopital/{id}','HopitalController@showupdatehopital')->name('showupdatehopital');
			Route::post('updatehopital/{id}','HopitalController@updatehopital')->name('updatehopital');
			Route::post('searchhopital','HopitalController@searchhopital')->name('searchhopital');
		
			/*******************************************gestion de forum**********************/
			Route::get('listforum','ForumController@listforum')->name('listforum');
			Route::get('listforumrefuse','ForumController@listforumrefuse')->name('listforumrefuse');
			Route::get('listforumaccepte','ForumController@listforumaccepte')->name('listforumaccepte');
			Route::get('listforumentende','ForumController@listforumatende')->name('listforumatende');
			Route::post('serachforum','ForumController@serachforum')->name('serachforum');
			Route::get('deleteforum/{id}','ForumController@deleteforum')->name('deleteforum');
			Route::get('detailforum/{id}','ForumController@detailforum')->name('detailforum');
			Route::get('accepteforum/{id}','ForumController@accepteforum')->name('accepteforum');
			Route::get('refuseforum/{id}','ForumController@refuseforum')->name('refuseforum');
			Route::get('entendeforum/{id}','ForumController@entendeforum')->name('entendeforum');
			/////************************************end gestion de forum*********************** */
			/****************************************gestion de rendez-vous******************************/
			Route::get('list-rdv','RendezVousController@allrendezvous')->name('allrendezvous');
			
			/******************************************end gestion de rendez vous********************/
			Route::get('/supprimer-rdv/{id}','RendezVousController@deleterendezvous')->name('admindeleterdv');
			Route::get('accepterdv/{id}','RendezVousController@accepterdv')->name('accepterdv');
			Route::get('refuserdv/{id}','RendezVousController@refuserdv')->name('refuserdv');
			Route::post('searchrdv','RendezVousController@searchrdv')->name('searchrdv');
		});
	
	
});
/*****************************************end adminstrateur Route**************************** */

/***********************************professionnel Route***************************************/
Route::prefix('professionnel')->group(function()
{
	
	
	Route::get('register',function(){return view('auth.registerprofessionnel');})->name('registerprofessionnel');
	Route::middleware(['Check_Professionnel','auth'])->group(function () {
		/******************************************update profile********************************/
			 Route::get('/profile','ProfileController@profile')->name('updateprofileprof');
			 Route::post('/profile/edit','ProfileController@changedata')->name('updateprofilepro');
			 /************************************consulte  les forum  */
			 Route::post('serachforum','ForumController@serachforum')->name('serachforumaccepte');
			 Route::get('/list-forum','ForumController@showallforum')->name('show-all-forum');
			 Route::get('forum/{id}/detail','ForumController@detailforumprof')->name('detailforumprof');
			 Route::post('/detailforum/addcomment','CommentaireController@addcomment')->name('addcomment');
			 Route::get('/like/{id}','LikeController@addlike')->name('addlike');
			 Route::get('/dislike/{id}','LikeController@adddislike')->name('dislike');
			 Route::get('/deletecomment/{id}','CommentaireController@deletecomment')->name('deletecomment');
			
			 /**************************************mes forum************************************************/
			 Route::get('/demandeajouteforum','ForumController@showForum')->name('show-interface-add-forum');
			 Route::post('/ajouterforum','ForumController@addforum')->name('addforum');
			 Route::get('/mesforum','ForumController@mesforum')->name('mesforum');
			 Route::get('/supprimer-forum/{id}','ForumController@deleteforum')->name('deleteforum');
			 /****************************update me forum************************************* */
			 Route::get('miseajour-forum/{id}','ForumController@find')->name('showupdateforum');
			 Route::post('miseajour--forum/{id}','ForumController@updateforum')->name('updateforum');
			 
	});
});
/*****************************************end professionnel Route**************************** */
/***************************************Patient Route***************************************/

Route::prefix('patient')->group(function()
{
		Route::get('register',function(){return view('auth.registerpatient');})->name('registerpatient');
	
		Route::middleware(['Check_Patient','auth'])->group(function () {
			/*********************************update profile patient************************************* */
			Route::get('/profile','ProfileController@profile')->name('updateprofilepatient');
			Route::post('/profile/edit','ProfileController@changedata')->name('updateprofilepat');
			/*****************************add rdv*************************************** */
			Route::get('/ajouter-rendez-vous','RendezVousController@showformrendezvous')->name('show-interface-rendez-vous');
			Route::post('/ajouter-rendez-vous','RendezVousController@add')->name('save-rendez-vous');
			/****************************list mes rdv************************************* */
			Route::get('/mesrdv','RendezVousController@mesrendezvous')->name('mesrdv');
			Route::get('/supprimer-rdv/{id}','RendezVousController@deleterendezvous')->name('deleterdv');
			
			/***************************************update rdv*******************************/
			Route::get('miseajour-rdv/{id}','RendezVousController@find')->name('showformupdaterdv');
			Route::post('miseajour--rdv/{id}','RendezVousController@update')->name('updaterdv');

		

			
	    });
});
/*****************************************end Patient Route**************************** */

/**************************************error route****************************** */
//Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
//Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);
/*******************************************end error route**********************************/

Route::group(['middleware' => 'auth'], function () {
//	Route::resource('user', 'UserController', ['except' => ['show']]);
	//Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	//Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});



/***********************************************comment route***********************/

//Route::post('addcompte', 'Auth\RegisterController@register')->name('addcompte');
//Auth::routes(['register' => false]);
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');