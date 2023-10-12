<?php

use App\Http\Livewire\Latter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//admin login
Route::get('admin/login',[App\Http\Controllers\AdminController::class,'loginPage'])->name('admin.login');
Route::post('admin/login',[App\Http\Controllers\AdminController::class,'login'])->name('admin.login.s');

//admin logout
Route::get('admin/logout',[App\Http\Controllers\AdminController::class,'logout'])->name('admin.logout');

//user logout
Route::get('user/logout',[App\Http\Controllers\NataController::class,'logout'])->name('logout');

//admin route
Route::group(['middleware'=>'auth:admin'],function (){

    //admin dashboard
    Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class,'AdminDashboard'])->name('admin.dashboard');

    //DG information
    Route::get('admin/DG/info',[App\Http\Controllers\AdminPostController::class,'DGInfo'])->name('dg.info.admin');
    Route::post('admin/DG/info/update',[App\Http\Controllers\AdminPostController::class,'DGInfoUpdate'])->name('dg.info.update');

    //nata slider
    Route::get('nata/slider',[App\Http\Controllers\NataController::class,'slider'])->name('slider');
    Route::post('nata/slider/store',[App\Http\Controllers\NataController::class,'sliderStore'])->name('slider.store');
    Route::get('slider/edit/{id}',[App\Http\Controllers\NataController::class,'sliderEdit'])->name('slider.edit');
    Route::post('slider/update/{id}',[App\Http\Controllers\NataController::class,'sliderUpdate'])->name('slider.update');
    Route::get('slider/delete/{id}',[App\Http\Controllers\NataController::class,'sliderDelete'])->name('slider.delete');

    //course
    Route::get('course/table',[App\Http\Controllers\CourseController::class,'index'])->name('course.index');
    Route::post('course/store',[App\Http\Controllers\CourseController::class,'store'])->name('course.store');
    Route::get('course/edit/{id}',[App\Http\Controllers\CourseController::class,'courseEdit'])->name('course.edit');
    Route::post('course/update/{id}',[App\Http\Controllers\CourseController::class,'courseUpdate'])->name('course.update');
    Route::get('course/delete/{id}',[App\Http\Controllers\CourseController::class,'courseDelete'])->name('course.delete');


