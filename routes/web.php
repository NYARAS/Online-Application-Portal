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
Route::get('testquery/{id}', 'AdminController@testquery');
Route::get('contactPage', 'PagesController@getContact');
Route::get('services', 'PagesController@getServices');
Route::get('create', 'PostsController@create');

Route::get('about', 'PagesController@getAbout')->middleware('auth');
Route::get('/', 'PagesController@getIndex')->middleware('auth');
Route::get('services', 'PagesController@getServices');
Route::resource('vacancies', 'VacanciesController');
Route::post('/insert', 'VacanciesController@store');
Route::get('/update/{id}', 'VacanciesController@update');
Route::post('/edit/{id}', 'VacanciesController@edit');
Route::get('/delete/{id}', 'VacanciesController@destroy');
//ADMIN ROLE
Route::get('/profile', 'ProfilesController@profile')->middleware('auth');
Route::get('/school', 'SchoolsController@school')->middleware('auth');
Route::get('/post', 'PostsController@post')->middleware('auth');
Route::get('/jobcode', 'JobcodesController@jobcode')->middleware('auth');
Route::post('/addschool', 'SchoolsController@store')->middleware('auth');
Route::post('/addprofile', 'ProfilesController@store')->middleware('auth');
Route::post('/addjobcode', 'JobcodesController@store')->middleware('auth');
Route::post('/addpost', 'PostsController@store')->middleware('auth');
Route::get('/edit/{id}', 'PostsController@edit')->middleware('auth');
Route::get('/view/{post_id}', 'PostsController@view')->middleware('auth');
Route::post('/editpost/{id}', 'PostsController@update')->middleware('auth');
Route::get('/delete/{id}', 'PostsController@destroy')->middleware('auth');
Route::get('/school/{id}', 'PostsController@show')->middleware('auth');
Route::get('/like/{id}', 'PostsController@like')->middleware('auth');
Route::get('/dislike/{id}', 'PostsController@dislike')->middleware('auth');
Route::post('/comment/{id}', 'PostsController@comment')->middleware('auth');


Route::post('/comment/{id}', 'PersonalController@comment')->middleware('auth');

Route::post('/search', 'PostsController@search')->middleware('auth');


Route::get('/apply/{post_id}', 'PersonalController@apply')->middleware('auth');


//candidates
Route::get('candidates', 'CandidateController@index')->middleware('auth');
//Route::get('/editcandidates/{id}', 'CandidateController@editcandidate');

Route::get('/candidates/edit-candidates/{id}',['as'=>'editcandidate','uses'=>'CandidateController@editcandidate']);

Route::post('/editcandidates/{id}', 'CandidateController@update');

//Route::get('/applicant/{id}', 'CandidateController@show')->middleware('auth');

Route::get('/personal/applicant/get-personal/{id}',['as'=>'show','uses'=>'CandidateController@show']);

Route::get('/personal/applicant/get-header/{id}',['as'=>'show','uses'=>'HeaderController@show']);

//=================================Download Files================================
Route::get('/editpersonal/{id}', 'PersonalController@editpersonal');

Route::post('/editpersonal/{id}', 'PersonalController@update');

//=============================================================================

Route::resource('test', 'TestController');
Route::get('test', 'TestController@index')->name('test');
Route::get('api/test', 'TestController@apiTest')->name('api.test');

//======================================================================
Route::resource('publication', 'PublicationController');
Route::get('publication', 'PublicationController@index')->name('publication');
Route::get('api/publication', 'PublicationController@apiTest')->name('api.publication');

//=========================================================================
Route::resource('science', 'ScienceController');
Route::get('science', 'ScienceController@index')->name('science');
Route::get('api/science', 'ScienceController@apiTest')->name('api.science');

//========================================================================
//=========================================================================
Route::resource('adminhome', 'AdminController');
Route::get('adminhome', 'AdminController@getAdminHome')->name('adminhome');
Route::get('api/adminhome', 'AdminController@apiTest')->name('api.adminhome');
Route::get('user/adminhome', 'AdminController@userData')->name('user.adminhome');

//========================================================================



Route::resource('qualification', 'QualificatinController');
Route::get('qualification','QualificatinController@qualification')->name('qualification');
Route::get('api/qualification','QualificatinController@apiTest')->name('api.qualification');












//Route::get('/applicants/personal-files/get-all-personal-files',['as'=>'getDownload','uses'=>'PersonalController@getDownload']);
//Route::get('/applicants/qualification-files/get-all-qualification-files',['as'=>'getDownload','uses'=>'QualificatinController@getDownload']);
Route::get('/getPDF/{id}', 'QualificatinController@getPDF');




Route::get('/test', 'QualificatinController@test');

