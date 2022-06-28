<?php

use App\Http\Controllers\ManualController;
use App\Http\Controllers\ReportController;
use Database\Seeders\CountrySeeder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DayController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RenewController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\HostingController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\EarnLeaveController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\WeeklyOffController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BloodGroupController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NameServerController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\Domain\DomainController;
use App\Http\Controllers\LeaveCategoryController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\AcademicResultController;
use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\Domain\CustomerController;
use App\Http\Controllers\EmployeeAddressController;
use App\Http\Controllers\AttendanceStatusController;
use App\Http\Controllers\EmployeeAcademicController;
use App\Http\Controllers\EmployeeTrainingController;
use App\Http\Controllers\EmployeeExperienceController;
use App\Http\Controllers\CommunicationSettingController;
use App\Http\Controllers\Domain\DomainHostingController;
use App\Http\Controllers\Domain\CustomerDomainController;
use App\Http\Controllers\Domain\CustomerHostingController;
use App\Http\Controllers\ProfessionalCertificateController;

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

Route::get('/',[HomeController::class,'dashboard'])->name('home');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // Attendance Route
    Route::resource('attendance',AttendanceController::class);
    //Route for domain-hosting starts here
    Route::get('domain-hosting',[DomainHostingController::class,'index'])->name('domain-hosting');
    //route for provider
    Route::resource('provider',ProviderController::class);
    //route for domain
    Route::resource('domain',DomainController::class);
    //route for hosting
    Route::resource('hosting',HostingController::class);
    //route for customer
    Route::resource('customer',CustomerController::class);
    //route for customer search
    Route::post('customer-search',[CustomerController::class,'search'])->name('customer.search');
    //route for customer hosting
    Route::resource('customer-hosting',CustomerHostingController::class);
    Route::put('customer-hosting/check-status/{id}',[CustomerHostingController::class,'status']);
    //route for customer domain
    Route::resource('customer-domain',CustomerDomainController::class);
    Route::put('customer-domain/check-status/{id}',[CustomerDomainController::class,'status']);
    //route for name server
    Route::resource('name-server',NameServerController::class);
    Route::put('name-server/check-status/{id}',[NameServerController::class,'status']);
    //route for renews
    Route::resource('renew',RenewController::class);
    //Route for domain-hosting ends here

    //route for religion
    Route::resource('religion',ReligionController::class);
    Route::put('religion/check-status/{id}',[ReligionController::class,'status']);
    //route for blood group
    Route::resource('blood-group',BloodGroupController::class);
    Route::put('blood-group/check-status/{id}',[BloodGroupController::class,'status']);
    //route for marital status
    Route::resource('marital-status',MaritalStatusController::class);
    Route::put('marital-status/check-status/{id}',[MaritalStatusController::class,'status']);
    //route for gender
    Route::resource('gender',GenderController::class);
    Route::put('gender/check-status/{id}',[GenderController::class,'status']);
    //route for days
    Route::resource('day',DayController::class);
    //route for weekly off
    Route::resource('weekly-off',WeeklyOffController::class);
    //route for department
    Route::resource('department',DepartmentController::class);
    Route::put('department/check-status/{id}',[DepartmentController::class,'status']);
    //route for status
    Route::resource('status',StatusController::class);
    Route::put('status/check-status/{id}',[StatusController::class,'status']);

    //route for employee management starts here
    Route::resource('employee',EmployeeController::class);
    //route for professional certificate
    Route::resource('professional-certificate',ProfessionalCertificateController::class);
    //route for employee experience
    Route::resource('employee-experience',EmployeeExperienceController::class);
    //route for cards
    Route::resource('card',CardController::class);
    Route::put('card/check-status/{id}',[CardController::class,'status']);
    //route for education
    Route::resource('education',EducationController::class);
    Route::put('education/check-status/{id}',[EducationController::class,'status']);
    //route for academic results
    Route::resource('academic-result',AcademicResultController::class);
    Route::put('academic-result/check-status/{id}',[AcademicResultController::class,'status']);
    //route for employee academics
    Route::resource('employee-academic',EmployeeAcademicController::class);
    //route for employee trainings
    Route::resource('employee-training',EmployeeTrainingController::class);
    //route for employee addresses
    Route::resource('employee-address',EmployeeAddressController::class);

    //Route for office setup starts here
    //route for shift
    Route::resource('shift',ShiftController::class);
    //route for designation
    Route::resource('designation',DesignationController::class);
    Route::put('designation/check-status/{id}',[DesignationController::class,'status']);
    //route for calender
    Route::resource('calendar',CalenderController::class);
    Route::put('calendar/check-status/{id}',[CalenderController::class,'status']);
    //route for calender events
    Route::resource('calendar-event',CalendarEventController::class);
    Route::put('calendar-event/is-holiday/{id}',[CalendarEventController::class,'isHoliday']);
    Route::put('calendar-event/sms/{id}',[CalendarEventController::class,'sms']);
    Route::put('calendar-event/email/{id}',[CalendarEventController::class,'email']);
    Route::put('calendar-event/is-active/{id}',[CalendarEventController::class,'status']);

    //route for leave management starts here
    Route::resource('leave-category',LeaveCategoryController::class);
    Route::put('leave-category/status/{id}',[LeaveCategoryController::class,'status']);
    //route for leaves
    Route::resource('leave',LeaveController::class);
    //route for earn leaves
    Route::resource('earn-leave',EarnLeaveController::class);

    //Route for accounts starts here
    Route::get('coa',[ChartOfAccountController::class,'index'])->name('coa.index');
    Route::get('coa/create',[ChartOfAccountController::class,'create'])->name('coa.create');
    Route::post('coa/store',[ChartOfAccountController::class,'store'])->name('coa.store');
    Route::get('coa/edit/{id}',[ChartOfAccountController::class,'edit'])->name('coa.edit');
    Route::patch('coa/update/{id}',[ChartOfAccountController::class,'update'])->name('coa.update');
    Route::delete('coa/destroy/{id}',[ChartOfAccountController::class,'destroy'])->name('coa.destroy');
    Route::post('coa/status',[ChartOfAccountController::class,'isEnabled'])->name('coa.isEnabled');
    Route::post('coa',[ChartOfAccountController::class,'list'])->name('coa.list');

    // journal routes starts here
    Route::resource('journals', JournalController::class)->middleware('auth');
    Route::get('journal/classic',[JournalController::class,'classic'])->name('journals.classic');
    Route::get('cash-book',[AccountingController::class],'cashBook')->name('accounts.cash-book');
    Route::post('cash-book-settings',[AccountingController::class,'cashBookSetting'])->name('accounts.cashBookSetting');
    Route::get('ledger',[AccountingController::class,'ledger'])->name('accounts.ledger');
    Route::get('trial-balance',[AccountingController::class,'trialBalance'])->name('accounts.trialBalance');
    Route::get('profit-n-loss',[AccountingController::class,'profitNLoss'])->name('accounts.profitNLoss');
    Route::get('balance-sheet',[AccountingController::class,'balanceSheet'])->name('accounts.balanceSheet');
    // journal routes ends here

    //Playlist routes starts here
    Route::get('playlists',[PlaylistController::class,'index'])->name('playlists.index');
    Route::post('playlist/store',[PlaylistController::class,'store'])->name('playlists.store');
    Route::get('playlist/show/{id}',[PlaylistController::class,'show'])->name('playlists.show');
    Route::delete('playlist/destroy/{id}',[PlaylistController::class,'destroy'])->name('playlists.destroy');
    //Playlist routes Ends here

    //Communication Routes starts here
    Route::get('communication/quick',[CommunicationController::class,'quick'])->name('communication.quick');
    Route::get('communication/student',[CommunicationController::class,'student'])->name('communication.student');
    Route::get('communication/staff',[CommunicationController::class,'staff'])->name('communication.staff');
    Route::get('communication/history',[CommunicationController::class,'history'])->name('communication.history');

    Route::post('communication/send',[CommunicationController::class,'send']);
    Route::post('communication/quick/send',[CommunicationController::class,'quickSend']);
    //End Communication Route

    // Manual In/Out
    Route::post('manual-in/search',[ManualController::class,'searchIn'])->name('searchIn');
    Route::post('manual-in/store',[ManualController::class,'storeIn'])->name('storeIn');
    Route::get('manual-in',[ManualController::class,'manualIn'])->name('manualIn');

    Route::post('manual-out/search',[ManualController::class,'searchOut'])->name('searchOut');
    Route::post('manual-out/store',[ManualController::class,'storeOut'])->name('storeOut');
    Route::get('manual-out',[ManualController::class,'manualOut'])->name('manualOut');
    // Manual In/Out

    //route for api setting starts here
    Route::get('communication/apiSetting',[CommunicationSettingController::class,'index'])->name('communication.apiSetting');
    Route::patch('communication/apiSetting/update',[CommunicationSettingController::class,'update'])->name('apiSetting.update');
    //route for api setting ends here

    //route for leave management starts here
    Route::resource('attendance-status',AttendanceStatusController::class);
    Route::put('attendance-status/status/{id}',[AttendanceStatusController::class,'status']);

    /*roles Start*/
    Route::get("/role",[RoleController::class,'index'])->name("role");
    Route::post("/role-insert",[RoleController::class,'store'])->name('role.store');
    Route::get("/role-edit/{id}",[RoleController::class,'edit'])->name('role.edit');
    Route::put("/role-update/{id}",[RoleController::class,'update'])->name('role.update');
    Route::delete("/role-delete/{id}",[RoleController::class,'destroy'])->name('role.destroy');
    /*roles End*/


    Route::controller(ReportController::class)->group(function() {
        Route::get('monthlyreport', 'get_monthlyview')->name('monthlyreport');
        Route::post('getmonthdata', 'get_monthdata')->name('get_monthdata');
        Route::get('monthlypdf', 'get_monthlypdf')->name('monthlypdf');
        /* ajex call for emp id */
        Route::get('getemp_id','getemp_id')->name('getemp_id');



        Route::get('dailyintimereport','get_dailyintimeview')->name('dailyintimereport');
        Route::post('dailyintimedata','get_dailyintimedata')->name('get_dailyintimedata');
        Route::get('dailyintimepdf','get_dailyintimepdf')->name('dailyintimepdf');
    });

});

Route::get('migrate',function(){
    Artisan::call('migrate');
});

Route::get('migrate-fresh',function(){
    Artisan::call('migrate:fresh --seed');
});

Route::get('optimize',function(){
    Artisan::call('optimize');
    Artisan::call('optimize:clear');
    dd('done');
});

Route::get('seed',function(){
    Artisan::call('db:seed', [
        '--class' => CountrySeeder::class
    ]);
});

Route::get('rollback',function(){
    Artisan::call('migrate:rollback --step=4');
});

