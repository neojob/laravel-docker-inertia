<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/**
|--------------------------------------------------------------------------
| Back Part Web Routes
|--------------------------------------------------------------------------
 */
Route::get('/loginBackPart', [App\Http\Controllers\sAuth\Back\LoginBackController::class, 'login'])->name('loginBack');
Route::post('/loginBackPart', [App\Http\Controllers\sAuth\Back\LoginBackController::class, 'postLogin'])->name('postLoginBack');

Route::get('/registerBackPart', [App\Http\Controllers\sAuth\Back\RegisterBackController::class, 'register'])->name('registerBack');
Route::post('/registerBackPart', [App\Http\Controllers\sAuth\Back\RegisterBackController::class, 'postRegister'])->name('postRegisterBack');

Route::get('/resetPasswordBackPart', [App\Http\Controllers\sAuth\Back\ResetPasswordBackController::class, 'resetPassword'])->name('resetPasswordBack');
Route::post('/resetPasswordBackPart', [App\Http\Controllers\sAuth\Back\ResetPasswordBackController::class, 'postResetPassword'])->name('postResetPasswordBack');

Route::get('/forgotPasswordBackPart', [App\Http\Controllers\sAuth\Back\ForgotPasswordBackController::class, 'forgotPassword'])->name('forgotPasswordBack');
Route::post('/forgotPasswordBackPart', [App\Http\Controllers\sAuth\Back\ForgotPasswordBackController::class, 'postForgotPassword'])->name('postForgotPasswordBack');

Route::post('/activateBackPart', [App\Http\Controllers\sAuth\Back\ActivationBackController::class, 'postActivate'])->name('postActivateBack');

Route::get('/logout', [App\Http\Controllers\sAuth\Back\LoginBackController::class, 'logout'])->name('logoutBack');


