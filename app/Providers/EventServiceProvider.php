<?php

namespace App\Providers;

use App\Events\CreateModelEvent;
use App\Events\LoginEvent;
use App\Events\PlanCreate;
use App\Events\Registeration;
use App\Events\ResetPassword;
use App\Events\sendEmailAnnounce;
use App\Events\ShowAnnounceEvent;
use App\Events\ShowModelEvent;
use App\Events\StoreModelEvent;
use App\Events\TicketStoreEvent;
use App\Events\UpdateModelEvent;
use App\Listeners\LoginListener;
use App\Listeners\OtherModelListener;
use App\Listeners\PlanCreateListener;
use App\Listeners\PrintListener;
use App\Listeners\RegisterationListener;
use App\Listeners\ResetPasswordListener;
use App\Listeners\sendEmailAnnounceListener;
use App\Listeners\SendSmsRegisterCode;
use App\Listeners\SendSmsVerificationNotification;
use App\Listeners\ShowAnnounceListener;
use App\Listeners\ShowModelListener;
use App\Listeners\StoreEventListener;
use App\Listeners\TicketStoreListener;
use App\Listeners\UpdateModelListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */

    protected $listen = [
        Registeration::class => [
            RegisterationListener::class,

        ],
        ResetPassword::class => [
            ResetPasswordListener::class
        ],
        LoginEvent::class => [
            LoginListener::class
        ],

        CreateModelEvent::class => [
            PrintListener::class
        ],
        StoreModelEvent::class => [
            StoreEventListener::class
        ],
        UpdateModelEvent::class => [
            UpdateModelListener::class
        ],
        ShowModelEvent::class => [
            ShowModelListener::class

        ],

        ShowAnnounceEvent::class=>[
          ShowAnnounceListener::class
        ],
        sendEmailAnnounce::class => [
            sendEmailAnnounceListener::class
        ],
        TicketStoreEvent::class => [
            TicketStoreListener::class
        ] ,
        PlanCreate::class => [
            PlanCreateListener::class
        ]

        //        'App\Events\TestEvent' => [
//            'App\Listeners\TestEventListener',
//        ],
//        Registeration::class => [
//            SendSmsRegisterCode::class
//        ]
    ];


//    protected $listen = [
//        Registered::class => [
//            SendEmailVerificationNotification::class,
//            SendSmsVerificationNotification::class
//        ],
//        'App\Events\TestEvent' => [
//            'App\Listeners\TestEventListener',
//        ],
//        Registeration::class => [
//            SendSmsRegisterCode::class
//        ]
//    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
