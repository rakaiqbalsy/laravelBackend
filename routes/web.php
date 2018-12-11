<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('test_drives', 'Admin\TestDrivesController');
    Route::post('test_drives_mass_destroy', ['uses' => 'Admin\TestDrivesController@massDestroy', 'as' => 'test_drives.mass_destroy']);
    Route::post('test_drives_restore/{id}', ['uses' => 'Admin\TestDrivesController@restore', 'as' => 'test_drives.restore']);
    Route::delete('test_drives_perma_del/{id}', ['uses' => 'Admin\TestDrivesController@perma_del', 'as' => 'test_drives.perma_del']);
    Route::resource('beritas', 'Admin\BeritasController');
    Route::post('beritas_mass_destroy', ['uses' => 'Admin\BeritasController@massDestroy', 'as' => 'beritas.mass_destroy']);
    Route::post('beritas_restore/{id}', ['uses' => 'Admin\BeritasController@restore', 'as' => 'beritas.restore']);
    Route::delete('beritas_perma_del/{id}', ['uses' => 'Admin\BeritasController@perma_del', 'as' => 'beritas.perma_del']);
    Route::resource('merks', 'Admin\MerksController');
    Route::post('merks_mass_destroy', ['uses' => 'Admin\MerksController@massDestroy', 'as' => 'merks.mass_destroy']);
    Route::post('merks_restore/{id}', ['uses' => 'Admin\MerksController@restore', 'as' => 'merks.restore']);
    Route::delete('merks_perma_del/{id}', ['uses' => 'Admin\MerksController@perma_del', 'as' => 'merks.perma_del']);



 
});
