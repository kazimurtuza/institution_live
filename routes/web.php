<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Courses;
use App\Livewire\Admin\NewCourse;
use App\Livewire\Admin\Category;
use App\Livewire\Admin\AddCategory;
use App\Livewire\Admin\Subjects;
use App\Livewire\Admin\AddSubjects;
use App\Livewire\Admin\Instructors;
use App\Livewire\Admin\AddInstructors;
use App\Livewire\Admin\AddQuestion;
use App\Livewire\Admin\CreateQuestionPaper;
use App\Livewire\Admin\QuestionList;
use App\Livewire\Admin\CustomerSubscriptions;
use App\Livewire\Admin\CatrgoryUpdate;
use App\Livewire\Admin\SubjectUpdate;
use App\Livewire\Admin\InstructorUpdate;
use App\Livewire\Admin\TestimonialAdd;
use App\Livewire\Admin\Testimonials;
use App\Livewire\Admin\TestimonialUpdate;
use App\Livewire\Admin\ContactInfo;
use App\Livewire\Admin\FinancialReports;
use App\Livewire\Admin\UpdateCourse;

use App\Livewire\Admin\FaqCategoryUpdate;
use App\Livewire\Admin\FaqCategoryAdd;
use App\Livewire\Admin\FaqCategory;

use App\Livewire\Admin\QuestionPaperListUpdate;
use App\Livewire\Admin\QuestionListUpdate;

use App\Livewire\Admin\FaqComponents;
use App\Livewire\Admin\FaqComponentAdd;
use App\Livewire\Admin\FaqComponentUpdate;

use App\Livewire\Admin\Settings;
use App\Livewire\Admin\ContactPage;
use App\Livewire\Admin\AboutPage;
use App\Livewire\Admin\CoursePage;
use App\Livewire\Admin\FaqPage;
use App\Livewire\Admin\Homepage as AdminHomePage;
use App\Livewire\Admin\PolicyPage;
use App\Livewire\Admin\TermPage;

use App\Livewire\Admin\KeyFeaturesAdd;
use App\Livewire\Admin\KeyFeatures;
use App\Livewire\Admin\ContactDetails;
use App\Livewire\Admin\EditQuestions;
use App\Livewire\Admin\CourseOffers;






use App\Http\Controllers\Frontend\Courses as FrontendCourses;
use App\Http\Controllers\Frontend\OnlineTest;
use App\Http\Controllers\Frontend\Faq;
use App\Http\Controllers\Frontend\StripeController;
use App\Http\Controllers\Frontend\UserPanel;
use App\Http\Controllers\Frontend\HomePage;


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

//Route::get('/', function () {
//    return view('welcome');
//});
// Route::get('/', function () {
//     return redirect(route('login'));
// });

Route::get('/', [HomePage::class, 'index'])->name('home.page');
Route::get('/contact', [HomePage::class, 'contact_page'])->name('contact_page.page');
Route::get('/about_us', [HomePage::class, 'about_us'])->name('about_us.page');
Route::post('/post_contact', [HomePage::class, 'post_contact'])->name('post_contact.page');
Route::get('/privecy-policy', [HomePage::class, 'privecy_policy'])->name('privecy_policy.page');
Route::get('/term-condition', [HomePage::class, 'term_condition'])->name('term_condition.page');
Route::get('/user_block/{user_id}', [HomePage::class, 'user_block'])->name('user_block');
Route::get('/user_unblock/{user_id}', [HomePage::class, 'user_unblock'])->name('user_unblock');


Route::controller(FrontendCourses::class)->prefix('courses')->group(function () {
    Route::get('/', 'index')->name('courses.index.page');
    Route::get('/course-offers', 'course_offers')->name('course_offers.page');
    Route::get('/course-details/{id}', 'course_details')->name('course.details.page');
    Route::get('/course-category/{post_id}', 'course_category_wise')->name('courses_cat');
    Route::post('/filter_courses', 'filter_courses')->name('filter_courses');
    Route::get('/courses_subject/{post_id}', 'courses_subject')->name('courses_subject');
    
    

    
    
});

Route::controller(Faq::class)->prefix('faq')->group(function () {
    Route::get('/', 'index')->name('faq.index.page');
});

