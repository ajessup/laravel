## Laravel PHP Framework for Google App Engine

[![Latest Stable Version](https://poser.pugx.org/ajessup/laravel/version.png)](https://packagist.org/packages/ajessup/laravel) [![Total Downloads](https://poser.pugx.org/ajessup/laravel/d/total.png)](https://packagist.org/packages/ajessup/laravel)

The wonderful Laravel 4 Framework, [lightly tweaked](https://github.com/ajessup/laravel/compare) to run well on [Google App Engine](https://cloud.google.com/products/app-engine/) out of the box

## Usage

Ensure you have downloaded and installed the latest [Google App Engine for PHP SDK](https://developers.google.com/appengine/downloads) and [Composer](http://getcomposer.org/). Then create a new project by running this command from your terminal:

    composer create-project ajessup/laravel your-project-name -s dev

This will create a default project shell including the necessary configuration files. You can start the project the App Engine launcher or via the `dev_appserver.py` command included in the App Engine SDK:

    dev_appserver.py ./your-project-name/

This will run your project on your local machine within the App Engine development server, with all necessary production services such as memcache emulated.

Now you just need to build your application! If you're looking for inspiration, try the official [Laravel Quickstart](http://laravel.com/docs/quick).

### Deploying to App Engine

To deploy to Google App Engine, you must first:
* Have created a project in the Google Cloud Console, and have enabled billing.
* Within the project, have created a Google Cloud Storage bucket, and made the app engine service account an owner. This bucket will be used to store files useful to Laravel such as compiled blade templates.

Before deploying the first time:
* Open up `app.yaml` in your project, and change the `application:` attribute to match the name of your project (which is also the ID of your App Engine application)
* Open up `php.ini` in your project, and change the value for the ini setting `google_app_engine.allow_include_gs_buckets` to the name of the bucket you created above. When running on App Engine, Laravel will use this bucket by default to write to storage

To deploy your application, you can either use the App Engine launcher or via the `appcfg.py` command included in the App Engine SDK:

     appcfg.py ./your-project-name/

## What's been changed?

This fork of the Laravel framework has been lightly customized to work well with Google App Engine out of the box. This includes the following changes from the default Laravel configuration:

* Session and cache storage defaults to memcached. App Engine provides free shared memcache to all applications, which can be upgraded to dedicated memcache if necessary.
* Monolog is configured to log everything to syslog() by default. PHP calls logged to syslog() are then consolidated and available on App Engine's log viewer
* Two environments are explicitly defined - `local` (when running on the Development Server) and `appengine` (when running on App Engine itself)
* When running in the `local` environment, Laravel uses it's normal storage directory. When running in the `appengine` environment, Laravel will use a Cloud Storage bucket.
* Default `app.yaml` and `php.ini` configuration files for App Engine are included

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Reporting issues

**Unless you are reporting/fixing an issue that relates to Laravel on App Engine specifically, issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### Acknowledgements

As well as the awesome Laravel team, special thanks go to [@amygdala](https://github.com/amygdala) and [@milesgioli](https://github.com/gmergoil) for finding and documenting many of the changes required to run Laravel on Google App Engine.

### License

This derivative of the Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