Route::group(['prefix' => 'admin/', 'middleware' => ['web', 'admin']], function () {
    Route::get('dashboard', [App\Http\Controllers\Back\MainBackController::class,'main'])->name('adminDashboard');

    Route::get('/languages/list', [App\Http\Controllers\Back\Languages::class, 'languagesList'])->name('adminLanguagesList');
    Route::get('/languages/add', [App\Http\Controllers\Back\Languages::class, 'languagesAdd'])->name('adminLanguagesAdd');
    Route::post('/languages/add', [App\Http\Controllers\Back\Languages::class, 'postLanguagesAdd'])->name('postAdminLanguagesAdd');
    Route::get('/languages/edit/{id?}', [App\Http\Controllers\Back\Languages::class, 'languagesEdit'])->name('adminLanguagesEdit');
    Route::post('/languages/edit/{id?}', [App\Http\Controllers\Back\Languages::class, 'postLanguagesEdit'])->name('postAdminLanguagesEdit');
    Route::get('/languages/delete/{id?}', [App\Http\Controllers\Back\Languages::class, 'languagesDelete'])->name('adminLanguagesDelete');

    Route::get('/sliders/list', [App\Http\Controllers\Back\Sliders::class, 'slidersList'])->name('adminSlidersList');
    Route::get('/sliders/add', [App\Http\Controllers\Back\Sliders::class, 'slidersAdd'])->name('adminSlidersAdd');
    Route::post('/sliders/add', [App\Http\Controllers\Back\Sliders::class, 'postSlidersAdd'])->name('postAdminSlidersAdd');
    Route::get('/sliders/edit/{id?}', [App\Http\Controllers\Back\Sliders::class, 'slidersEdit'])->name('adminSlidersEdit');
    Route::post('/sliders/edit/{id?}', [App\Http\Controllers\Back\Sliders::class, 'postSlidersEdit'])->name('postAdminSlidersEdit');
    Route::get('/sliders/delete/{id?}', [App\Http\Controllers\Back\Sliders::class, 'slidersDelete'])->name('adminSlidersDelete');

    Route::get('/menus/list', [App\Http\Controllers\Back\Menus::class, 'menusList'])->name('adminMenusList');
    Route::get('/menus/add', [App\Http\Controllers\Back\Menus::class, 'menusAdd'])->name('adminMenusAdd');
    Route::post('/menus/add', [App\Http\Controllers\Back\Menus::class, 'postMenusAdd'])->name('postAdminMenusAdd');
    Route::get('/menus/edit/{id?}', [App\Http\Controllers\Back\Menus::class, 'menusEdit'])->name('adminMenusEdit');
    Route::post('/menus/edit/{id?}', [App\Http\Controllers\Back\Menus::class, 'postMenusEdit'])->name('postAdminMenusEdit');
    Route::get('/menus/delete/{id?}', [App\Http\Controllers\Back\Menus::class, 'menusDelete'])->name('adminMenusDelete');

    Route::get('/settings/list', [App\Http\Controllers\Back\Settings::class, 'settingsList'])->name('adminSettingsList');
    Route::get('/settings/add', [App\Http\Controllers\Back\Settings::class, 'settingsAdd'])->name('adminSettingsAdd');
    Route::post('/settings/add', [App\Http\Controllers\Back\Settings::class, 'postSettingsAdd'])->name('postAdminSettingsAdd');
    Route::get('/settings/edit/{id?}', [App\Http\Controllers\Back\Settings::class, 'settingsEdit'])->name('adminSettingsEdit');
    Route::post('/settings/edit/{id?}', [App\Http\Controllers\Back\Settings::class, 'postSettingsEdit'])->name('postAdminSettingsEdit');
    Route::get('/settings/delete/{id?}', [App\Http\Controllers\Back\Settings::class, 'settingsDelete'])->name('adminSettingsDelete');

    Route::get('/entities/list', [App\Http\Controllers\Back\Entities::class, 'entitiesList'])->name('adminEntitiesList');
    Route::get('/entities/add', [App\Http\Controllers\Back\Entities::class, 'entitiesAdd'])->name('adminEntitiesAdd');
    Route::post('/entities/add', [App\Http\Controllers\Back\Entities::class, 'postEntitiesAdd'])->name('postAdminEntitiesAdd');
    Route::get('/entities/edit/{id?}', [App\Http\Controllers\Back\Entities::class, 'entitiesEdit'])->name('adminEntitiesEdit');
    Route::post('/entities/edit/{id?}', [App\Http\Controllers\Back\Entities::class, 'postEntitiesEdit'])->name('postAdminEntitiesEdit');
    Route::get('/entities/delete/{id?}', [App\Http\Controllers\Back\Entities::class, 'entitiesDelete'])->name('adminEntitiesDelete');

    Route::get('/articleTypes/list', [App\Http\Controllers\Back\ArticleTypes::class, 'articleTypesList'])->name('adminArticleTypesList');
    Route::get('/articleTypes/add', [App\Http\Controllers\Back\ArticleTypes::class, 'articleTypesAdd'])->name('adminArticleTypesAdd');
    Route::post('/articleTypes/add', [App\Http\Controllers\Back\ArticleTypes::class, 'postArticleTypesAdd'])->name('postAdminArticleTypesAdd');
    Route::get('/articleTypes/edit/{id?}', [App\Http\Controllers\Back\ArticleTypes::class, 'articleTypesEdit'])->name('adminArticleTypesEdit');
    Route::post('/articleTypes/edit/{id?}', [App\Http\Controllers\Back\ArticleTypes::class, 'postArticleTypesEdit'])->name('postAdminArticleTypesEdit');
    Route::get('/articleTypes/delete/{id?}', [App\Http\Controllers\Back\ArticleTypes::class, 'articleTypesDelete'])->name('adminArticleTypesDelete');

    Route::get('/articles/list', [App\Http\Controllers\Back\Articles::class, 'articlesList'])->name('adminArticlesList');
    Route::get('/articles/add', [App\Http\Controllers\Back\Articles::class, 'articlesAdd'])->name('adminArticlesAdd');
    Route::post('/articles/add', [App\Http\Controllers\Back\Articles::class, 'postArticlesAdd'])->name('postAdminArticlesAdd');
    Route::get('/articles/edit/{id?}', [App\Http\Controllers\Back\Articles::class, 'articlesEdit'])->name('adminArticlesEdit');
    Route::post('/articles/edit/{id?}', [App\Http\Controllers\Back\Articles::class, 'postArticlesEdit'])->name('postAdminArticlesEdit');
    Route::get('/articles/delete/{id?}', [App\Http\Controllers\Back\Articles::class, 'articlesDelete'])->name('adminArticlesDelete');
    Route::get('/articles/removeImg/{id?}', [App\Http\Controllers\Back\Articles::class, 'articlesRemoveImg'])->name('adminArticlesRemoveImg');
    Route::get('/articles/mainImg/{id?}/{art?}', [App\Http\Controllers\Back\Articles::class, 'articlesMainImg'])->name('adminArticlesMainImg');

    Route::get('/categories/list', [App\Http\Controllers\Back\Categories::class, 'categoriesList'])->name('adminCategoriesList');
    Route::get('/categories/add', [App\Http\Controllers\Back\Categories::class, 'categoriesAdd'])->name('adminCategoriesAdd');
    Route::post('/categories/add', [App\Http\Controllers\Back\Categories::class, 'postCategoriesAdd'])->name('postAdminCategoriesAdd');
    Route::get('/categories/edit/{id?}', [App\Http\Controllers\Back\Categories::class, 'categoriesEdit'])->name('adminCategoriesEdit');
    Route::post('/categories/edit/{id?}', [App\Http\Controllers\Back\Categories::class, 'postCategoriesEdit'])->name('postAdminCategoriesEdit');
    Route::get('/categories/delete/{id?}', [App\Http\Controllers\Back\Categories::class, 'categoriesDelete'])->name('adminCategoriesDelete');

    Route::get('/products/list', [App\Http\Controllers\Back\Products::class, 'productsList'])->name('adminProductsList');
    Route::get('/products/add', [App\Http\Controllers\Back\Products::class, 'productsAdd'])->name('adminProductsAdd');
    Route::post('/products/add', [App\Http\Controllers\Back\Products::class, 'postProductsAdd'])->name('postAdminProductsAdd');
    Route::get('/products/edit/{id?}', [App\Http\Controllers\Back\Products::class, 'productsEdit'])->name('adminProductsEdit');
    Route::post('/products/edit/{id?}', [App\Http\Controllers\Back\Products::class, 'postProductsEdit'])->name('postAdminProductsEdit');
    Route::get('/products/delete/{id?}', [App\Http\Controllers\Back\Products::class, 'productsDelete'])->name('adminProductsDelete');
    Route::get('/products/removeImg/{id?}', [App\Http\Controllers\Back\Products::class, 'productsRemoveImg'])->name('adminProductsRemoveImg');
    Route::get('/products/mainImg/{id?}/{art?}', [App\Http\Controllers\Back\Products::class, 'productsMainImg'])->name('adminProductsMainImg');


});