Route::controller(HomeController::class)->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //  Route::get('/dashboard', function () {
    //      return view('dashboard');
    //  })->name('dashboard');
    Route::get('/dashboard', 'dashboard')->name('dashboard');

    Route::middleware('can:isCustomer')->group(function(){

        Route::get('/test/congratulation', [OnlineTest::class, 'congratulation'])->name('test.congratulation');

        Route::controller(UserPanel::class)->prefix('user')->group(function () {
            Route::get('/dashboard', 'user_dashboard')->name('user.dashboard.page');
            Route::post('/account_update', 'account_update')->name('user.account_update');
            Route::post('/account_security', 'account_security')->name('user.account_security');
            Route::get('/wishlist_remove/{wishlist_id}', 'wishlistRemove')->name('course.wishlist_remove');
        });
        Route::controller(OnlineTest::class)->prefix('online-test')->group(function () {
            Route::get('/index', 'index')->name('courses.index.page');
        });
        Route::controller(StripeController::class)->prefix('customer')->group(function () {
            Route::get('/course_subscription/{course_id}', 'course_subscription')->name('customer.course_subscription');
            Route::get('/stripe/{course_id}', 'stripe')->name('customer.stripe.page');
            Route::get('/thankyou', 'thankyou')->name('customer.thankyou.page');
            Route::post('/stripe/post', 'stripePost')->name('customer.stripe.post');
            Route::get('/addwishlist/{course_id}', 'wishlistPost')->name('customer.wishlist.post');
            
        });

        Route::get('/customer/curses', [\App\Http\Controllers\Frontend\Courses::class, 'purchaseCourseList'])->name('customer.courses');
        Route::get('/customer/curses/test', [\App\Http\Controllers\Frontend\Courses::class, 'purchaseCourseTest'])->name('customer.courses.test');
        Route::get('/customer/curses/taring', [\App\Http\Controllers\Frontend\Courses::class, 'course_rating_add'])->name('customer.courses.rating');
        Route::get('/customer/onlineTest', [OnlineTest::class, 'onlineTest'])->name('customer.online.test');
        Route::get('/customer/question/show', [OnlineTest::class, 'questionShow']);
        Route::get('/question/ans/store', [OnlineTest::class, 'storeAns']);

    });

