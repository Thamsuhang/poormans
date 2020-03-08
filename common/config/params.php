<?php

$real_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR;
$path_root = '/poormans';
$absolute_path = 'http://' . $_SERVER['HTTP_HOST'] . $path_root . '/common/assets/'; // Yii::$app->request->baseUrl .

return [
        'system_name'                   => 'Poorman`s Online Directory',
        'adminEmail'                    => 'poormansonlinedirectory@live.com',
        'supportEmail'                  => 'poormansonlinedirectory@live.com',
        'user.passwordResetTokenExpire' => 3600,
        'user_session'                  => 'CtNp1G0TtaD4gFiWN25',
        'upload_path'                   => [
                'doc'     => $real_path . 'docs' . DIRECTORY_SEPARATOR,
                'image'   => $real_path . 'images/uploads' . DIRECTORY_SEPARATOR,
                'profile' => $real_path . 'profiles' . DIRECTORY_SEPARATOR,
                'thumb'   => $real_path . 'thumbs' . DIRECTORY_SEPARATOR,
                'temp'    => $real_path . 'temp' . DIRECTORY_SEPARATOR,
        ],
        'upload_load_path'              => [
                'doc'     => $absolute_path . 'docs/',
                'image'   => $absolute_path . 'images/uploads/',
                'profile' => $absolute_path . 'profiles/',
                'thumb'   => $absolute_path . 'thumbs/',
        ],
        'role_user'                     => [
                'fLCDf8HuRQ' => 'superadmin',
                'UBhcWtaIva' => 'admin',
                'QBCMajSNzb' => 'operator',
        ],
        'user_role'                     => [
                'superadmin' => 'fLCDf8HuRQ',
                'admin'      => 'UBhcWtaIva',
                'operator'   => 'QBCMajSNzb',
        ],
        'legal_doc_type'                => [
                1 => 'Citizenship',
                2 => 'Passport',
                3 => 'License',
                4 => 'Others',
        ],
        'image_ext'                     => ['jpg', 'png', 'jpeg', 'gif'],
        'crop_size'                     => [
                'width'  => 250,
                'height' => 250,
        ],
        'order_status'                  => [
                'pending'   => 0,
                'approved'  => 1,
                'cancelled' => 2,
                'delivered' => 3,
        ],
        'status_order'                  => [
                0 => 'pending',
                1 => 'approved',
                2 => 'cancelled',
                3 => 'delivered',
        ],
        // deactivate the user with following or more incorrect login attempts
        'allowed_incorrect_login'       => 15,
        'allowed_featured'              => 40,
        'pages'                         => [
                'site'                => 1,
                'about-us'            => 2,
                'services'            => 3,
                'products'            => 4,
                'contact-us'          => 5,
                'faq'                 => 6,
                'terms-and-condition' => 7,
        ],
        'packages'                      => [
                'basic'    =>
                        [
                                'name'    => 'Basic',
                                'slug'    => 'basic',
                                'price'   => 30,
                                'fields'  => ['general', 'name', 'category', 'address', 'city', 'state', 'phone', 'owner_name', 'owner_phone', 'owner_email', 'owner_zip'],
                                'objects' => [
                                        'coupon'      => [
                                                'display' => 'Coupon',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'disp_add'    => [
                                                'display' => 'Display Link',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'name'        => [
                                                'display' => 'Name',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'phone'       => [
                                                'display' => 'Phone',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'address'     => [
                                                'display' => 'address',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'owner_name'  => [
                                                'display' => 'Name',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'owner_email' => [
                                                'display' => 'Email',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'owner_phone' => [
                                                'display' => 'Phone',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'owner_zip'   => [
                                                'display' => 'Zip',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'category'    => [
                                                'display' => 'Category',
                                                'price'   => '5',
                                                'free'    => '1',
                                        ]
                                ]
                                //                    'objects' => ['name', 'category', 'description', 'address', 'city', 'state', 'zip', 'phone', 'owner_name', 'owner_phone', 'owner_email', 'owner_zip', 'tags'],
                        ],
                'premium'  =>
                        [
                                'name'    => 'Premium',
                                'slug'    => 'premium',
                                'price'   => 60,
                                'fields'  => ['url', 'general', 'description','name', 'category', 'address', 'city', 'state', 'phone', 'fax', 'email', 'url', 'display_link', 'coupon_link', 'owner_name', 'owner_phone', 'owner_email', 'owner_zip'],
                                'objects' => [
                                        'coupon'      => [
                                                'display' => 'Coupon',
                                                'price'   => '25',
                                                'free'    => '1',
                                        ],
                                        'disp_add'    => [
                                                'display' => 'Display Link',
                                                'price'   => '25',
                                                'free'    => '1',
                                        ],
                                        'name'        => [
                                                'display' => 'Name',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'phone'       => [
                                                'display' => 'Phone',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'address'     => [
                                                'display' => 'address',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'owner_name'  => [
                                                'display' => 'Name',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'owner_email' => [
                                                'display' => 'Email',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'owner_phone' => [
                                                'display' => 'Phone',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'owner_zip'   => [
                                                'display' => 'Zip',
                                                'price'   => '0',
                                                'free'    => '1',
                                        ],
                                        'category'    => [
                                                'display' => 'Category',
                                                'price'   => '5',
                                                'free'    => '1',
                                        ]
                                ],
                        ],
                'card'     => [
                        'name'    => 'Business Card',
                        'slug'    => 'card',
                        'price'   => 50,
                        'fields'  => ['business_card','card', 'owner_name', 'owner_phone', 'owner_email', 'owner_zip'],
                        'objects' => [
                                'card'        => [
                                        'display' => 'Business Card',
                                        'price'   => '25',
                                        'free'    => '1',
                                ],
                                'name'        => [
                                        'display' => 'Name',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'phone'       => [
                                        'display' => 'Phone',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'address'     => [
                                        'display' => 'address',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'owner_name'  => [
                                        'display' => 'Name',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'owner_email' => [
                                        'display' => 'Email',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'owner_phone' => [
                                        'display' => 'Phone',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'owner_zip'   => [
                                        'display' => 'Zip',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'category'    => [
                                        'display' => 'Category',
                                        'price'   => '5',
                                        'free'    => '1',
                                ]
                        ],
                ],
                'featured' => [
                        'name'    => 'Featured Business',
                        'slug'    => 'featured',
                        'price'   => 50,
                        'fields'  => ['card', 'featured', 'owner_name', 'owner_phone', 'owner_email', 'owner_zip'],
                        'objects' => [
                                'card'        => [
                                        'display' => 'Business Card',
                                        'price'   => '25',
                                        'free'    => '1',
                                ],
                                'name'        => [
                                        'display' => 'Name',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'phone'       => [
                                        'display' => 'Phone',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'address'     => [
                                        'display' => 'address',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'owner_name'  => [
                                        'display' => 'Name',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'owner_email' => [
                                        'display' => 'Email',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'owner_phone' => [
                                        'display' => 'Phone',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'owner_zip'   => [
                                        'display' => 'Zip',
                                        'price'   => '0',
                                        'free'    => '1',
                                ],
                                'category'    => [
                                        'display' => 'Category',
                                        'price'   => '5',
                                        'free'    => '1',
                                ]
                        ],
                ],

        ],
        'signUpEmail'                   => [
                'receiver' => 'chetan.rajbhandari@gmail.com',
                'subject'  => 'New User Sign Up - Poorman`s Online Directory',
        ],
        'email'                         => [
                'Host'            => 'server.webhostingnepal.com',
                'Port'            => '465',
                'SMTPSecure'      => 'tls',
                'SMTPAuth'        => true,
                'SMTPKeepAlive'   => true,
                'SMTPDebug'       => 0,
                'Mailer'          => 'mail',
                'CharSet'         => 'utf-8',
                'ContentType'     => 'text/html',
                'From'            => 'noreply@horizonwebhost.com',
                'FromName'        => "Poormans Online Directory | Auto-generated Email",
                'Username'        => 'noreply@horizonwebhost.com',
                'Password'        => 'nepal123',
                'AltBody'         => 'To view the message, please use an HTML compatible email viewer!!',
                'Signature'       => '<p>Thank You,</p> <p>Poormans Online Directory</p>',
                'from-email'      => 'noreply@horizonwebhost.com',
                'from-email-name' => 'Poormans Online Directory',
        ],
        'states'                        => ['AL' => "Alabama", 'AK' => "Alaska", 'AZ' => "Arizona", 'AR' => "Arkansas", 'CA' => "California", 'CO' => "Colorado", 'CT' => "Connecticut", 'DE' => "Delaware", 'DC' => "District Of Columbia", 'FL' => "Florida", 'GA' => "Georgia", 'HI' => "Hawaii", 'ID' => "Idaho", 'IL' => "Illinois", 'IN' => "Indiana", 'IA' => "Iowa", 'KS' => "Kansas", 'KY' => "Kentucky", 'LA' => "Louisiana", 'ME' => "Maine", 'MD' => "Maryland", 'MA' => "Massachusetts", 'MI' => "Michigan", 'MN' => "Minnesota", 'MS' => "Mississippi", 'MO' => "Missouri", 'MT' => "Montana", 'NE' => "Nebraska", 'NV' => "Nevada", 'NH' => "New Hampshire", 'NJ' => "New Jersey", 'NM' => "New Mexico", 'NY' => "New York", 'NC' => "North Carolina", 'ND' => "North Dakota", 'OH' => "Ohio", 'OK' => "Oklahoma", 'OR' => "Oregon", 'PA' => "Pennsylvania", 'RI' => "Rhode Island", 'SC' => "South Carolina", 'SD' => "South Dakota", 'TN' => "Tennessee", 'TX' => "Texas", 'UT' => "Utah", 'VT' => "Vermont", 'VA' => "Virginia", 'WA' => "Washington", 'WV' => "West Virginia", 'WI' => "Wisconsin", 'WY' => "Wyoming",],
        'fa-icons'                      => ["fa-adjust", "fa-adn", "fa-align-center", "fa-align-justify", "fa-align-left", "fa-align-right", "fa-ambulance", "fa-anchor", "fa-android", "fa-angellist", "fa-angle-double-down", "fa-angle-double-left", "fa-angle-double-right", "fa-angle-double-up", "fa-angle-down", "fa-angle-left", "fa-angle-right", "fa-angle-up", "fa-apple", "fa-archive", "fa-area-chart", "fa-arrow-circle-down", "fa-arrow-circle-left", "fa-arrow-circle-o-down", "fa-arrow-circle-o-left", "fa-arrow-circle-o-right", "fa-arrow-circle-o-up", "fa-arrow-circle-right", "fa-arrow-circle-up", "fa-arrow-down", "fa-arrow-left", "fa-arrow-right", "fa-arrow-up", "fa-arrows", "fa-arrows-alt", "fa-arrows-h", "fa-arrows-v", "fa-asterisk", "fa-at", "fa-automobile", "fa-backward", "fa-ban", "fa-bank", "fa-bar-chart", "fa-bar-chart-o", "fa-barcode", "fa-bars", "fa-bed", "fa-beer", "fa-behance", "fa-behance-square", "fa-bell", "fa-bell-o", "fa-bell-slash", "fa-bell-slash-o", "fa-bicycle", "fa-binoculars", "fa-birthday-cake", "fa-bitbucket", "fa-bitbucket-square", "fa-bitcoin", "fa-bold", "fa-bolt", "fa-bomb", "fa-book", "fa-bookmark", "fa-bookmark-o", "fa-briefcase", "fa-btc", "fa-bug", "fa-building", "fa-building-o", "fa-bullhorn", "fa-bullseye", "fa-bus", "fa-buysellads", "fa-cab", "fa-calculator", "fa-calendar", "fa-calendar-o", "fa-camera", "fa-camera-retro", "fa-car", "fa-caret-down", "fa-caret-left", "fa-caret-right", "fa-caret-square-o-down", "fa-caret-square-o-left", "fa-caret-square-o-right", "fa-caret-square-o-up", "fa-caret-up", "fa-cart-arrow-down", "fa-cart-plus", "fa-cc", "fa-cc-amex", "fa-cc-discover", "fa-cc-mastercard", "fa-cc-paypal", "fa-cc-stripe", "fa-cc-visa", "fa-certificate", "fa-chain", "fa-chain-broken", "fa-check", "fa-check-circle", "fa-check-circle-o", "fa-check-square", "fa-check-square-o", "fa-chevron-circle-down", "fa-chevron-circle-left", "fa-chevron-circle-right", "fa-chevron-circle-up", "fa-chevron-down", "fa-chevron-left", "fa-chevron-right", "fa-chevron-up", "fa-child", "fa-circle", "fa-circle-o", "fa-circle-o-notch", "fa-circle-thin", "fa-clipboard", "fa-clock-o", "fa-close", "fa-cloud", "fa-cloud-download", "fa-cloud-upload", "fa-cny", "fa-code", "fa-code-fork", "fa-codepen", "fa-coffee", "fa-cog", "fa-cogs", "fa-columns", "fa-comment", "fa-comment-o", "fa-comments", "fa-comments-o", "fa-compass", "fa-compress", "fa-connectdevelop", "fa-copy", "fa-copyright", "fa-credit-card", "fa-crop", "fa-crosshairs", "fa-css3", "fa-cube", "fa-cubes", "fa-cut", "fa-cutlery", "fa-dashboard", "fa-dashcube", "fa-database", "fa-dedent", "fa-delicious", "fa-desktop", "fa-deviantart", "fa-diamond", "fa-digg", "fa-dollar", "fa-dot-circle-o", "fa-download", "fa-dribbble", "fa-dropbox", "fa-drupal", "fa-edit", "fa-eject", "fa-ellipsis-h", "fa-ellipsis-v", "fa-empire", "fa-envelope", "fa-envelope-o", "fa-envelope-square", "fa-eraser", "fa-eur", "fa-euro", "fa-exchange", "fa-exclamation", "fa-exclamation-circle", "fa-exclamation-triangle", "fa-expand", "fa-external-link", "fa-external-link-square", "fa-eye", "fa-eye-slash", "fa-eyedropper", "fa-facebook", "fa-facebook-f", "fa-facebook-official", "fa-facebook-square", "fa-fast-backward", "fa-fast-forward", "fa-fax", "fa-female", "fa-fighter-jet", "fa-file", "fa-file-archive-o", "fa-file-audio-o", "fa-file-code-o", "fa-file-excel-o", "fa-file-image-o", "fa-file-movie-o", "fa-file-o", "fa-file-pdf-o", "fa-file-photo-o", "fa-file-picture-o", "fa-file-powerpoint-o", "fa-file-sound-o", "fa-file-text", "fa-file-text-o", "fa-file-video-o", "fa-file-word-o", "fa-file-zip-o", "fa-files-o", "fa-film", "fa-filter", "fa-fire", "fa-fire-extinguisher", "fa-flag", "fa-flag-checkered", "fa-flag-o", "fa-flash", "fa-flask", "fa-flickr", "fa-floppy-o", "fa-folder", "fa-folder-o", "fa-folder-open", "fa-folder-open-o", "fa-font", "fa-forumbee", "fa-forward", "fa-foursquare", "fa-frown-o", "fa-futbol-o", "fa-gamepad", "fa-gavel", "fa-gbp", "fa-ge", "fa-gear", "fa-gears", "fa-genderless", "fa-gift", "fa-git", "fa-git-square", "fa-github", "fa-github-alt", "fa-github-square", "fa-gittip", "fa-glass", "fa-globe", "fa-google", "fa-google-plus", "fa-google-plus-square", "fa-google-wallet", "fa-graduation-cap", "fa-gratipay", "fa-group", "fa-h-square", "fa-hacker-news", "fa-hand-o-down", "fa-hand-o-left", "fa-hand-o-right", "fa-hand-o-up", "fa-hdd-o", "fa-header", "fa-headphones", "fa-heart", "fa-heart-o", "fa-heartbeat", "fa-history", "fa-home", "fa-hospital-o", "fa-hotel", "fa-html5", "fa-ils", "fa-image", "fa-inbox", "fa-indent", "fa-info", "fa-info-circle", "fa-inr", "fa-instagram", "fa-institution", "fa-ioxhost", "fa-italic", "fa-joomla", "fa-jpy", "fa-jsfiddle", "fa-key", "fa-keyboard-o", "fa-krw", "fa-language", "fa-laptop", "fa-lastfm", "fa-lastfm-square", "fa-leaf", "fa-leanpub", "fa-legal", "fa-lemon-o", "fa-level-down", "fa-level-up", "fa-life-bouy", "fa-life-buoy", "fa-life-ring", "fa-life-saver", "fa-lightbulb-o", "fa-line-chart", "fa-link", "fa-linkedin", "fa-linkedin-square", "fa-linux", "fa-list", "fa-list-alt", "fa-list-ol", "fa-list-ul", "fa-location-arrow", "fa-lock", "fa-long-arrow-down", "fa-long-arrow-left", "fa-long-arrow-right", "fa-long-arrow-up", "fa-magic", "fa-magnet", "fa-mail-forward", "fa-mail-reply", "fa-mail-reply-all", "fa-male", "fa-map-marker", "fa-mars", "fa-mars-double", "fa-mars-stroke", "fa-mars-stroke-h", "fa-mars-stroke-v", "fa-maxcdn", "fa-meanpath", "fa-medium", "fa-medkit", "fa-meh-o", "fa-mercury", "fa-microphone", "fa-microphone-slash", "fa-minus", "fa-minus-circle", "fa-minus-square", "fa-minus-square-o", "fa-mobile", "fa-mobile-phone", "fa-money", "fa-moon-o", "fa-mortar-board", "fa-motorcycle", "fa-music", "fa-navicon", "fa-neuter", "fa-newspaper-o", "fa-openid", "fa-outdent", "fa-pagelines", "fa-paint-brush", "fa-paper-plane", "fa-paper-plane-o", "fa-paperclip", "fa-paragraph", "fa-paste", "fa-pause", "fa-paw", "fa-paypal", "fa-pencil", "fa-pencil-square", "fa-pencil-square-o", "fa-phone", "fa-phone-square", "fa-photo", "fa-picture-o", "fa-pie-chart", "fa-pied-piper", "fa-pied-piper-alt", "fa-pinterest", "fa-pinterest-p", "fa-pinterest-square", "fa-plane", "fa-play", "fa-play-circle", "fa-play-circle-o", "fa-plug", "fa-plus", "fa-plus-circle", "fa-plus-square", "fa-plus-square-o", "fa-power-off", "fa-print", "fa-puzzle-piece", "fa-qq", "fa-qrcode", "fa-question", "fa-question-circle", "fa-quote-left", "fa-quote-right", "fa-ra", "fa-random", "fa-rebel", "fa-recycle", "fa-reddit", "fa-reddit-square", "fa-refresh", "fa-remove", "fa-renren", "fa-reorder", "fa-repeat", "fa-reply", "fa-reply-all", "fa-retweet", "fa-rmb", "fa-road", "fa-rocket", "fa-rotate-left", "fa-rotate-right", "fa-rouble", "fa-rss", "fa-rss-square", "fa-rub", "fa-ruble", "fa-rupee", "fa-save", "fa-scissors", "fa-search", "fa-search-minus", "fa-search-plus", "fa-sellsy", "fa-send", "fa-send-o", "fa-server", "fa-share", "fa-share-alt", "fa-share-alt-square", "fa-share-square", "fa-share-square-o", "fa-shekel", "fa-sheqel", "fa-shield", "fa-ship", "fa-shirtsinbulk", "fa-shopping-cart", "fa-sign-in", "fa-sign-out", "fa-signal", "fa-simplybuilt", "fa-sitemap", "fa-skyatlas", "fa-skype", "fa-slack", "fa-sliders", "fa-slideshare", "fa-smile-o", "fa-soccer-ball-o", "fa-sort", "fa-sort-alpha-asc", "fa-sort-alpha-desc", "fa-sort-amount-asc", "fa-sort-amount-desc", "fa-sort-asc", "fa-sort-desc", "fa-sort-down", "fa-sort-numeric-asc", "fa-sort-numeric-desc", "fa-sort-up", "fa-soundcloud", "fa-space-shuttle", "fa-spinner", "fa-spoon", "fa-spotify", "fa-square", "fa-square-o", "fa-stack-exchange", "fa-stack-overflow", "fa-star", "fa-star-half", "fa-star-half-empty", "fa-star-half-full", "fa-star-half-o", "fa-star-o", "fa-steam", "fa-steam-square", "fa-step-backward", "fa-step-forward", "fa-stethoscope", "fa-stop", "fa-street-view", "fa-strikethrough", "fa-stumbleupon", "fa-stumbleupon-circle", "fa-subscript", "fa-subway", "fa-suitcase", "fa-sun-o", "fa-superscript", "fa-support", "fa-table", "fa-tablet", "fa-tachometer", "fa-tag", "fa-tags", "fa-tasks", "fa-taxi", "fa-tencent-weibo", "fa-terminal", "fa-text-height", "fa-text-width", "fa-th", "fa-th-large", "fa-th-list", "fa-thumb-tack", "fa-thumbs-down", "fa-thumbs-o-down", "fa-thumbs-o-up", "fa-thumbs-up", "fa-ticket", "fa-times", "fa-times-circle", "fa-times-circle-o", "fa-tint", "fa-toggle-down", "fa-toggle-left", "fa-toggle-off", "fa-toggle-on", "fa-toggle-right", "fa-toggle-up", "fa-train", "fa-transgender", "fa-transgender-alt", "fa-trash", "fa-trash-o", "fa-tree", "fa-trello", "fa-trophy", "fa-truck", "fa-try", "fa-tty", "fa-tumblr", "fa-tumblr-square", "fa-turkish-lira", "fa-twitch", "fa-twitter", "fa-twitter-square", "fa-umbrella", "fa-underline", "fa-undo", "fa-university", "fa-unlink", "fa-unlock", "fa-unlock-alt", "fa-unsorted", "fa-upload", "fa-usd", "fa-user", "fa-user-md", "fa-user-plus", "fa-user-secret", "fa-user-times", "fa-users", "fa-venus", "fa-venus-double", "fa-venus-mars", "fa-viacoin", "fa-video-camera", "fa-vimeo-square", "fa-vine", "fa-vk", "fa-volume-down", "fa-volume-off", "fa-volume-up", "fa-warning", "fa-wechat", "fa-weibo", "fa-weixin", "fa-whatsapp", "fa-wheelchair", "fa-wifi", "fa-windows", "fa-won", "fa-wordpress", "fa-wrench", "fa-xing", "fa-xing-square", "fa-yahoo", "fa-yelp", "fa-yen", "fa-youtube", "fa-youtube-play", "fa-youtube-square"],
        'social-icons'                  => [],
        'encryption_key'                => 'qt39br',
        'card_types'                    => ['Master Card', 'Visa', 'American Express', 'Discover'],
        'boolean'                       => [
                'social' => false,
        ],
        'paypal'                        => [
                'mode'      => 'sandbox',
                'currency'  => 'USD',
                'app_url'   => '',
                'client_id' => 'AX_vo2yyQavSfgq9IqrO7-7XuDEWUFJQrWBDVPQzDzVf47L8HdTlg3phKx5o7KzZvXDlpSTGXoFd_ZYu',
                'p_secret'  => 'EDWFQz5SmXxYDMxN96UdJfdjVLrqlqSqBo5Ie7OQ6gZNWvj3l1McmJ_wbSnvFopOwejMel0wO_hI1lQb',
                'baseurl'   => 'https://api.sandbox.paypal.com/v1/',
        ],
];