Route::get('/getD', 'QualificatinController@getD');
Route::get('/getDownload', 'QualificatinController@getDownload');
Route::get('/getSchoolOfEducation', 'QualificatinController@getSchoolOfEducation');

Route::get('/files/applicant/get-application-files/{id}',['as'=>'getDownload','uses'=>'HeaderController@getDownload']);
Route::get('/personal/applicant/get-applicant/{id}',['as'=>'getDownload','uses'=>'QualificatinController@getDownload']);
//END ADMIN ROLE

//Personal

Route::get('/personal/applicant/get-personal',['as'=>'personal','uses'=>'PersonalController@personal']);
Route::post('/personal/applicant/post-personal',['as'=>'storePersonal','uses'=>'PersonalController@storePersonal']);





//Qualifications

Route::get('/qualifications/applicant/get-qualifications',['as'=>'getQualifications','uses'=>'QualificatinController@getQualifications']);


Route::post('/qualifications/applicant/post-qualifications',['as'=>'storeQualifications','uses'=>'QualificatinController@storeQualifications'])->middleware('auth');
Route::get('/editqualifications/{id}', 'QualificatinController@editqualification');
Route::post('/editqualifications/{id}', 'QualificatinController@update');
//Experience
Route::get('experience', 'ExperienceController@index');
Route::post('/addexperience', 'ExperienceController@store');
//Publications

Route::get('/publications/applicant/get-publications',['as'=>'getpublication','uses'=>'PublicationController@getpublication']);
Route::post('/publications/applicant/post-publications',['as'=>'storepublication','uses'=>'PublicationController@storepublication']);

Route::get('/publications/applicant/edit-publications/{id}',['as'=>'editpublication','uses'=>'PublicationController@editpublication']);
Route::post('/editpublication/{id}', 'PublicationController@update');
//Referees
Route::get('referees', 'RefereeController@index');
Route::post('/addreferees', 'RefereeController@store');

Route::post('/addreferees', 'PersonalController@store');
//Terms and Conditions
//Route::get('terms', 'TermsController@index');
//Route::post('/addtransactionid', 'TermsController@store');


Route::get('/terms-and-conditions/applications-conditions',['as'=>'getTerms','uses'=>'TermsController@getTerms']);
Route::post('/terms-and-conditions/applications-conditions',['as'=>'storeTerms','uses'=>'TermsController@storeTerms']);


//Loading Applicants
Route::get('/loading','LoadingController@loading');
Route::get('/showdata','LoadingController@showdata');

//Send Interview Letter
Route::post('/sendLetter','InterviewLetterController@sendLetter');
Route::get('/getSendMail','InterviewLetterController@getSendMail');








Route::get('/PersonalInformation', function () {
    return view('PersonalInformation');

});
Route::get('/PersonalInfo', function () {
    return view('PersonalInfo');
});



Auth::routes();
Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');

Route::post('auth/activate/resend', 'Auth\ActivationResendController@resend');
Route::get('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');


Route::get('/dashboard', 'DashboardController@index');

//Testing
Route::get('/getDynamic', 'DynamicController@getDynamic')->name('getDynamic');
Route::get('getDynamic/getData', 'DynamicController@getData')->name('getDynamic.getData');
Route::get('getDynamic/fetchdata', 'DynamicController@fetchdata')->name('getDynamic.fetchdata');

Route::get('ajaxdata', 'DynamicController@ajaxdata')->name('ajaxdata');
Route::post('ajaxdata/postdata', 'DynamicController@postdata')->name('ajaxdata.postdata');

Route::post('/dynamic/applicant/post-dynamic',['as'=>'storeDynamic','uses'=>'DynamicController@storeDynamic'])->middleware('auth');


Route::get('/admin-manage/system-update',['as'=>'getManagePosts','uses'=>'PostsController@getManagePosts'])->middleware('auth');
Route::post('/manage/post/insert-school',['as'=>'postInsertSchool','uses'=>'PostsController@postInsertSchool']);
Route::post('/manage/post/insert-jobtitle',['as'=>'postInsertJobTitle','uses'=>'PostsController@postInsertJobTitle']);
Route::post('/manage/post/insert-jobcode',['as'=>'postInsertJobcode','uses'=>'PostsController@postInsertJobcode']);
Route::get('/manage/post/show-jobcode',['as'=>'showJobcode','uses'=>'PostsController@showJobcode']);
Route::post('/manage/post/inser-grade',['as'=>'insertGrade','uses'=>'PostsController@insertGrade']);
Route::post('/manage/post/create-class',['as'=>'createPost','uses'=>'PostsController@createPost']);
Route::get('/manage/post-info',['as'=>'showPostInformation','uses'=>'PostsController@showPostInformation']);
Route::post('/manage/post/delete',['as'=>'deletePost','uses'=>'PostsController@deletePost']);
Route::get('/manage/post/edit',['as'=>'editPost','uses'=>'PostsController@editPost']);
Route::post('/manage/post/update',['as'=>'updatePost','uses'=>'PostsController@editPost']);
Route::get('/manage/post/view',['as'=>'adminview','uses'=>'PostsController@adminview']);
Route::get('/manage/post/delete{id}',['as'=>'admindestroy','uses'=>'PostsController@admindestroy']);
Route::get('/manage/candidates/list-qualified',['as'=>'admincandidate','uses'=>'CandidateController@admincandidate']);
//------------------------------------MANAGEMENT-------------------------------------------------------------
Route::get('/manage/management/list-register',['as'=>'mngInfo','uses'=>'PersonalController@mngInfo']);
Route::post('/manage/management/new-register',['as'=>'managementRegister','uses'=>'PersonalController@managementRegister']);

