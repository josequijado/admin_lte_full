<?php
Route::prefix('admin')->group(function () {
    // Top Navbar
    Route::post('index', 'TopController@home')
        ->name('admin_home');
    Route::get('contact', 'TopController@contact')
        ->name('admin_contact');
    Route::get('mess/{id}', 'TopController@messages')
        ->name('admin_messages');
    Route::get('notif/{id}', 'TopController@notifications')
        ->name('admin_notifications');
    // Main Sidebar
    Route::post('index2', 'MainSideController@index2')
        ->name('admin_index2');
    Route::post('index3', 'MainSideController@index3')
        ->name('admin_index3');
    Route::post('widgets', 'MainSideController@widgets')
        ->name('pages_widgets');
    Route::post('Layout options', 'MainSideController@layout_options')
        ->name('pages_layout_options');
    Route::post('charts', 'MainSideController@charts')
        ->name('pages_charts');
    Route::post('UI_Elements', 'MainSideController@ui_elements')
        ->name('pages_ui');
    Route::post('forms', 'MainSideController@forms')
        ->name('pages_forms');
    Route::post('tables', 'MainSideController@tables')
        ->name('pages_tables');
    Route::post('calendar', 'MainSideController@calendar')
        ->name('pages_calendar');
    Route::post('gallery', 'MainSideController@gallery')
        ->name('pages_gallery');
    Route::post('mailbox', 'MainSideController@mailbox')
        ->name('pages_mailbox');
    Route::post('examples', 'MainSideController@examples')
        ->name('pages_examples');
    Route::post('extras', 'MainSideController@extras')
        ->name('pages_extras');
});