//course session
    Route::get('show/session',[App\Http\Controllers\ApplyFormController::class,'showSession'])->name('show.session');
    Route::post('add/session',[App\Http\Controllers\ApplyFormController::class,'SessionAdd'])->name('add.session');

    Route::get('session/edit/{id}',[App\Http\Controllers\ApplyFormController::class,'SessionEdit'])->name('session.edit');
    Route::post('session/update/{id}',[App\Http\Controllers\ApplyFormController::class,'SessionUpdate'])->name('session.update');
    Route::get('session/delete/{id}',[App\Http\Controllers\ApplyFormController::class,'SessionDelete'])->name('session.delete');

    //professional address
    Route::get('pro/division',[App\Http\Controllers\ApplyFormController::class,'ShowProDivision'])->name('pro.div');
    Route::post('pro/division/store',[App\Http\Controllers\ApplyFormController::class,'StoreProDivision'])->name('pro.div.store');
    Route::get('pro/division/edit/{id}',[App\Http\Controllers\ApplyFormController::class,'editProDivision'])->name('pro.div.edit');
    Route::post('pro/division/update/{id}',[App\Http\Controllers\ApplyFormController::class,'updateProDivision'])->name('pro.div.update');
    Route::get('pro/division/delete/{id}',[App\Http\Controllers\ApplyFormController::class,'deleteProDivision'])->name('pro.div.delete');
    Route::get('pro/district',[App\Http\Controllers\ApplyFormController::class,'ShowDistrict'])->name('show.district');
    Route::post('pro/district/store',[App\Http\Controllers\ApplyFormController::class,'StoreDistrict'])->name('store.district');
    Route::get('pro/district/edit/{id}',[App\Http\Controllers\ApplyFormController::class,'editProDistrict'])->name('edit.pro.district');
    Route::post('pro/district/update/{id}',[App\Http\Controllers\ApplyFormController::class,'updateDistrict'])->name('update.pro.district');
    Route::get('pro/district/delete/{id}',[App\Http\Controllers\ApplyFormController::class,'deleteProDistrict'])->name('delete.pro.district');
    Route::get('pro/upozila',[App\Http\Controllers\ApplyFormController::class,'ShowUpozila'])->name('show.upozila');
    Route::get('pro/upozila/select/{id}',[App\Http\Controllers\ApplyFormController::class,'SelectUpozila'])->name('select.upozila');
    Route::post('pro/upozila/store',[App\Http\Controllers\ApplyFormController::class,'StoreUpozila'])->name('store.upozila');
    Route::get('pro/upozila/edit/{id}',[App\Http\Controllers\ApplyFormController::class,'editUpozila'])->name('edit.pro.upozila');
    Route::post('pro/upozila/update/{id}',[App\Http\Controllers\ApplyFormController::class,'updateProUpozila'])->name('update.pro.upozila');
    Route::get('pro/upozila/delete/{id}',[App\Http\Controllers\ApplyFormController::class,'deleteProUpozila'])->name('delete.pro.upozila');
    Route::get('select/pro/district/{id}',[App\Http\Controllers\ApplyFormController::class,'selectDistrict'])->name('select.pro.dis');

    //permanent address
    Route::get('per/division',[App\Http\Controllers\AddressController::class,'viewDivision'])->name('view.division');
    Route::post('per/division/store',[App\Http\Controllers\AddressController::class,'storeDivision'])->name('store.division');
    Route::get('per/division/edit/{id}',[App\Http\Controllers\AddressController::class,'editPerDivision'])->name('edit.per.division');
    Route::post('per/division/update/{id}',[App\Http\Controllers\AddressController::class,'updatePerDivision'])->name('update.per.division');
    Route::get('per/division/delete/{id}',[App\Http\Controllers\AddressController::class,'deletePerDivision'])->name('delete.per.division');

    Route::get('per/district',[App\Http\Controllers\AddressController::class,'viewDistrict'])->name('view.district');
    Route::post('per/district/store',[App\Http\Controllers\AddressController::class,'storePerDistrict'])->name('store.district.add');
    Route::get('per/district/edit/{id}',[App\Http\Controllers\AddressController::class,'perDistrictEdit'])->name('per.district.edit');
    Route::post('per/district/update/{id}',[App\Http\Controllers\AddressController::class,'perDistrictUpdate'])->name('per.district.update');
    Route::get('per/district/delete/{id}',[App\Http\Controllers\AddressController::class,'perDistrictDelete'])->name('per.district.delete');

    //select permanent district
    Route::get('per/district/select/{id}',[App\Http\Controllers\AddressController::class,'perDistrictSelect'])->name('per.district.select');

    //upozila
    Route::get('view/upozila',[App\Http\Controllers\AddressController::class,'viewUpozila'])->name('view.upozila');
    Route::get('select/per/district/{id}',[App\Http\Controllers\AddressController::class,'selectPerDistrict'])->name('select.district');
    Route::post('per/upozila/store',[App\Http\Controllers\AddressController::class,'storePerUpozila'])->name('store.per.upozila');
    Route::get('per/upozila/edit/{id}',[App\Http\Controllers\AddressController::class,'editPerUpozila'])->name('edit.per.upozila');
    Route::post('per/upozila/update/{id}',[App\Http\Controllers\AddressController::class,'updatePerUpozila'])->name('update.per.upozila');
    Route::get('per/upozila/delete/{id}',[App\Http\Controllers\AddressController::class,'deletePerUpozila'])->name('delete.per.upozila');

    //student application view by admin
    Route::get('view/app',[App\Http\Controllers\CourseController::class,'viewTable'])->name('view.table');
    Route::get('status/approve/{id}',[App\Http\Controllers\CourseController::class,'statusApprove'])->name('status.approve');
    Route::get('status/inactive/{id}',[App\Http\Controllers\CourseController::class,'statusInactive'])->name('status.pending');
    Route::get('view/app/details/{id}',[App\Http\Controllers\CourseController::class,'appDetails'])->name('app.detail');

    //Admin posts
    Route::get('add/post',[App\Http\Controllers\PostController::class,'addPost'])->name('add.post');
    Route::post('add/post/store',[App\Http\Controllers\PostController::class,'addPostStore'])->name('store.post');
    Route::get('all/posts',[App\Http\Controllers\AdminPostController::class,'allPosts'])->name('all.post');

    //post edit
    Route::get('edit/post/{id}',[App\Http\Controllers\PostController::class,'editPost'])->name('edit.post');
    Route::post('update/post/{id}',[App\Http\Controllers\PostController::class,'updatePost'])->name('update.post');
    Route::get('delete/post/{id}',[App\Http\Controllers\PostController::class,'deletePost'])->name('delete.post');

    //dormetory
    Route::get('dormatory/room',[App\Http\Controllers\DormatoryController::class,'dormatoryRoom'])->name('dormatory.room');
    Route::get('dormatory/room/check/{id}',[App\Http\Controllers\DormatoryController::class,'dormatoryRoomCheck'])->name('dormatory.room.check');
    Route::post('create/dormatory',[App\Http\Controllers\DormatoryController::class,'createDormatory'])->name('create.dormatory');
    Route::get('dormatory/edit/{id}',[App\Http\Controllers\DormatoryController::class,'editDormatory'])->name('edit.dormatory');
    Route::post('dormatory/update/{id}',[App\Http\Controllers\DormatoryController::class,'updateDormatory'])->name('update.dormatory');
    Route::get('dormatory/delete/{id}',[App\Http\Controllers\DormatoryController::class,'deleteDormatory'])->name('delete.dormatory');
    Route::get('dormatory-room-create',[App\Http\Controllers\DormatoryController::class,'dormatoryWise'])->name('dormatory.wise');
    Route::post('dormatory-room-create',[App\Http\Controllers\DormatoryController::class,'dormatoryWiseRoom'])->name('dormatory.wise.room');



    Route::get('dormatory/room/select/{id}',[App\Http\Controllers\DormatoryController::class,'DorWiseRoomSelect'])->name('grade.wise.select');
    Route::get('grade/create/',[App\Http\Controllers\DormatoryController::class,'GradeCreate'])->name('grade.create');
    Route::post('grade/create/',[App\Http\Controllers\DormatoryController::class,'GradeCreateStore'])->name('grade.create.store');
    Route::get('grade/edit/{id}',[App\Http\Controllers\DormatoryController::class,'GradeCreateEdit'])->name('grade.create.edit');
    Route::post('grade/update/{id}',[App\Http\Controllers\DormatoryController::class,'GradeCreateUpdate'])->name('grade.create.update');
    Route::get('grade/delete/{id}',[App\Http\Controllers\DormatoryController::class,'GradeCreateDelete'])->name('grade.create.delete');

