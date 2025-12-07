<?php

use Illuminate\Support\Facades\Route;
use Tet\Coupons\Controllers\CouponController;

Route::get('coupons', [CouponController::class, 'index'])->name('coupons.index');
Route::get('coupons/create', [CouponController::class, 'createView'])->name('coupons.create.view');
Route::post('coupons', [CouponController::class, 'store'])->name('coupons.store');
Route::get('coupons/{id}', [CouponController::class, 'show'])->name('coupons.show');
Route::get('coupons/update/{id}', [CouponController::class, 'editView'])->name('coupons.edit.view');
Route::put('coupons/{id}', [CouponController::class, 'update'])->name('coupons.update');
Route::delete('coupons/{id}', [CouponController::class, 'destroy'])->name('coupons.destroy');