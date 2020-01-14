<?php

require_once (__DIR__ . '/internals/website.php');

$site = new Website();
$site->init();

$URL_RULES =
[
	[ 'url' => [],                                         'target' => 'main.php',                   'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['index'],                                  'target' => 'main.php',                   'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['index.php'],                              'target' => 'main.php',                   'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['msmain', 'index'],                        'target' => 'main.php',                   'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['about'],                                  'target' => 'about.php',                  'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['msmain', 'about'],                        'target' => 'about.php',                  'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['login'],                                  'target' => 'login.php',                  'options' => [ 'http' ],     'parameter' => [ 'login_target'  => '/' ],                ],
	[ 'url' => ['logout'],                                 'target' => 'logout.php',                 'options' => [ 'http' ],     'parameter' => [ 'logout_target' => '/' ],                ],

	[ 'url' => ['programs'],                               'target' => 'programs_list.php',          'options' => [ 'http' ],     'parameter' => [ 'categoryfilter' => '' ],                ],
	[ 'url' => ['programs', 'index'],                      'target' => 'programs_list.php',          'options' => [ 'http' ],     'parameter' => [ 'categoryfilter' => '%GET%' ],           ],
	[ 'url' => ['programs', 'index'],                      'target' => 'programs_list.php',          'options' => [ 'http' ],     'parameter' => [ 'categoryfilter' => '' ],                ],
	[ 'url' => ['programs', 'cat', '?{categoryfilter}'],   'target' => 'programs_list.php',          'options' => [ 'http' ],     'parameter' => [ 'categoryfilter' => '%URL%' ],           ],
	[ 'url' => ['downloads', 'details.php'],               'target' => 'programs_list.php',          'options' => [ 'http' ],     'parameter' => [ 'categoryfilter' => '' ],                ],
	[ 'url' => ['downloads', 'downloads.php'],             'target' => 'programs_list.php',          'options' => [ 'http' ],     'parameter' => [ 'categoryfilter' => '' ],                ],
	[ 'url' => ['programs', 'view', '?{id}'],              'target' => 'programs_view.php',          'options' => [ 'http' ],     'parameter' => [ 'id' => '%URL%' ],                       ],
	[ 'url' => ['programs', 'view'],                       'target' => 'programs_view.php',          'options' => [ 'http' ],     'parameter' => [ 'id' => '%GET%' ],                       ],
	[ 'url' => ['downloads', '?{id}'],                     'target' => 'programs_download.php',      'options' => [ 'http' ],     'parameter' => [ 'id' => '%URL%' ],                       ],
	[ 'url' => ['programs', 'download', '?{id}'],          'target' => 'programs_download.php',      'options' => [ 'http' ],     'parameter' => [ 'id' => '%URL%' ],                       ],
	[ 'url' => ['programs', 'download'],                   'target' => 'programs_download.php',      'options' => [ 'http' ],     'parameter' => [ 'id' => '%GET%' ],                       ],

	[ 'url' => ['books'],                                  'target' => 'books_list.php',             'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['books', 'list'],                          'target' => 'books_list.php',             'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['books', 'view', '?{id}'],                 'target' => 'books_view.php',             'options' => [ 'http' ],     'parameter' => [ 'id' => '%GET%' ],                       ],
	[ 'url' => ['books', 'view', '?{id}', '*'],            'target' => 'books_view.php',             'options' => [ 'http' ],     'parameter' => [ 'id' => '%URL%' ],                       ],

	[ 'url' => ['update.php'],                             'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'progs::updatecheck' ],         ],
	[ 'url' => ['update.php', '?{Name}'],                  'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'progs::updatecheck' ],         ],
	[ 'url' => ['update'],                                 'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'progs::updatecheck' ],         ],
	[ 'url' => ['update', '?{Name}'],                      'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'progs::updatecheck' ],         ],
	[ 'url' => ['update2'],                                'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'progs::updatecheck' ],         ],
	[ 'url' => ['api', 'update'],                          'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'progs::updatecheck' ],         ],
	[ 'url' => ['api', 'update', '?{Name}'],               'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'progs::updatecheck' ],         ],
	[ 'url' => ['api', 'test'],                            'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'base::test' ],                 ],
	[ 'url' => ['api', 'setselfadress'],                   'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'server::setselfaddress' ],     ],
	[ 'url' => ['api', 'statsping'],                       'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'alephnote::statsping' ],       ],
	[ 'url' => ['api', 'webhook', '?{target}'],            'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'server::gitwebhook' ],         ],
	[ 'url' => ['api', 'backupupload'],                    'target' => 'api.php',                    'options' => [ 'http' ],     'parameter' => [ 'cmd' => 'server::backupupload' ],       ],
	[ 'url' => ['api', '?{cmd}'],                          'target' => 'api.php',                    'options' => [  ],           'parameter' => [ 'cmd' => '%URL%' ],                      ],

	[ 'url' => ['admin'],                                  'target' => 'admin.php',                  'options' => [ 'password' ], 'parameter' => [ ]                                        ],

	[ 'url' => ['blog'],                                   'target' => 'blog_list.php',              'options' => [ ],            'parameter' => [ ],                                       ],
	[ 'url' => ['log'],                                    'target' => 'blog_list.php',              'options' => [ ],            'parameter' => [ ],                                       ],
	[ 'url' => ['blogpost', 'index'],                      'target' => 'blog_list.php',              'options' => [ ],            'parameter' => [ ],                                       ],
	[ 'url' => ['blog', '?{id}'],                          'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%URL%', 'subview' => '' ],      ],
	[ 'url' => ['blog', '?{id}'],                          'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%URL%', 'subview' => '' ],      ],
	[ 'url' => ['blog', '?{id}', '?{name}'],               'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%URL%', 'subview' => '' ],      ],
	[ 'url' => ['blog', '?{id}', '?{name}', '?{subview}'], 'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%URL%', 'subview' => '%URL%' ], ],
	[ 'url' => ['log', '?{id}'],                           'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%URL%', 'subview' => '' ],      ],
	[ 'url' => ['log', '?{id}'],                           'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%URL%', 'subview' => '' ],      ],
	[ 'url' => ['log', '?{id}', '?{name}'],                'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%URL%', 'subview' => '' ],      ],
	[ 'url' => ['log', '?{id}', '?{name}', '?{subview}'],  'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%URL%', 'subview' => '%URL%' ], ],
	[ 'url' => ['blogpost', 'view'],                       'target' => 'blog_view.php',              'options' => [ ],            'parameter' => [ 'id' => '%GET%', 'subview' => '' ],      ],

	[ 'url' => ['webapps'],                                'target' => 'webapps_list.php',           'options' => [ ],            'parameter' => [ ],                                       ],

	[ 'url' => ['highscores', 'list.php'],                 'target' => 'highscores_listentries.php', 'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%' ],                   ],
	[ 'url' => ['highscores', 'list'],                     'target' => 'highscores_listentries.php', 'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%' ],                   ],
	[ 'url' => ['highscores', 'listentries'],              'target' => 'highscores_listentries.php', 'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%' ],                   ],
	[ 'url' => ['highscores', 'list.php'],                 'target' => 'highscores_listgames.php',   'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['highscores', 'list'],                     'target' => 'highscores_listgames.php',   'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['highscores', 'listgames'],                'target' => 'highscores_listgames.php',   'options' => [ 'http' ],     'parameter' => [ ],                                       ],
	[ 'url' => ['highscores', 'insert.php'],               'target' => 'highscores_insert.php',      'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%', 'check' => '%GET%', 'name' => '%GET%', 'rand' => '%GET%', 'points' => '%GET%' ], ],
	[ 'url' => ['highscores', 'insert'],                   'target' => 'highscores_insert.php',      'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%', 'check' => '%GET%', 'name' => '%GET%', 'rand' => '%GET%', 'points' => '%GET%' ], ],
	[ 'url' => ['highscores', 'update.php'],               'target' => 'highscores_update.php',      'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%', 'check' => '%GET%', 'name' => '%GET%', 'rand' => '%GET%', 'points' => '%GET%', 'nameid' => '%GET%' ], ],
	[ 'url' => ['highscores', 'update'],                   'target' => 'highscores_update.php',      'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%', 'check' => '%GET%', 'name' => '%GET%', 'rand' => '%GET%', 'points' => '%GET%', 'nameid' => '%GET%' ], ],
	[ 'url' => ['highscores', 'list_top50.php'],           'target' => 'highscores_top50.php',       'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%' ],                   ],
	[ 'url' => ['highscores', 'list_top50'],               'target' => 'highscores_top50.php',       'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%' ],                   ],
	[ 'url' => ['highscores', 'getNewID.php'],             'target' => 'highscores_newid.php',       'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%' ],                   ],
	[ 'url' => ['highscores', 'newid'],                    'target' => 'highscores_newid.php',       'options' => [ 'http' ],     'parameter' => [ 'gameid' => '%GET%' ],                   ],
];

$site->serve($URL_RULES);


//TODO euler insert+show 32bit | 64bit mode
//TODO support for different color schemes
//     should be possible to change with just a few constant in config.scss
//     a (little) bit more hue in default scheme
