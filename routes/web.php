<?php

use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

// Route::get('/ViewProject',function (){
//     return view('supervisor.index');
// });



/* TESTING */
    /* STUDENT --------------------------------------- */
    Route::get('/Project/Query', [App\Http\Controllers\Controller::class, 'GetProject_student']);
    Route::post('/titleConfirmationstudent/{project_id}', [App\Http\Controllers\ProjectController::class, 'titleConfirmationstudent'])->name('titleConfirmationstudent');


    //chapter
    Route::get('/Project/{project_id}/Chapter/{chapter_id}/student',[App\Http\Controllers\Controller::class, 'Chapter_student']);

    Route::post('/fileSubmition/{chapter_id}/{project_id}', [App\Http\Controllers\ChapterController::class, 'fileSubmition'])->name('fileSubmition');
    Route::post('/UpdateStatementStudent/{chapter_id}', [App\Http\Controllers\ChapterController::class, 'UpdateStatementStudent'])->name('UpdateStatementStudent');

    //task
    Route::get('/Project/{project_id}/Chapter/{chapter_id}/Task/{task_id}/student',[App\Http\Controllers\Controller::class, 'ChapterTask_student'])->name('ChapterTask');

    Route::post('/fileSubmitiontask/{task_id}', [App\Http\Controllers\TaskController::class, 'fileSubmition'])->name('fileSubmitiontask');

    Route::post('/UpdateStatementTaskStudent/{task_id}',
    [App\Http\Controllers\TaskController::class, 'UpdateStatementTaskStudent'])
    ->name('UpdateStatementTaskStudent');
/* END TESTING */
//testing

/* TESTING */
    /* SUPERVISOR ---------------------------------- */
    Route::post('/updatecheckbox/{project_id}', [App\Http\Controllers\ProjectController::class, 'titleConfirmation'])->name('updatecheckbox');

    Route::post('/addtask/{chapter_id}', [App\Http\Controllers\TaskController::class, 'addtask'])->name('addTask');


Route::post('/addtask/{chapter_id}', [App\Http\Controllers\TaskController::class, 'addTask'])->name('addtask');


    Route::get('/ProjectQuery/{project_id}', [App\Http\Controllers\Controller::class, 'GetProject'])->name('GetProject');
    Route::get('/GetAllProject', [App\Http\Controllers\ProjectController::class, 'GetAllProject'])->name('GetAllProject');

    //chapter
    Route::get('/Project/{project_id}/Chapter/{chapter_id}', [App\Http\Controllers\Controller::class, 'Chapter']);
    Route::post('/progressinput/{chapter_id}',[App\Http\Controllers\ChapterController::class, 'progressinput'])->name('progressinput');

    Route::post('/UpdateStatement/{chapter_id}', [App\Http\Controllers\ChapterController::class, 'UpdateStatement'])->name('UpdateStatement');

    //task
    Route::get('/Project/{project_id}/Chapter/{chapter_id}/Task/{task_id}',[App\Http\Controllers\Controller::class, 'ChapterTask'])->name('ChapterTask');
    Route::post('/progressinputtask/{task_id}',[App\Http\Controllers\TaskController::class, 'progressinputtask'])->name('progressinputtask');
    Route::post('/UpdateStatementTask/{task_id}', [App\Http\Controllers\TaskController::class, 'UpdateStatementTask'])->name('UpdateStatementTask');


    /* ADMIN ------------------------------------------ */
    // supervisor add, role edit, and link student to supervisor
    Route::get('/admin', [App\Http\Controllers\UserController::class, 'admin']);
    Route::get('/users', [App\Http\Controllers\UserController::class, 'users']);
    Route::get('/departments', [App\Http\Controllers\UserController::class, 'departments']);
    //Route::get('/link_student_supervisor', [App\Http\Controllers\UserController::class, 'link_student_supervisor'])->name('link_student_supervisor');
    Route::get('/user/{user_id}', [App\Http\Controllers\UserController::class, 'get_user'])->name('get_user');
    Route::post('/UpdateUsers', [App\Http\Controllers\ProjectController::class, 'UpdateUsers'])->name('UpdateUsers');


    Route::get('/department/{department_id}', [App\Http\Controllers\ChapterController::class, 'chapterCreateUpdate'])->name('chapterCreateUpdate');

    Route::post('/add_department',
    [App\Http\Controllers\DepartmentController::class, 'add_department'])
    ->name('add_department');

    Route::match(['post', 'put'], '/ChapterForm/{department_id}',
    [App\Http\Controllers\ChapterController::class, 'ChapterForm'])->name('ChapterForm');

    Route::post('/form_create_chapt_er_details', [App\Http\Controllers\ChapterController::class, 'form_create_chapt_er_details'])->name('form_create_chapt_er_details');
    Route::get('/get-department-options', [App\Http\Controllers\DepartmentController::class, 'getOptions']);
    Route::get('/get-options', [App\Http\Controllers\Controller::class, 'getOptions']);


