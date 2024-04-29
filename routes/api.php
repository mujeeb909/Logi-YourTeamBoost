<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailchimpController;


Route::post('send-email', [MailchimpController::class, 'sendEmail']);