//gender
    Route::get('gender/view',[App\Http\Controllers\DormatoryController::class,'genderView'])->name('gender.view');
    Route::post('gender/create',[App\Http\Controllers\DormatoryController::class,'genderCreate'])->name('gender.create');
    Route::get('gender/edit/{id}',[App\Http\Controllers\DormatoryController::class,'genderEdit'])->name('gender.edit');
    Route::get('select/edit/grade/{id}',[App\Http\Controllers\DormatoryController::class,'SelectGradeEdit'])->name('select.grade.edit');
    Route::post('gender/create/update/{id}',[App\Http\Controllers\DormatoryController::class,'genderUpdate'])->name('gender.update');
    Route::get('gender/create/delete/{id}',[App\Http\Controllers\DormatoryController::class,'genderDelete'])->name('gender.delete');


    Route::get('select/grade/{id}',[App\Http\Controllers\DormatoryController::class,'gradeSelect'])->name('grade.select');
    Route::get('dormatory/grade/select/{id}',[App\Http\Controllers\DormatoryController::class,'DormatoryGradeSelect'])->name('dormatory.grade.select');
    Route::get('dormatory/gender/select/{id}',[App\Http\Controllers\DormatoryController::class,'DormatoryGenderSelect'])->name('dormatory.gender.select');