/* END TESTING */

/*
Route::group(['middleware' => ['auth', 'student']], function () {
    // STUDENT ---------------------------------------
    Route::get('/Project/Query', [App\Http\Controllers\Controller::class, 'GetProject_student'])->name('GetProject_student');
    //chapter
    Route::get('/Project/{project_id}/Chapter/{chapter_id}/student', [App\Http\Controllers\Controller::class, 'Chapter_student']);

    Route::post('/fileSubmition/{chapter_id}/{project_id}', [App\Http\Controllers\ChapterController::class, 'fileSubmition'])->name('fileSubmition');

    Route::post('/UpdateStatementStudent/{chapter_id}', [App\Http\Controllers\ChapterController::class, 'UpdateStatementStudent'])->name('UpdateStatementStudent');

    //task
    Route::get('/Project/{project_id}/Chapter/{chapter_id}/Task/{task_id}/student',[App\Http\Controllers\Controller::class, 'ChapterTask_student'])->name('ChapterTask');
    Route::post('/fileSubmitiontask/{task_id}', [App\Http\Controllers\TaskController::class, 'fileSubmition'])->name('fileSubmitiontask');
    Route::post('/UpdateStatementTaskStudent/{task_id}', [App\Http\Controllers\TaskController::class, 'UpdateStatementTask'])->name('UpdateStatementTask');


});


Route::group(['middleware' => ['auth', 'supervisor', 'admin']], function () {
    // SUPERVISOR ----------------------------------
    Route::post('/updatecheckbox/{project_id}', [App\Http\Controllers\ProjectController::class, 'titleConfirmation'])->name('updatecheckbox');
    Route::post('/addtask/{chapter_id}', [App\Http\Controllers\TaskController::class, 'addtask'])->name('addtask');
    Route::get('/ProjectQuery/{project_id}', [App\Http\Controllers\Controller::class, 'GetProject'])->name('GetProject');
    Route::get('/GetAllProject', [App\Http\Controllers\ProjectController::class, 'GetAllProject']);

    //chapter
    Route::get('/Project/{project_id}/Chapter/{chapter_id}', [App\Http\Controllers\Controller::class, 'Chapter']);
    Route::post('/progressinput/{chapter_id}',[App\Http\Controllers\ChapterController::class, 'progressinput'])->name('progressinput');
    Route::post('/UpdateStatement/{chapter_id}', [App\Http\Controllers\ChapterController::class, 'UpdateStatement'])->name('UpdateStatement');

    //task
    Route::get('/Project/{project_id}/Chapter/{chapter_id}/Task/{task_id}',[App\Http\Controllers\Controller::class, 'ChapterTask'])->name('ChapterTask');
    Route::post('/progressinputtask/{task_id}',[App\Http\Controllers\TaskController::class, 'progressinputtask'])->name('progressinputtask');
    Route::post('/UpdateStatementTask/{task_id}', [App\Http\Controllers\TaskController::class, 'UpdateStatementTask'])->name('UpdateStatementTask');


    // ADMIN ------------------------------------------
    // supervisor add, role edit, and link student to supervisor
    Route::get('/admin', [App\Http\Controllers\UserController::class, 'admin']);
    Route::get('/users', [App\Http\Controllers\UserController::class, 'users']);
    Route::get('/departments', [App\Http\Controllers\UserController::class, 'departments']);
    //Route::get('/link_student_supervisor', [App\Http\Controllers\UserController::class, 'link_student_supervisor'])->name('link_student_supervisor');
    Route::get('/user/{user_id}', [App\Http\Controllers\UserController::class, 'get_user'])->name('get_user');
    Route::post('/UpdateUsers', [App\Http\Controllers\ProjectController::class, 'UpdateUsers'])->name('UpdateUsers');


    Route::get('/department/{department_id}', [App\Http\Controllers\ChapterController::class, 'chapterCreateUpdate'])->name('chapterCreateUpdate');
    Route::post('/add_department',[App\Http\Controllers\DepartmentController::class, 'add_department'])->name('add_department');

    Route::match(['post', 'put'], '/ChapterForm/{department_id}',
                [App\Http\Controllers\ChapterController::class, 'chapterForm']
                )->name('ChapterForm');

    Route::post('/form_create_chapt_er_details', [App\Http\Controllers\ChapterController::class, 'form_create_chapt_er_details'])->name('form_create_chapt_er_details');

});

Route::group(['middleware' => ['auth', 'supervisor']], function () {
    // SUPERVISOR ----------------------------------
    Route::post('/updatecheckbox/{project_id}', [App\Http\Controllers\ProjectController::class, 'titleConfirmation'])->name('updatecheckbox');
    Route::post('/addtask/{chapter_id}', [App\Http\Controllers\TaskController::class, 'addtask'])->name('addtask');
    Route::get('/ProjectQuery/{project_id}', [App\Http\Controllers\Controller::class, 'GetProject'])->name('GetProject');
    Route::get('/GetAllProject', [App\Http\Controllers\ProjectController::class, 'GetAllProject'])->name('GetAllProject');

    //chapter
    Route::get('/Project/{project_id}/Chapter/{chapter_id}', [App\Http\Controllers\Controller::class, 'Chapter']);
    Route::post('/progressinput/{chapter_id}',[App\Http\Controllers\ChapterController::class, 'progressinput'])->name('progressinput');
    Route::post('/UpdateStatement/{chapter_id}', [App\Http\Controllers\ChapterController::class, 'UpdateStatement'])->name('UpdateStatement');

    //task
    Route::get('/Project/{project_id}/Chapter/{chapter_id}/Task/{task_id}',[App\Http\Controllers\Controller::class, 'ChapterTask'])->name('ChapterTask');
    Route::post('/progressinputtask/{task_id}',[App\Http\Controllers\TaskController::class, 'progressinputtask'])->name('progressinputtask');
    Route::post('/UpdateStatementTask/{task_id}', [App\Http\Controllers\TaskController::class, 'UpdateStatementTask'])->name('UpdateStatementTask');


});

Route::group(['middleware' => ['auth', 'admin']], function () {
    // ADMIN ------------------------------------------
    // supervisor add, role edit, and link student to supervisor
    Route::get('/admin', [App\Http\Controllers\UserController::class, 'admin']);
    Route::get('/users', [App\Http\Controllers\UserController::class, 'users']);
    Route::get('/departments', [App\Http\Controllers\UserController::class, 'departments']);
    //Route::get('/link_student_supervisor', [App\Http\Controllers\UserController::class, 'link_student_supervisor'])->name('link_student_supervisor');
    Route::get('/user/{user_id}', [App\Http\Controllers\UserController::class, 'get_user'])->name('get_user');
    Route::post('/UpdateUsers', [App\Http\Controllers\ProjectController::class, 'UpdateUsers'])->name('UpdateUsers');


    Route::get('/department/{department_id}', [App\Http\Controllers\ChapterController::class, 'chapterCreateUpdate'])->name('chapterCreateUpdate');
    Route::post('/add_department',[App\Http\Controllers\DepartmentController::class, 'add_department'])->name('add_department');
    Route::match(['post', 'put'], '/ChapterForm/{department_id}', [App\Http\Controllers\ChapterController::class, 'ChapterForm'])->name('ChapterForm');
    Route::post('/form_create_chapt_er_details', [App\Http\Controllers\ChapterController::class, 'form_create_chapt_er_details'])->name('form_create_chapt_er_details');
    Route::get('/get-department-options', [App\Http\Controllers\DepartmentController::class, 'getOptions']);
    Route::get('/get-options', [App\Http\Controllers\Controller::class, 'getOptions']);


});

 */



Route::get('/download-zip/{project_id}', [App\Http\Controllers\ZipController::class,'download'])->name('download-zip');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');








