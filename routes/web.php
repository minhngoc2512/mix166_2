<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@getHomePage');
Route::get('demo',function(){
    return view('user.video.list');
});
Route::get('logout',function(){
    auth::logout();
    return view('auth.login');
});
Route::get('logoutUser',function(){
    auth::logout();
    return redirect()->route('home');
});
Auth::routes();
Route::get('/home', 'PagesController@getHomePage')->name('home');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::group(['prefix'=>'user'],function(){
        Route::get('add',function(){
            return view('admin.user.add');
        });
        Route::post('add',['as'=>'adduser','uses'=>'admin\UsersController@add']);
        Route::get('edit/{id}','admin\UsersController@edit');
        Route::post('update',['as'=>'updateUser','uses'=>'admin\UsersController@update']);
        Route::get('delete/{id}','admin\UsersController@delete');
        Route::get('list','admin\UsersController@getList');

    });
    Route::group(['prefix'=>'artist'],function(){
        Route::get('list','admin\ArtistsController@getList');
        Route::get('add',function(){
            return view('admin.artist.add');
        });
        Route::get('edit/{id}','admin\ArtistsController@edit');
        Route::get('delete/{id}','admin\ArtistsController@delete');
        Route::post('update',['as'=>'updateArtist','uses'=>'admin\ArtistsController@update']);
        Route::post('add',['as'=>'addArtist','uses'=>'admin\ArtistsController@add']);
    });
    Route::group(['prefix'=>'cate'],function(){
        Route::get('list','admin\CategoriesController@getList');
        Route::get('add',function(){
            return view('admin.category.add');
        });
        Route::get('edit/{id}','admin\CategoriesController@edit');
        Route::post('update',['as'=>'updateCate','uses'=>'admin\CategoriesController@update']);
        Route::get('delete/{id}','admin\CategoriesController@delete');
        Route::post('add',['as'=>'addCate','uses'=>'admin\CategoriesController@add']);
    });
    Route::group(['prefix'=>'genre'],function(){
        Route::get('list','admin\GenresController@getList');
        Route::get('edit/{id}','admin\GenresController@edit');
        Route::get('delete/{id}','admin\GenreController@delete');
        Route::post('add',['as'=>'addGenre','uses'=>'admin\GenresController@add']);
        Route::post('update',['as'=>'updateGenre','uses'=>'admin\GenresController@update']);
        Route::get('add',function(){
           return view('admin.genre.add');
        });
    });
    Route::group(['prefix'=>'file'],function(){
        Route::get('list','admin\FilesController@getList');
        Route::get('edit/{id}','admin\FilesController@edit');
        Route::get('add','admin\FilesController@getFormAdd');
        Route::get('delete/{id}','admin\FilesController@delete');
        Route::get('status/{id}/{status}','admin\FilesController@changeStatus');
        Route::post('update',['as'=>'updateFile','uses'=>'admin\FilesController@update']);
        Route::post('add',['as'=>'addFile','uses'=>'admin\FilesController@add']);
        Route::get('listDisable','admin\FilesController@getListDisable');
    });
});
Route::get('cate/{name}','PagesController@getmenu');
Route::get('file/{name}','PagesController@runFile');
Route::get('search/{key}','PagesController@search');
Route::post('Userlogin',['as'=>'UserLogin','uses'=>'PagesController@login']);
Route::post('UserRegistration',['as'=>'user/registration','uses'=>'PagesController@register']);

Route::get('UserProfile/{id}','PagesController@getProfile')->middleware('user');

Route::get('user/upload','PagesController@getFormUpload')->middleware('user');

Route::post('user/upload',['as'=>'user.uploadfile','uses'=>'PagesController@uploadFile'])->middleware('user');

Route::get('register/{user}/{token}','PagesController@checkRegistration');
Route::post('resetpassword',['as'=>'resetPassword','uses'=>'PagesController@resetPassword']);
Route::get('resetpassword/{email}/{token}','PagesController@resetPassword_2');
Route::get('file/favorite/{id}','PagesController@favorite');
Route::get('genres/{name}','PagesController@listGenres');
Route::get('artists/{name}','PagesController@listArtists');


Route::any('{all?}',function(){
    return redirect()->route('home');
})->where('all', '(.*)');


