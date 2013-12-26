<?php

/*
|-------------------------------------------------------------------------
| Boostrap file for production GAE applications
|-------------------------------------------------------------------------
| 
| Due to some current restirctions on the Development Server, it is
| currently difficult to run artisan command line scripts from within
| Google App Engine that use GCS for file storage. This includes the
| 'app.storage' path in Laravel.
|
| Instead, we configure Laravel to use the local filesystem for storage
| when running on the Development Server, and to use GCS when running on
| App Engine. 
|
*/

if(strlen(ini_get('google_app_engine.allow_include_gs_buckets'))) {
	$primary_bucket_name = explode(', ', ini_get('google_app_engine.allow_include_gs_buckets'))[0];
	$app->instance('path.storage','gs://'.$primary_bucket_name);
//	$app->instance('path.manifest', storage_path().'/meta');
}