//-----------------------------------FINANCE ROLE---------------------------------------------------------------------
Route::get('/finance/confirm/applicant-payment-science',['as'=>'confirmschoolofscience','uses'=>'TermsController@confirmschoolofscience']);
Route::get('/finance/confirm/applicant-payment-education',['as'=>'confirmschoolofEducation','uses'=>'TermsController@confirmschoolofEducation']);
Route::get('/finance/update-payment/{id}',['as'=>'confirmpayment','uses'=>'TermsController@confirmpayment']);
Route::post('/updatepayment/{id}', 'TermsController@update');
//-----------------------------------SCHOOLS------------------------------------------------------------------
Route::get('/manage/school/school-of-science',['as'=>'showschoolofscience','uses'=>'CandidateController@showschoolofscience']);
Route::get('/manage/school/school-of-education',['as'=>'showschoolofEducation','uses'=>'CandidateController@showschoolofEducation']);
Route::get('/manage/school/school-of-arts-social-sciences',['as'=>'showschoolofArts','uses'=>'CandidateController@showschoolofArts']);
Route::get('/manage/school/school-of-tourism-natural-resource-mng',['as'=>'showschoolofTourism','uses'=>'CandidateController@showschoolofTourism']);


//Route::get('/manage/candidates/list-qualified-delete{id}',['as'=>'admincandidatedestroy','uses'=>'CandidateController@admincandidatedestroy']);
Route::get('/delete/{id}', 'CandidateController@admincandidatedestroy')->middleware('auth');


//========================================Report=====================================
    Route::get('/report/applicant-list',['as'=>'getApplicantReport','uses'=>'ReportController@getApplicantReport']);
 Route::get('/report/applicant-info',['as'=>'showApplicantInfo','uses'=>'ReportController@showApplicantInfo']);

 Route::get('/report/user-info-chart',['as'=>'getRegisteredUser','uses'=>'ReportController@getRegisteredUser']);



 Route::get('/report/student-info',['as'=>'showStudentInfo','uses'=>'ReportController@showStudentInfo']);
  Route::get('/report/student-multi-class',['as'=>'getStudentListMultiClass','uses'=>'ReportController@getStudentListMultiClass']);
  Route::get('/report/student-info-multi-class',['as'=>'showStudentInfoMultiClass','uses'=>'ReportController@showStudentInfoMultiClass']);

 //===========================================Users=========================================
 Route::get('/applicants/info',['as'=>'userInfo','uses'=>'PersonalController@userInfo']);
Route::prefix('admin')->group(function(){

    Route::get('/login', 'Auth\AdminLoginContoller@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginContoller@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@getAdminHome')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginContoller@logout')->name('admin.logout');

});

//============================ADMISSIONS======================================================
Route::get('/course','CoursesController@index');
Route::post('/course','CoursesController@store');
Route::get('/show-course','CoursesController@show');
Route::get('/admission/{id}', 'CoursesController@addmission')->middleware('auth');
Route::post('/apply/{id}', 'CoursesController@apply')->middleware('auth');
Route::get('/applicants', 'CoursesController@applicants')->middleware('auth');
Route::get('/getpdfexport/{id}', 'CoursesController@getpdfexport')->middleware('auth');

// Route::get('/manage/applicants/show',['as'=>'applicants','uses'=>'CoursesController@applicants'])->middleware('auth');

Route::get('/campus','CampusController@index')->middleware('auth');
Route::post('/campus','CampusController@store')->middleware('auth');







//=============================================================Admin======================================================
Route::get('admin/home', 'AdminDashboardController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin-login.login');
Route::post('admin', 'Admin\LoginController@login');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin-login.password.email');
Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin-login.password.request');
Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin-login.password.reset');