//room assign
    Route::get('room/assign',[App\Http\Controllers\DormatoryController::class,'roomAssign'])->name('room.assign');
    Route::get('dormatory/grade/load/{id}',[App\Http\Controllers\DormatoryController::class,'gradeLoad'])->name('grade.load');
    Route::get('dormatory/gender/load/{id}',[App\Http\Controllers\DormatoryController::class,'genderLoad'])->name('gender.load');
    Route::get('dormatory/room/load/{id}',[App\Http\Controllers\DormatoryController::class,'roomLoad'])->name('room.load');
    Route::get('dormatory/room/edit/{id}',[App\Http\Controllers\DormatoryController::class,'roomEdit'])->name('dormatory.room.edit');
    Route::post('dormatory/room/update/{id}',[App\Http\Controllers\DormatoryController::class,'roomUpdate'])->name('dormatory.room.update');
    Route::get('select/edit/dormatory-grade/{id}',[App\Http\Controllers\DormatoryController::class,'selectDormatoryGrade'])->name('dormatory.grade.select');
    Route::get('select/edit/dormatory-gender/{id}',[App\Http\Controllers\DormatoryController::class,'selectDormatoryGender'])->name('dormatory.gender.select');

    //room select
    Route::post('room/select',[App\Http\Controllers\DormatoryController::class,'roomNoSet'])->name('room.set');

    //room delete
    Route::get('room/delete/{id}',[App\Http\Controllers\DormatoryController::class,'roomDelete'])->name('room.delete');
    //room assign delete
    Route::get('room/assign/delete/{id}',[App\Http\Controllers\DormatoryController::class,'deleteRoomAssign'])->name('room.assign.delete');
    //certificate
    Route::get('certificate/view/{id}',[App\Http\Controllers\CertificateController::class,'certificateView'])->name('certificate.view');
    Route::get('session/wise/view',[App\Http\Controllers\CertificateController::class,'sessionWiseView'])->name('session.wise.view');


    //batch status
    Route::get('batch/status/inactive/{id}',[App\Http\Controllers\OtherController::class,'StatusInactive'])->name('status.inactive');
    Route::get('batch/status/active/{id}',[App\Http\Controllers\OtherController::class,'StatusActive'])->name('status.active');

    //student application edit
    Route::get('edit/student/{id}',[App\Http\Controllers\OtherController::class,'editStudent'])->name('edit.student');
    Route::get('edit/session/get/{id}',[App\Http\Controllers\OtherController::class,'SelectSessionEdit'])->name('select.session.edit');
    Route::get('pro/district/select/edit/{id}',[App\Http\Controllers\OtherController::class,'proDistrictEdit'])->name('pro.district.select');
    Route::get('pro/upozila/select/edit/{id}',[App\Http\Controllers\OtherController::class,'proUpozilatEdit'])->name('pro.upozila.select');
    Route::get('per/select/district/edit/{id}',[App\Http\Controllers\OtherController::class,'perDistrictEdit'])->name('per.district.select');
    Route::get('per/select/upozila/edit/{id}',[App\Http\Controllers\OtherController::class,'perUpozilaEdit'])->name('per.upozila.select');
    //Application update and delete
    Route::post('apply-form-update/{id}',[App\Http\Controllers\OtherController::class,'applyUpdate'])->name('apply.update');
    Route::get('apply-form-delete/{id}',[App\Http\Controllers\OtherController::class,'applyDelete'])->name('apply.delete');
    //syllabus
    Route::get('syllabus/view',[App\Http\Controllers\DocumentController::class,'syllabus'])->name('view.syllabus');
    Route::post('syllabus/store',[App\Http\Controllers\DocumentController::class,'syllabusStore'])->name('store.syllabus');
    Route::get('syllabus/edit/{id}',[App\Http\Controllers\DocumentController::class,'syllabusEdit'])->name('edit.syllabus');
    Route::post('syllabus/update/{id}',[App\Http\Controllers\DocumentController::class,'syllabusUpdate'])->name('update.syllabus');
    //latter
    Route::get('release/latter/{id}',[App\Http\Controllers\CertificateController::class,'releaseLatter'])->name('release.latter');
    //document edit
    Route::get('edit/session/select/{id}',[App\Http\Controllers\DocumentController::class,'editSessionSelect'])->name('edit.session.select');
    //document edit session select
    Route::get('session/select/{id}',[App\Http\Controllers\DocumentController::class,'sessionSelect'])->name('session.select');
    //admin user_role
    Route::get('admin/user/role',[App\Http\Controllers\AdminUserController::class,'adminUser'])->name('admin.user.role');
    Route::get('add/admin/user/role',[App\Http\Controllers\AdminUserController::class,'addAdminUser'])->name('add.user.role');
    Route::post('store/admin/user/role',[App\Http\Controllers\AdminUserController::class,'storeAdminUser'])->name('store.user.role');
    //admin profile
    Route::get('admin/profile',[App\Http\Controllers\AdminUserController::class,'adminProfile'])->name('admin.profile');
    Route::get('admin/profile/edit',[App\Http\Controllers\AdminUserController::class,'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('admin/profile/update',[App\Http\Controllers\AdminUserController::class,'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('show/change/password',[App\Http\Controllers\AdminUserController::class,'showChangePassword'])->name('show.change.pass');
    Route::post('admin/change/password',[App\Http\Controllers\AdminUserController::class,'adminChangePassword'])->name('admin.change.pass');
    //batch load
    Route::get('batch/load/{id}',[App\Http\Controllers\AdminPostController::class,'batchLoad'])->name('batch.load');
    //sequence
    Route::get('release/view/{id}',[App\Http\Controllers\CertificateController::class,'releaseView'])->name('release.view');
    Route::post('Custom-sortable',[App\Http\Controllers\CertificateController::class,'update']);
    //excel export
    Route::get('excel/export',[App\Http\Controllers\ExcelController::class,'exportExcel'])->name('excel.export');


});