Route::get('/search', [\App\Http\Controllers\Front\Search::class, 'index'])->name('Search');

Route::get('/redis', [\App\Http\Controllers\Front\RedisController::class, 'index'])->name('Redis');

Route::get('/rabbitmq', [\App\Http\Controllers\Front\RabbitMQController::class, 'index'])->name('RabbitMQ');

Route::get('/elasticWriteOne', [\App\Http\Controllers\Front\ElasticSearchController::class, 'writeOne'])->name('writeOneElastic');
Route::get('/elasticReadOne', [\App\Http\Controllers\Front\ElasticSearchController::class, 'readOne'])->name('readOneElastic');
Route::get('/elasticSearchInMultiFields', [\App\Http\Controllers\Front\ElasticSearchController::class, 'searchInMultiFields'])->name('searchInMultiFieldsElastic');



Route::middleware('auth')
    ->group(function () {

        Route::get('/', [\App\Http\Controllers\Front\InertiaController::class, 'index'])->name('Home');
        Route::get('/about', [\App\Http\Controllers\Front\InertiaController::class, 'about'])->name('About');

        Route::resource('users', \App\Http\Controllers\Front\UserInertiaController::class);
    });



Route::controller(\App\Http\Controllers\Front\AuthInertiaController::class)
    ->group(function () {
        Route::post('/login', 'login')->name('login')->middleware('guest');
        Route::delete('/logout', 'logout')->name('logout')->middleware('auth');
    });


Route::inertia('/login', 'Login');

//Route::get('/', function () {
//    return inertia('Welcsome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

//Route::get('/dashboard', function () {
//    return inertia('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::get('/abc', [ProfileController::class, 'abc'])->name('profile.abc');
//
//Route::middleware('auth')->group(function () {
//
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';

