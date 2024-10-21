<?php

use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Maso\WebShell\controllers\TerminalController;
use Maso\WebShell\controllers\AssetController;

/*
|--------------------------------------------------------------------------
| WShell Routes
|--------------------------------------------------------------------------
| These are the routes used by WShell.
|
*/

Route::group(config('web-shell.route'), function ()
{
    Route::group(['middleware' => [StartSession::class]], function ()
    {

        Route::get('/', [TerminalController::class, 'index']);
        Route::get('/directory', [TerminalController::class, 'getWorkingDirectory'])->name('directory.show');
        Route::get('assets/{asset}', [AssetController::class, 'getAsset'])->name('asset.show');
        Route::post('/command', [TerminalController::class, 'runCommand'])->name('command');
    });
});