//    Route::middleware('can:isCustomer')->group(function(){
//
//    });

    Route::middleware('can:isAdmin')->group(function(){

        Route::get('/admin/edit-question', EditQuestions::class)->name('edit.question');
        Route::post('/admin/update-data-store', [\App\Http\Controllers\QuestionController::class, 'updateQuestion'])->name('update.data.store');
        
        Route::get('admin/testimonial_update/{test_id}', TestimonialUpdate::class)->name('admin.testimonial_update');
        Route::get('/admin/add_testimonial', TestimonialAdd::class)->name('admin.add_testimonial');
        Route::get('/admin/testimonials', Testimonials::class)->name('admin.testimonials');

        Route::get('admin/view_more_contact/{contact_id}', ContactDetails::class)->name('admin.view_more_contact');
        

        Route::get('/admin/key_features', KeyFeatures::class)->name('admin.key_features');
        Route::get('/admin/key_features_add', KeyFeaturesAdd::class)->name('admin.key_features_add');

        Route::get('/admin/contact_info', ContactInfo::class)->name('admin.contact_info');


        Route::get('/admin/update_settings', Settings::class)->name('admin.update_settings');
        Route::get('/admin/update_contact', ContactPage::class)->name('admin.update_contact');
        Route::get('/admin/update_about_page', AboutPage::class)->name('admin.update_about_page');
        Route::get('/admin/update_course_page', CoursePage::class)->name('admin.update_course_page');
        Route::get('/admin/update_faq_page', FaqPage::class)->name('admin.update_faq_page');
        Route::get('/admin/update_home_page', AdminHomePage::class)->name('admin.update_home_page');
        Route::get('/admin/update_policy_page', PolicyPage::class)->name('admin.update_policy_page');
        Route::get('/admin/update_term_page', TermPage::class)->name('admin.update_term_page');
        Route::get('/admin/update_course_offers', CourseOffers::class)->name('admin.update_course_offers');
        



        Route::get('/admin/faq_components', FaqComponents::class)->name('admin.faq_components');
        Route::get('/admin/faq_component_add', FaqComponentAdd::class)->name('admin.faq_component_add');        
        Route::get('admin/faq_component_update/{faq_id}', FaqComponentUpdate::class)->name('admin.faq_component_update');

        Route::get('/admin/all_faq_categories', FaqCategory::class)->name('admin.all_faq_categories');
        Route::get('/admin/add_faq_category', FaqCategoryAdd::class)->name('admin.add_faq_category');        
        Route::get('admin/faq_category_update/{faq_cat_id}', FaqCategoryUpdate::class)->name('admin.faq_category_update');
        
        

        
        Route::get('/admin/customer_subscriptions', CustomerSubscriptions::class)->name('admin.customer_subscriptions');
        Route::get('/admin_dashboard', AdminDashboard::class)->name('admin.dashboard');
        Route::get('/admin/financial-reports', FinancialReports::class)->name('admin.financial_reports');
        Route::get('/admin/add-category', AddCategory::class)->name('admin.add_category');
        Route::get('admin/category_update/{cat_id}', CatrgoryUpdate::class)->name('admin.category_update');
        Route::get('admin/subject_update/{sub_id}', SubjectUpdate::class)->name('admin.subject_update');
        Route::get('admin/instructor_update/{ins_id}', InstructorUpdate::class)->name('admin.instructor_update');
        Route::get('/admin/all-categories', Category::class)->name('admin.all_categories');
        Route::get('/admin/add-subject', AddSubjects::class)->name('admin.add_subject');
        Route::get('/admin/all-subjects', Subjects::class)->name('admin.all_subjects');
        Route::get('/admin/add-courses', NewCourse::class)->name('admin.add_courses');
        Route::get('/admin/all-courses', Courses::class)->name('admin.all_courses');
        Route::get('admin/course_update/{course_id}', UpdateCourse::class)->name('admin.course_update');
        Route::get('/admin/add-instructor', AddInstructors::class)->name('admin.add_instructor');
        Route::get('/admin/all-instructors', Instructors::class)->name('admin.all_instructors');
        Route::get('/admin/all-users', Users::class)->name('admin.all_users');
        Route::get('/admin/question/list', QuestionList::class)->name('admin.question_list');
        Route::get('/admin/question/paper/list',  \App\Livewire\Admin\QuestionPaperList::class)->name('admin.question_paper_list');
        Route::get('/admin/add-question', AddQuestion::class)->name('admin.add_question');
        Route::get('/admin/category-subject', [\App\Http\Controllers\QuestionController::class, 'subjectList']);
        Route::get('/admin/subject-course', [\App\Http\Controllers\QuestionController::class, 'courseList']);
        Route::get('/admin/store-question', [\App\Http\Controllers\QuestionController::class, 'addQuestion']);
        Route::get('/admin/course-question', [\App\Http\Controllers\QuestionController::class, 'courseQuestion']);
        Route::post('/admin/question-paper', [\App\Http\Controllers\QuestionController::class, 'storeQuestionPaper'])->name('store.question-paper');;
        Route::get('/admin/add-question', AddQuestion::class)->name('admin.add_question');
        Route::get('/admin/create-question-paper', CreateQuestionPaper::class)->name('admin.create.question-paper');

        Route::get('admin/question_list_update/{post_id}', QuestionListUpdate::class)->name('admin.question_list_update');
        Route::get('admin/question_paper_list_update/{post_id}', QuestionPaperListUpdate::class)->name('admin.question_paper_list_update');


        router:   Route::get('/admin/edit-question-paper', \App\Livewire\Admin\EditQuestionPaper::class)->name('edit.question.paper');
           Route::post('/admin/update-question-paper',[\App\Http\Controllers\QuestionController::class, 'updateQuestionPaper'])->name('update.question-paper');


        Route::controller(HomePage::class)->prefix('admin')->group(function () {
            Route::get('/delete-category/{post_id}', 'Delete_category')->name('delete.category');
            Route::get('/delete-subject/{post_id}', 'Delete_subject')->name('delete.subject');
            Route::get('/delete-instructor/{post_id}', 'Delete_instructor')->name('delete.instructor');
            Route::get('/delete-course/{post_id}', 'Delete_course')->name('delete.course');
            Route::get('/delete-testimonial/{post_id}', 'Delete_testimonial')->name('delete.testimonial');
            Route::get('/delete-faq/{post_id}', 'Delete_faq')->name('delete.faq');
            Route::get('/delete-key_features/{post_id}', 'Delete_key_features')->name('delete.key_features');
            Route::get('/delete-question_list/{post_id}', 'Delete_question_list')->name('delete.question_list');
            Route::get('/delete-question_paper_list/{post_id}', 'Delete_question_paper_list')->name('delete.question_paper_list');
            
            
            
            
        });


    });


});

