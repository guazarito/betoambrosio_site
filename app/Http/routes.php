<?php


Route::get('/', ['uses'=>'siteController@index'] );


/*
 rotas de login/logout do ADM
*/
//Route::get('adm/login', ['as'=>'adm_login', 'uses' => 'admUploadController@adm_login']);
//Route::post('adm/login', ['as'=>'adm_do_login','uses' => 'admUploadController@doLogin']);
//Route::get('adm/logout', ['as'=>'adm_do_logout','uses' => 'admUploadController@doLogout']);

/*
 rotas de do sistema administrativo inteiro -> /ADM/..
*/
Route::group(['prefix'=>'adm', 'middleware'=>'auth.checkadm'],function (){
    Route::get('criar_album', ['as' => 'admCriarAlbum', 'uses' => 'admUploadController@criar_album']);
    Route::post('upload', ['as' => 'uploadImgs', 'uses' => 'admUploadController@upload']);
    Route::post('upload/{id}', ['uses' => 'admUploadController@upload_editAlbum']);
    Route::get('album/{id}', ['uses' => 'admUploadController@edita_album']);
	
	// =>
	Route::post('album/{id}/sort', ['as' => 'admSort','uses' => 'admUploadController@sort_fotos']);
	// <=
	
    Route::get('delete_img/{pasta}/{id_album}/thumbs/{nome_foto}', ['uses' => 'admUploadController@exlui_img']);
    Route::get('delete_imgs_capa/layout/img/capa/{nome_foto}', ['uses' => 'admUploadController@exlui_imgs_capa']);
    Route::post('edita_campos_inline/{campo}/{id}', ['as'=>'adm.edita_campos_inline', 'uses' => 'admUploadController@edita_campos_inline']);
    Route::post('edita_categoria_inline/{id_categoria}', ['as'=>'adm.edita_categoria_inline', 'uses' => 'admUploadController@edita_categoria_inline']);
    Route::get('define_capa_album/{pasta}/{id_album}/thumbs/{nome_foto}', ['uses' => 'admUploadController@define_capa_album']);
    Route::get('albuns', ['as'=>'lista_albuns', 'uses' => 'admUploadController@lista_albuns']);
    Route::get('/', ['as'=>'adm_index', 'uses' => 'admUploadController@adm_index']);
    Route::get('delete_album/{id_album}', ['uses' => 'admUploadController@exlui_album']);
    Route::get('categorias',[ 'as'=>'lista_categorias', 'uses' => 'admUploadController@lista_categorias']);
    Route::post('criar_categoria', ['as'=>'admCriaCategoria','uses' => 'admUploadController@criar_categoria']);
    Route::get('delete_categoria/{id_categoria}', ['uses' => 'admUploadController@exlui_categoria']);
	Route::get('capa_categoria/{id_categoria}', ['as' => 'admCapaCategoria', 'uses' => 'admUploadController@capa_categoria']);
	Route::post('altera_img_capa_categoria/{id_categoria}', ['as' => 'altera_img_capa_categoria', 'uses' => 'admUploadController@upload_capa_categoria_nova_img']);
    Route::get('recolocar_capa_categoria/{url}', ['as' => 'recolocar_capa_categoria', 'uses' => 'admUploadController@recolocar_capa_categoria_img_usada']);
	Route::post('altera_capa', ['as' => 'altera_capa', 'uses' => 'admUploadController@upload_capa_nova']);
    Route::post('altera_img_about', ['as' => 'altera_img_about', 'uses' => 'admUploadController@upload_about_nova_img']);
    Route::post('altera_img_palestra/{id_palestra}', ['as' => 'altera_img_palestra', 'uses' => 'admUploadController@altera_img_palestra']);
    Route::get('recolocar_capa/{url}', ['as' => 'recolocar_capa', 'uses' => 'admUploadController@recolocar_capa_usada']);
    Route::get('recolocar_sobre/{url}', ['as' => 'recolocar_sobre', 'uses' => 'admUploadController@recolocar_sobre_img_usada']);
    Route::post('edita_textos_capa_inline/{campo}', ['as'=>'adm.edita_textos_capa_inline', 'uses' => 'admUploadController@edita_textos_capa_inline']);
    Route::get('edita_about/', ['as'=>'adm.edita_about', 'uses' => 'admUploadController@edita_sobre']);
    Route::post('edita_about_inline/{campo}/{id}', ['as'=>'adm.edita_about_inline', 'uses' => 'admUploadController@edita_about_inline']);
    Route::get('define_cor_texto/{campo}/{cor}', ['uses' => 'admMudaCorController@muda_cor']);
    
    Route::post('edita_palestra_inline/{campo}/{id}', ['as'=>'adm.edita_palestra_inline', 'uses' => 'admUploadController@edita_palestra_inline']);
    Route::post('criar_palestra', ['as'=>'admCriaPalestra','uses' => 'admUploadController@criar_palestra']);
    Route::get('palestras',[ 'as'=>'lista_palestras', 'uses' => 'admUploadController@adm_lista_palestras']);
    Route::get('delete_palestra/{id_palestra}', ['uses' => 'admUploadController@exlui_palestra']);
    
    Route::get('enviafotos/{id_album}', ['uses'=> 'admUploadController@envia_fotos' ]);
    Route::post('enviafotos/{id_album}', ['uses'=> 'admUploadController@envia_fotos_upload' ]);
	
	Route::get('enviafotos_palestras/{id_palestra}', ['uses'=> 'admUploadController@envia_fotos_palestras' ]);
    Route::post('enviafotospalestras', ['uses'=> 'admUploadController@envia_fotos_upload_palestras' ]);
	
	Route::get('editafotos_palestras/{id_palestra}', ['uses'=> 'admUploadController@edita_fotos_palestras' ]);
	
	
    
});

Route::get('albuns/categoria/{categoria_id}', ['uses' => 'siteController@lista_albuns']);
Route::get('albuns/categoria/{categoria_id}/{album_id}', ['uses' => 'siteController@lista_fotos_albuns']);
Route::get('albuns/gerathumbs/{album_id}', ['uses' => 'admUploadController@gerathumbs']);

Route::get('palestras/{palestra_id}', ['uses' => 'siteController@palestras_info']);


Route::auth();

Route::get('/adm', 'HomeController@index');