//frontend route
Route::group(['middleware'=>'auth'],function (){

    //apply
    Route::get('instruction',[App\Http\Controllers\NataController::class,'ShowIns'])->name('show.ins');
    Route::get('form/apply',[App\Http\Controllers\NataController::class,'ApplyForm'])->name('apply.form');
    Route::post('Apply/form',[App\Http\Controllers\CourseController::class,'applyStore'])->name('apply.store');
    //registration
    Route::get('front/reg/page',[App\Http\Controllers\CourseController::class,'frontView'])->name('front.view');
    Route::get('without/info',[App\Http\Controllers\CourseController::class,'WithoutInfo'])->name('info.without');
    //load district and upozila
    Route::get('pro/district/select/{id}',[App\Http\Controllers\AddressController::class,'districtSelect'])->name('select.district');
    Route::get('pro/upozila/select/{id}',[App\Http\Controllers\AddressController::class,'upozilaSelect'])->name('select.upozila');

    //frontend
    Route::get('per/select/district/{id}',[App\Http\Controllers\NataController::class,'selectPerDistrict'])->name('select.district');
    Route::get('per/select/upozila/{id}',[App\Http\Controllers\NataController::class,'selectUpozila'])->name('select.upozila');

    //frontend load
    Route::get('show/location',[App\Http\Controllers\PostController::class,'showLocation'])->name('show.location');
    Route::get('show/background',[App\Http\Controllers\PostController::class,'showBackground'])->name('show.background');
    Route::get('show/vision',[App\Http\Controllers\PostController::class,'showVision'])->name('show.vision');
    Route::get('show/organogram',[App\Http\Controllers\PostController::class,'showOrganogram'])->name('show.organogram');
    Route::get('show/stackholder',[App\Http\Controllers\PostController::class,'showStackholder'])->name('show.stackholder');
    Route::get('show/core/function',[App\Http\Controllers\PostController::class,'coreFunction'])->name('core.function');
    Route::get('show/core/value',[App\Http\Controllers\PostController::class,'coreValue'])->name('core.value');
    Route::get('current/activities',[App\Http\Controllers\PostController::class,'activities'])->name('show.activity');
    Route::get('show/physical',[App\Http\Controllers\PostController::class,'showPhysical'])->name('show.physical');
    Route::get('show/statistic',[App\Http\Controllers\PostController::class,'showStatistic'])->name('show.statistic');
    Route::get('importance/training',[App\Http\Controllers\PostController::class,'importanceTraining'])->name('importance.training');
    Route::get('resourse/personnel',[App\Http\Controllers\PostController::class,'resoursePersonnel'])->name('resourse.personnel');
    Route::get('strenghtening',[App\Http\Controllers\PostController::class,'strenghtening'])->name('strenghtening');
    Route::get('training/method',[App\Http\Controllers\PostController::class,'trainingMethods'])->name('training.methods');
    Route::get('show/notice',[App\Http\Controllers\PostController::class,'showNotice'])->name('show.notice');
    Route::get('single/notice/{id}',[App\Http\Controllers\PostController::class,'singleNotice'])->name('single.notice');

    //syllabus
    Route::get('all-syllabus',[App\Http\Controllers\DocumentController::class,'allSyllabus'])->name('all.syllabus');
    Route::get('download-syllabus/{file}',[App\Http\Controllers\DocumentController::class,'downloadSyllabus'])->name('download.syllabus');
    Route::get('document-single/{id}',[App\Http\Controllers\DocumentController::class,'documentSingle'])->name('document.single');
    Route::get('document-delete/{id}',[App\Http\Controllers\DocumentController::class,'documentDelete'])->name('document.delete');

    //user pannel
    Route::get('user/profile',[App\Http\Controllers\UserController::class,'userProfile'])->name('user.profile');
    Route::post('user/profile/update',[App\Http\Controllers\UserController::class,'userProfileUpdate'])->name('user.profile.update');
    //change password
    Route::get('change/pass/view',[App\Http\Controllers\UserController::class,'changePassView'])->name('change.pass.view');
    Route::post('change/pass',[App\Http\Controllers\UserController::class,'changePass'])->name('change.pass');
    Route::get('user/apply',[App\Http\Controllers\UserController::class,'userApply'])->name('user.apply');
    Route::get('user/apply/single/view/{id}',[App\Http\Controllers\UserController::class,'userApplySingle'])->name('user.apply.single');
    //applicant pannel certificate download
    Route::get('user/certificate',[App\Http\Controllers\ApplicantPanelController::class,'userCertificate'])->name('user.certificate');
    Route::get('user/certificate/download/{id}',[App\Http\Controllers\ApplicantPanelController::class,'userCertificateDownload'])->name('user.certificate.download');
    Route::get('user/letter/download/{id}',[App\Http\Controllers\ApplicantPanelController::class,'userLetterDownload'])->name('user.letter.download');
    Route::get('session/get/{id}',[App\Http\Controllers\ApplyFormController::class,'SessionGet'])->name('sess.get');
    Route::get('user/applicant',[App\Http\Controllers\UserController::class,'userApplicant'])->name('user.applicant');
    // DG page
    Route::get('dg/info',[App\Http\Controllers\UserController::class,'dgInfo'])->name('dg.info');

});



