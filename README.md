Yii-User Installation
=====================

Download
--------

Download or checkout (SVN/Git) from http://yii-user.2mx.org and unpack files in your protected/modules/user

Git clone
---------

<<<<<<< HEAD
    clone git git@github.com:garyburge/yii-user.git
=======
    clone git git@github.com:mishamx/yii-user.git
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a

Configure
---------

Change your config main:

<<<<<<< HEAD
  // Define a path alias for the Yii-User module to make integration simple
  // Be sure to change the path if you did not unzip or clone into the "modules" folder

  Yii::setPathOfAlias('user', dirname(__FILE__) . '/../modules/user');

  // add to "modules" and "components...
  return array(

    'modules'=>array(
      #...
      'user'=>array(
        // add properties (default values shown)
        # encrypting method (php hash function)
        'hash' => 'sha1',

        # send activation email
        'sendActivationMail' => true,

        # allow access for non-activated users
        'loginNotActiv' => false,

        # activate user on registration (only sendActivationMail = false)
        'activeAfterRegister' => false,

        # automatically login from registration
        'autoLogin' => true,

        # registration path
        'registrationUrl' => array('/user/registration'),

        # recovery password path
        'recoveryUrl' => array('/user/recovery'),

        # login form path
        'loginUrl' => array('/user/login'),

        # page after login
        'returnUrl' => array('/user/profile'),

        # page after logout
        'returnLogoutUrl' => array('/user/login'),
      ),
      #...
    ),

    // application components
    'components'=>array(
      #...
      'db'=>array(
        #...
        'tablePrefix' => 'tbl_',
        #...
      ),
      #...
      // add date format specifications (required for user maintenance views)
      // see http://php.net/manual/en/function.date.php for date() format string definitions
      'format' => array(
        'dateFormat' => 'n/j/y',
        'datetimeFormat' => 'n/j/y g:ia',
      ),
      #...
      'user'=>array(
        // enable cookie-based authentication
        'class' => 'WebUser',
        'allowAutoLogin'=>true,
        'loginUrl' => '/user/login',
        'returnUrl' => '/user/profile', // redirect here after successful login
      ),
      #...
    ),

  );

Change your config console (required to execute migrations):

  return array(

    'modules'=>array(
      #...
      'user'=>array(
        # encrypting method (php hash function)
        'hash' => 'sha1',

        # send activation email
        'sendActivationMail' => true,

        # allow access for non-activated users
        'loginNotActiv' => false,

        # activate user on registration (only sendActivationMail = false)
        'activeAfterRegister' => false,

        # automatically login from registration
        'autoLogin' => true,

        # registration path
        'registrationUrl' => array('/user/registration'),

        # recovery password path
        'recoveryUrl' => array('/user/recovery'),

        # login form path
        'loginUrl' => array('/user/login'),

        # page after login
        'returnUrl' => array('/user/profile'),

        # page after logout
        'returnLogoutUrl' => array('/user/login'),
      ),
      #...
    ),

  );
=======
    return array(
        #...
        // autoloading model and component classes
        'import'=>array(
            'application.models.*',
            'application.components.*',
            'application.modules.user.models.*',
            'application.modules.user.components.*',
        ),

        #...
        'modules'=>array(
            #...
            'user'=>array(
                # encrypting method (php hash function)
                'hash' => 'md5',

                # send activation email
                'sendActivationMail' => true,

                # allow access for non-activated users
                'loginNotActiv' => false,

                # activate user on registration (only sendActivationMail = false)
                'activeAfterRegister' => false,

                # automatically login from registration
                'autoLogin' => true,

                # registration path
                'registrationUrl' => array('/user/registration'),

                # recovery password path
                'recoveryUrl' => array('/user/recovery'),

                # login form path
                'loginUrl' => array('/user/login'),

                # page after login
                'returnUrl' => array('/user/profile'),

                # page after logout
                'returnLogoutUrl' => array('/user/login'),
            ),
            #...
        ),

        #...
        // application components
        'components'=>array(
        #...
            'db'=>array(
            #...
                'tablePrefix' => 'tbl_',
            #...
            ),
            #...
            'user'=>array(
                // enable cookie-based authentication
                'class' => 'WebUser',
            ),
        #...
        ),
        #...
    );

Change your config console:

    return array(
        #...
        'modules'=>array(
            #...
            'user'=>array(
                # encrypting method (php hash function)
                'hash' => 'md5',

                # send activation email
                'sendActivationMail' => true,

                # allow access for non-activated users
                'loginNotActiv' => false,

                # activate user on registration (only sendActivationMail = false)
                'activeAfterRegister' => false,

                # automatically login from registration
                'autoLogin' => true,

                # registration path
                'registrationUrl' => array('/user/registration'),

                # recovery password path
                'recoveryUrl' => array('/user/recovery'),

                # login form path
                'loginUrl' => array('/user/login'),

                # page after login
                'returnUrl' => array('/user/profile'),

                # page after logout
                'returnLogoutUrl' => array('/user/login'),
            ),
            #...
        ),
        #...
    );
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a

Install
-------

<<<<<<< HEAD
Run command (from application/protected):
=======
Run command:
>>>>>>> 7d748a039bc9eced0cfef50e71239e1036b8453a
    yiic migrate --migrationPath=user.migrations

Input admin login, email and password
